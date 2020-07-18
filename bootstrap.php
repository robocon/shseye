<?php 
// Set about php.ini

error_reporting(1);
ini_set('display_errors', 1);
session_start();

include 'includes/config.php';
include 'includes/connect.php';

/**
 * $db = Mysql::load();
 * $db->select();
 * $items = $db->get_items();
 *
 * $configs = array('host' => '', 'port' => '', 'dbname' => '', 'user' => '', 'pass' => '', 'charset' => '', );
 * $db = Mysql::load();
 */
class Mysql
{
	private $db = null;
	private static $connect = null;
	private $item = null;
	private $items = array();
	private $rows = 0;
	private $lastId = 0;
	
	function __construct($configs){
		
		// default config
		$host = HOST;
		$port = PORT;
		$dbname = DB;
		$user = USER;
		$pass = PASS;
		$charset = 'TIS620';

		// Override config
		if( $configs !== false ){
			$host = $configs['host'];
			$port = $configs['port'];
			$dbname = $configs['dbname'];
			$user = $configs['user'];
			$pass = $configs['pass'];
			$charset = ( !empty($configs['charset']) ) ? $configs['charset'] : $charset ;
		}

		try{
			$this->db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// $match = preg_match('/(tis-620)/', $_SERVER['CONTENT_TYPE']);
			// if( empty($match) ){
			// 	$this->db->exec("SET NAMES $charset ;");
			// }

		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		
	}

	// Get response from header
	public function get_sv_headers(){
		$headers = get_headers('http://'.$_SERVER['SERVER_NAME'], 1);
		$items = array();
		foreach( $headers as $key => $val ){ 

			$items[$key] = strtolower($val);
			
		}
		return $items;
	}

	public function set_charset($charset){
		$this->db->exec("SET NAMES $charset ;");
	}
	
	public static function load( $configs = false ){
		
		if (self::$connect === null) {
			self::$connect = new self($configs);
		}
		
		return self::$connect;
	}
	
	public function select($sql, $data = NULL){
		
		try {
			$sth = $this->prepare($sql, $data);
			$this->items = $sth->fetchAll(PDO::FETCH_ASSOC);
			$this->rows = count($this->items);
			if( $sth !== false ){
				$sth = NULL;
			}

			return true;
			
		} catch(exception $e) {
			
			// Keep error into log file
			return $this->set_error($e);
		}
		
	}

	public function get_single($sql, $data){
		try{
			$sth = $this->prepare($sql, $data);
			return $sth->fetch(PDO::FETCH_ASSOC);
		}catch( exception $e ){
			return $this->set_error($e);
		}
	}

	public function set_error($e){
		$log_id = $this->set_log($e);
		$msg = array('error' => $e->getMessage(), 'id' => $log_id);
		return $msg;
	}
	
	public function get_item(){
		return $this->items['0'];
	}
	
	public function get_items(){
		return $this->items;
	}
	
	public function get_rows(){
		return $this->rows;
	}
	
	public function insert($sql, $data = NULL ){
		try {
			
			$sth = $this->prepare($sql, $data);
			$this->lastId = $this->db->lastInsertId();
			if( $sth !== false ){
				$sth = NULL;
			}

			return true;
			
		} catch(Exception  $e) {

			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
			
		}
	}

	public function update($sql, $data = NULL ){
		try {
			
			$sth = $this->prepare($sql, $data);
			if( $sth !== false ){
				$sth = NULL;
			}

			return true;
			
		} catch(Exception  $e) {

			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
			
		}
	}

	public function delete($sql, $data = NULL ){
		try {
			
			$sth = $this->prepare($sql, $data);
			if( $sth !== false ){
				$sth = NULL;
			}

			return true;
			
		} catch(Exception  $e) {

			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
			
		}
	}
	
	public function exec($sql, $data = NULL){
		try{
			$this->prepare($sql, $data);
			return true;
		}catch(Exception  $e) {
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
		}
	}

	public function get_last_id(){
		return $this->lastId;
	}
	
	public function prepare($sql, $data){
		
		$sth = $this->db->prepare($sql);
			
		if( !is_null($data) ){
			foreach($data as $key => &$value){
				$sth->bindValue( $key, $value);
			}
		}
		
		$sth->execute();
		if( $sth !== false ){
			return $sth;
		}else{
			return false;
		}
	}
	
	public function set_log($e){
		$id = uniqid();
		$data = array(
			'id' => $id.' ',
			'date' => '['.date('Y-m-d H:i:s').'] ',
			'request' => $_SERVER['REQUEST_URI'].' - ',
			'msg' => $e->getMessage()."\n"
		);
		
		file_put_contents('logs/mysql-errors.log', $data, FILE_APPEND);
		return $id;
	}

	public function close(){
		$this->db = null;
	}
	
}

// $db = Mysql::load();
// $sql = "SELECT * FROM `opcard` WHERE `hn` LIKE :hn";
// $data = array(':hn' => '58-27%');
// $db->select($sql, $data);
// $item = $db->get_item();

// E.g. http://localhost/
define('DOMAIN', ( strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http' ).'://'.getenv('HTTP_HOST').'/');
define('WEB_REQUEST', substr(getenv('REQUEST_URI'), 1));

// E.g. http://localhost/sub_folder
define('DOMAIN_PATH', DOMAIN.dirname(WEB_REQUEST));

// E.g. http://localhost/sub_folder/file.php
define('DOMAIN_REQUEST', DOMAIN.WEB_REQUEST);

require "includes/functions.php";

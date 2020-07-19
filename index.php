<?php 
include 'bootstrap.php';


$action = input('action');
if ($action === 'save') {
	
	include 'saveForm.php';
	
}elseif ($action === 'deleteTreatment') {

	$id = input_get('id');
	$db = Mysql::load();
	$db->update("UPDATE `treatment` SET `status` = 0 WHERE `id` = '$id' ");
	redirect('index.php?page=patients', 'จัดการข้อมูลเรียบร้อย');
	exit;

}

include 'header.php';
$page = input('page');
if(empty($page)){
	include 'landing.php';

}elseif ($page === 'patients') { 
	include 'patients.php';

}elseif ($page === 'form') { 
	include 'form.php';
	
}elseif($page === 'edit'){
	$id = input_get('id');
	include 'form.php';
}
include 'footer.php';
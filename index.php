<?php 
include 'bootstrap.php';


$action = input_post('action');
if ($action === 'save') {
	
	$db = Mysql::load();

	$date = date('Y-m-d H:i:s');
	$dateFile = date('Ymd');
	$yot = input_post('yot');
	$name = input_post('name');
	$surname = input_post('surname');
	$hn = input_post('hn');
	$idcard = input_post('idcard');
	$congenital = json_encode($_POST['congenital']);
	$myopia = $_POST['myopia'];
	$family = $_POST['family'];
	$diag = json_encode($_POST['diag']);
	$drugGlaucoma = json_encode($_POST['drugGlaucoma']);
	$retinalDate = input_post('retinal_date');
	$ctvfDate = input_post('ctvf_date');
	$octDate = input_post('oct_date');

	$targetDir = "uploads/$idcard/";
	if (!file_exists($targetDir)) {
		mkdir($targetDir);
	}

	$retinalImg = '';
	if( $_FILES['retinal_img']['error'] === 0 ){
		$imageFileType = strtolower(pathinfo($_FILES['retinal_img']['name'],PATHINFO_EXTENSION));
		$retinalImg = $dateFile.'-retinal.'.$imageFileType;
		$targetRetinal = $targetDir.$retinalImg;
		if (!file_exists($targetRetinal)) {
			move_uploaded_file($_FILES['retinal_img']['tmp_name'], $targetRetinal);
		}
		
	}

	$ctvfImg = '';
	if( $_FILES['ctvf_img']['error'] === 0 ){
		$imageFileType = strtolower(pathinfo($_FILES['ctvf_img']['name'],PATHINFO_EXTENSION));
		$ctvfImg = $dateFile.'-retinal.'.$imageFileType;
		$targetCTVF = $targetDir.$ctvfImg;
		if (!file_exists($targetCTVF)) {
			move_uploaded_file($_FILES['ctvf_img']['tmp_name'], $targetCTVF);
		}
		
	}

	$octImg = '';
	if( $_FILES['oct_img']['error'] === 0 ){
		$imageFileType = strtolower(pathinfo($_FILES['oct_img']['name'],PATHINFO_EXTENSION));
		$octImg = $dateFile.'-retinal.'.$imageFileType;
		$targetOCT = $targetDir.$octImg;
		if (!file_exists($targetOCT)) {
			move_uploaded_file($_FILES['oct_img']['tmp_name'], $targetOCT);
		}
		
	}

	$sql = "INSERT INTO `patients` (
		`id`, `date`, `yot`, `name`, `surname`, `hn`, 
		`idcard`, `congenital`, `myopia`, `family`, `diag`, `drugGlaucoma`, 
		`retinalDate`, `retinalImg`, `ctvfDate`, `ctvfImg`, `octDate`, `octImg`
	) VALUES (
		NULL, '$date', '$yot', '$name', '$surname', '$hn', 
		'$idcard', '$congenital', '$myopia', '$family', '$diag', '$drugGlaucoma', 
		'$retinalDate', '$retinalImg', '$ctvfDate', '$ctvfImg', '$octDate', '$octImg'
	);";
	$db->insert($sql);
	$patientId = $db->get_last_id();

	$iopDate = input_post('iop_date');
	$left = input_post('iop_left');
	$right = input_post('iop_right');

	$sql = "INSERT INTO `iop` ( 
		`id`, `date`, `iopDate`, `patientId`, `left`, `right` 
	) VALUES ( 
		NULL, '$date', '$iopDate', '$patientId', '$left', '$right' 
	);";
	$db->insert($sql);

	redirect('index.php', 'บันทึกข้อมูลเรียบร้อย');
	exit;
}

include 'header.php';
$page = input('page');
if(empty($page)){
	include 'landing.php';
}elseif ($page=='form') { 
	include 'form.php';
}
include 'footer.php';
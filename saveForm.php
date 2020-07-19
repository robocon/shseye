<?php 
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
$age = input_post('age');

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
    $ctvfImg = $dateFile.'-ctvf.'.$imageFileType;
    $targetCTVF = $targetDir.$ctvfImg;
    if (!file_exists($targetCTVF)) {
        move_uploaded_file($_FILES['ctvf_img']['tmp_name'], $targetCTVF);
    }
    
}

$octImg = '';
if( $_FILES['oct_img']['error'] === 0 ){
    $imageFileType = strtolower(pathinfo($_FILES['oct_img']['name'],PATHINFO_EXTENSION));
    $octImg = $dateFile.'-oct.'.$imageFileType;
    $targetOCT = $targetDir.$octImg;
    if (!file_exists($targetOCT)) {
        move_uploaded_file($_FILES['oct_img']['tmp_name'], $targetOCT);
    }
}

$sql = "SELECT * FROM `patients` WHERE `idcard` = '$idcard' ";
$db->select($sql);
if($db->get_rows() === 0){
    $sql = "INSERT INTO `patients` (
        `id`, `date`, `yot`, `name`, `surname`, `hn`, 
        `idcard`, `congenital`, `myopia`, `family`, `age` 
    ) VALUES (
        NULL, '$date', '$yot', '$name', '$surname', '$hn', 
        '$idcard', '$congenital', '$myopia', '$family', '$age' 
    );";
    $db->insert($sql);
    $patientId = $db->get_last_id();
}else{
    $pt = $db->get_item();
    $patientId = $pt['id'];
}

$diag = json_encode($_POST['diag']);
$drugGlaucoma = json_encode($_POST['drugGlaucoma']);
$retinalDate = input_post('retinal_date');
$ctvfDate = input_post('ctvf_date');
$octDate = input_post('oct_date');
$sql = "INSERT INTO `treatment` (
    `id`, `patientId`, `dateTreatment`, `diag`, `drugGlaucoma`, `retinalDate`, 
    `retinalImg`, `ctvfDate`, `ctvfImg`, `octDate`, `octImg`, `status`
) VALUES (
    NULL, '$patientId', '$date', '$diag', '$drugGlaucoma', '$retinalDate', 
    '$retinalImg', '$ctvfDate', '$ctvfImg', '$octDate', '$octImg', '1' 
);";
$db->insert($sql);
$treatmentId = $db->get_last_id();


$iopDate = input_post('iop_date');
$left = input_post('iop_left');
$right = input_post('iop_right');

$sql = "INSERT INTO `iop` ( 
    `id`, `date`, `iopDate`, `patientId`, `treatmentId`, `left`, `right` 
) VALUES ( 
    NULL, '$date', '$iopDate', '$patientId', '$treatmentId', '$left', '$right' 
);";
$db->insert($sql);

redirect('index.php?page=patients', 'บันทึกข้อมูลเรียบร้อย');
exit;
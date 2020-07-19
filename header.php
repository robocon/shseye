<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรคต้อหิน</title>

    <script src="https://kit.fontawesome.com/6b4c2963a2.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="images/Untitled-2.png" alt="Logo" style="width:112px;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">หน้าหลัก</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php?page=patients">รายการ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?page=form">ฟอร์มบันทึก</a>
				</li>
			</ul>
			<span class="navbar-text"><a href="javascript:void(0);" class="nav-link" onclick="alert('เข้าสู่ระบบ');">เข้าสู่ระบบ</a></span>
		</div>
	</div>
</nav>
<div class="container-fluid">
<?php 
if (isset($_SESSION['x-msg'])) {
	?>
	<div class="alert alert-info" role="alert"><?=$_SESSION['x-msg'];?></div>
	<?php
	$_SESSION['x-msg'] = NULL;
}
?>

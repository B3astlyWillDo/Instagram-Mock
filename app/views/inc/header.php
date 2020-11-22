<!DOCTYPE html>
<html>
<head>
	<title>Galerija</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT?>/public/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT?>/public/css/login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT?>/public/css/profile.css">
	<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']==2):?>
		<link rel="stylesheet" type="text/css" href="<?php echo URLROOT?>/public/css/admin.css">
	<?php endif; ?>
</head>
<body>
<?php require APPROOT.'/views/inc/navbar.php'; ?>
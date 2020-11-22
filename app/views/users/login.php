<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="wrapper">
	<form id="register" method="post" action = "<?php echo URLROOT;?>/users/login">
        <?php flash('register_success'); ?>
        <h1>Login</h1>
        <hr style="background:#000">
        <br>
		<label>Email</label>
        <br>
        <span><?php echo $data['email_err']?></span>
        <br>
		<input type="email" placeholder="Unesite email: " name="email">
		<br>
		<label>Password </label>
        <br>
        <span><?php echo $data['password_err']?></span>
        <br>
		<input  type="password" placeholder="Unesite pasword: " name="password">
		<br>
		<button class="" type="submit" name="submit">Uloguj se</button>
		<br>
        <br>
        <br>
        <a class="login-link" href="<?php echo URLROOT;?>/users/register">Nemate nalog? Registrujte se! </a>

</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
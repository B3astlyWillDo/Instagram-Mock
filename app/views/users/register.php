
<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="wrapper">
<form id="register" action = "<?php echo URLROOT;?>/users/register" method="post">
		<h1>Register</h1>
		<hr>
        <br>
		<label>Ime </label>
		<br>
		<span><?php echo $data['ime_err']?></span>
		<br>
		<input type="text" placeholder="Unesite ime: " name="ime" value="<?php echo $data['ime']?>">
		<br>
		<label>Prezime </label>
		<br>
		<span><?php echo $data['prezime_err']?></span>
		<br>
		<input  type="text"placeholder="Unesite prezime: " name="prezime" value="<?php echo $data['prezime']?>">
		<br>
		<label>Username </label>
		<br>
		<span><?php echo $data['username_err']?></span>
		<br>
		<input placeholder="Unesite username: " name="username" value="<?php echo $data['username']?>">
		<br>
		<label>Password </label>
		<br>
		<span><?php echo $data['password_err']?></span>
		<br>
		<input  type="password" placeholder="Unesite pasword: " name="password">
		<br>
		<label>Email</label>
		<br>
		<span><?php echo $data['email_err']?></span>
		<br>
		<input type="email" placeholder="Unesite email: " name="email" value="<?php echo $data['email']?>">
		<br>
		<button type="submit" name="submit">Registruj se</button>
	   <br>
	   <br>
        <a class="login-link" href="<?php echo URLROOT;?>/users/login">Već imate nalog? Ulogujte se! </a>
	</form>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
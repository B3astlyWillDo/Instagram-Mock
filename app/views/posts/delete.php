<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="wrapper">
<form id="register" method="post" action = "<?php echo URLROOT;?>/posts/delete" enctype ="multipart/form-data">
        <h1>Obrisi objavu</h1>
        <hr style="background:#000">
        <br>
		<label>ID objave</label>
        <br>
        <span><?php echo $data['postid_err']?></span>
        <br>
		<input type="text" name="postid" placeholder="Unesite id objave: " >
		<br>
		<button  type="submit" name="submit">Obriši objavu</button>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>
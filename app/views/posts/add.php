<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="wrapper">
<form id="register" method="post" action = "<?php echo URLROOT;?>/posts/add" enctype ="multipart/form-data">
        <h1>Dodajte objavu</h1>
        <hr style="background:#000">
        <br>
		<label>Naziv slike</label>
        <br>
		<span><?php echo $data['title_err']?></span>
		<input type="text" name="title" placeholder="Unesite naziv slike: " >
		<br>
		<label>Slika</label>
        <br>
		<span><?php echo $data['file_err']?></span>
		<input class="add-image" type="file" name="file" text="Dodaj sliku">
		<br>
		<button  type="submit" name="submit">Dodaj objavu</button>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>
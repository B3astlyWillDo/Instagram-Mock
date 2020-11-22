<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="wrapper">
<?php foreach($data['posts'] as $post): ?>
	<div class="post">
		<div class="img-holder"><img class="image" src="<?php echo URLROOT.'/slike/'.$post->objavalink?>" onclick="window.open(this.src)"> </div>
			<div class="desc">
				<div class="img-name"><span><?php echo $post->objavaime;?></span></div>
				<div class="post-details"><span><?php echo $post->username;?></span> </div><div class="post-details"><button>Sviđa mi se</button> </div>
		    </div>
    </div>

<?php endforeach; ?>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
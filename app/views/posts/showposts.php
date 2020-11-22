<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="wrapper">
	<div id="profile">
       <img src="<?php echo URLROOT?>/slike/profile.jpg">
       <h1><?php echo $data['username']?></h1>
    </div>
    <div id="followers">
        <hr>
        <br>
       <table>
           <tr><td><?php echo $data['count']?></td><td><?php echo $data['likes']?></td></tr>
           <tr><td>objava</td><td>ukupno sviđanja</td></tr>
       </table>
    </div>
    <div id="gallery">
        <?php foreach($data['posts'] as $post) :?>
        <div class="gallery-post"><div class="overlay"><span><?php echo $post->brsvidjanja?>&nbsp;</span>sviđanja</div><img src="<?php echo URLROOT.'/slike/'. $post->objavalink?>"> </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
<?php require APPROOT.'/views/inc/header.php'; ?>
<div id="main">
    <div id="cover"> Admin meni nije moguć na ovako maloj rezoluciji. </div>
    <img src="<?php echo URLROOT; ?>/slike/admin.jpg">
    <h2>Administrator</h2>
    <ul>
        <li><a href="<?php echo URLROOT?>/posts/admin">Pregled korisnika</a></li>
        <li><a href="<?php echo URLROOT?>/posts/posted">Pregled objava</a></li>
        <li><a href="<?php echo URLROOT?>/posts/delete">Brisanje objava</a></li>
    </ul>
</div>
<div id="center">
    <h1>Pregled korisnika</h1>
    <hr>
    <table>
        <th>ID</th><th>Ime</th><th>Prezime</th><th>Username</th><th>Email</th>
        <?php foreach($data['users'] as $post): ?>
        <tr><td><?php echo $post->clanid?></td><td><?php echo $post->ime?></td><td><?php echo $post->prezime?></td><td><?php echo $post->username?></td><td><?php echo $post->email?></td><td</tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
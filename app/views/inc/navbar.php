<div id="navbar">
   	<img src="<?php echo URLROOT?>/slike/logo_beli.png" onclick="window.location = '<?php echo isset($_SESSION['user_id'])? URLROOT.'/posts' : URLROOT?>'">
   	<ul id="navbar-holder">
   		<li class="navbar-list">Profil</li>
   		<div id="dropdown">
		   <?php if(!isset($_SESSION['user_id'])): ?>
   			<li class="dropdown-items"><a href="<?php echo URLROOT; ?>/users/login">Uloguj se</a></li>
		   <?php else:?>
			<?php if($_SESSION['user_id']==2):?>
				<li class="dropdown-items"><a href="<?php echo URLROOT; ?>/posts/admin">Admin meni</a></li> 
			<?php endif; ?>
			<li class="dropdown-items"><a href="<?php echo URLROOT; ?>/posts/showposts">Moj profil</a></li>
			<li class="dropdown-items"><a href="<?php echo URLROOT; ?>/posts/add">Dodaj objavu</a></li>
			<li class="dropdown-items"><a href="<?php echo URLROOT; ?>/users/logout">Izloguj se</a></li>
			   <?php endif; ?>
   		</div>
   	</ul>
   </div>
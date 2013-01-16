<?php
	
	require_once('lib/php/conf.php');
	require_once('lib/php/webapp.class.php');
	
	$mod = (isset($_GET['mod']) ? $_GET['mod'] : 'home');
	
	session_start();
	
	$db_link = Webapp::getDbLink(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(isset($_POST['login']) && isset($_POST['password'])) { Webapp::logIn($db_link, $_POST['login'], $_POST['password']);}
	
	if(isset($_GET['logout'])){ unset($_SESSION['user']); }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
				
		<?php include('mod/index/head.php'); ?>
		<?php if(isset($_SESSION['user'])){ include('mod/' . $mod . '/head.php'); }  else {?><title>KeyRI</title><?php } ?>

		
		<link rel="shortcut icon" href="favicon.ico" />
		
	</head>
	
	<body>
		
		<div id="page">
			
			<table id="header" cellspacing="0px" cellpadding="0px">
				<tr>
					<td class="logo">
						<img src="mod/index/img/logo.png" />
					</td>
					<td class="center">
						<?php if(!isset($_SESSION['user'])): ?>
							<form action="index.php" method="post" style="margin-left:20px;">Connexion : <input type="text" name="login" maxlength="20" style="padding:2px; border:0px;"> <input type="password" name="password" maxlength="20" style="padding:2px; border:0px;"> <input type="submit" value="OK" style="padding:3px; border:0px; background-color:#000000; color:#ffffff;"></form>
						<?php endif; ?>
					</td>
					<td class="user">
						<?php if(isset($_SESSION['user'])): ?>
							<?php echo $_SESSION['user']['nickname']; ?>
							<a href="?logout=1"><img src="mod/index/img/logout.png" /></a>
						<?php endif; ?>
					</td>
				</tr>
			</table>
			
			<?php if(isset($_SESSION['user'])){ include('mod/' . $mod . '/mod.php'); } ?>
			
		</div>
		
	</body>
	
</html>

<?php Webapp::closeDbLink($db_link); ?>
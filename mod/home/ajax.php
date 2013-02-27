<?php
	require_once('../../lib/php/conf.php');
	require_once('../../lib/php/webapp.class.php');
	
	$db_link = Webapp::getDbLink(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	session_start();
	
	$tasks = array('editKeys','editGrade','editName','editCity','loadTable');
	$ajax_return = false;
		
	if(isset($_SESSION['user']) && isset($_POST['t']) && in_array($_POST['t'], $tasks)){
		switch($_POST['t']){
			case 'editKeys':
				if(isset($_POST['id_portal']) && isset($_POST['keys']) && isset($_POST['grade'])){
					$ajax_return = Webapp::setPortalUserInfo($db_link,$_POST['id_portal'],$_SESSION['user']['id'],intval($_POST['keys']),intval($_POST['grade']));
				}
				break;
			case 'editGrade':
				if(isset($_POST['id_portal']) && isset($_POST['grade']) && isset($_POST['keys'])){
					$ajax_return = Webapp::setPortalUserInfo($db_link,$_POST['id_portal'],$_SESSION['user']['id'],intval($_POST['keys']),intval($_POST['grade']));			
				}	
				break;
			case 'editName':			
				$ajax_return = Webapp::setPortalField($db_link,$id_portal,'name',$name);			
				break;
			case 'editCity':
				$ajax_return = Webapp::setPortalField($db_link,$id_portal,'city',$name);						
				break;	
		}
	}
	elseif (isset($_GET['t']) && in_array($_GET['t'], $tasks)){
		switch($_GET['t']){
			case 'loadTable':
				$ajax_return = Webapp::getPortalsWithUserInfoJSON($db_link);
				error_log($ajax_return);
				break;		
		}	
	}
	echo $ajax_return;
	Webapp::closeDbLink($db_link);
?>
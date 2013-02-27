<?php

class Webapp{
	
	// DATABASE
	public static function getDbLink($db_host, $db_user, $db_password, $db_name){
		$db_link = mysql_connect($db_host, $db_user, $db_password); if(!$db_link){ die('Failed to connect to MySQL : ' . mysql_error()); }
		$db_selected = mysql_select_db($db_name, $db_link); if(!$db_selected){ die('Failed to select database : ' . mysql_error()); }
		mysql_set_charset('utf8', $db_link);
		return $db_link;
	}
	
	public static function closeDbLink($db_link){
		mysql_close($db_link);
	}
	
	// LOGIN
	public static function logIn($db_link, $login, $password){
		$sql = "SELECT * FROM user WHERE nickname = '" . $login . "'";
		$result = mysql_query($sql, $db_link);
		if($result){
			$user = mysql_fetch_assoc($result);
			if(isset($user['password']) && strcmp($user['password'],md5($password)) == 0 ){ 
				unset($user['password']);
				$_SESSION['user'] = $user;
				return true;
			}
		}
		return false;
	}
	
	public static function getPortalsByUser($db_link,$id_user){
		$portals = array();
		$sql  = "SELECT p.id,p.city,p.name,SUM(phu.keys),SUM(phu.grade) FROM portal AS p, portal_has_user AS phu ";
		$sql .= "WHERE phu.id_user=".$id_user." AND phu.id_portal = p.id";
		$result = mysql_query($sql, $db_link);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$row['img'] = "media/portal/".$row['id'].".jpg";
				$portals[] = $row;
			}
		}				
		return $portals;	
	}

	public static function getPortals($db_link){
		$portals = array();
		$sql  = "SELECT `p`.`id`,`p`.`city`,`p`.`name`,SUM(`phu`.`keys`) AS `keys`,SUM(`phu`.`grade`) AS `grades` FROM `portal` AS `p` ";
		$sql .= "LEFT JOIN `portal_has_user` AS `phu` ON `phu`.`id_portal` = `p`.`id` GROUP BY `p`.`id`";
		$result = mysql_query($sql, $db_link);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$row['img'] = "media/portal/".$row['id'].".jpg";
				$sql_k  = "SELECT u.nickname, phu.keys FROM user AS u, portal_has_user AS phu ";
				$sql_k .= "WHERE phu.id_user = u.id AND phu.id_portal = ".$row['id']." AND phu.keys IS NOT NULL AND phu.keys <> 0 ";
				$sql_k .= "ORDER BY phu.keys DESC";
				$result_k = mysql_query($sql_k, $db_link);
				$k = array();
				while($row_k = mysql_fetch_assoc($result_k)){
					$k[] = $row_k;
				}
				$row['tooltip_keys'] = $k;
				
				$sql_g  = "SELECT u.nickname, phu.grade FROM user AS u, portal_has_user AS phu ";
				$sql_g .= "WHERE phu.id_user = u.id AND phu.id_portal = ".$row['id']." AND phu.grade IS NOT NULL AND phu.grade <> 0 ";
				$sql_g .= "ORDER BY phu.grade DESC";
				$result_g = mysql_query($sql_g, $db_link);
				$g = array();
				while($row_g = mysql_fetch_assoc($result_g)){
					$g[] = $row_g;
				}
				$row['tooltip_grades'] = $g;				
				
				$portals[] = $row;
				unset($row_k);
				unset($k);
				unset($row_g);
				unset($g);
			}
		}				
		return $portals;	
	}	
	public static function getPortalsWithUserInfo($db_link){
		$portals = array();
		$sql  = "SELECT `p`.`id`,`p`.`city`,`p`.`name`,SUM(`phu`.`keys`) AS `keys`,SUM(`phu`.`grade`) AS `grades` FROM `portal` AS `p` ";
		$sql .= "LEFT JOIN `portal_has_user` AS `phu` ON `phu`.`id_portal` = `p`.`id` GROUP BY `p`.`id`";
		$result = mysql_query($sql, $db_link);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$row['img'] = "media/portal/".$row['id'].".jpg";
				$sql_k  = "SELECT u.nickname, phu.keys FROM user AS u, portal_has_user AS phu ";
				$sql_k .= "WHERE phu.id_user = u.id AND phu.id_portal = ".$row['id']." AND phu.keys IS NOT NULL AND phu.keys <> 0 ";
				$sql_k .= "ORDER BY phu.keys DESC";
				$result_k = mysql_query($sql_k, $db_link);
				$k = array();
				while($row_k = mysql_fetch_assoc($result_k)){
					if(strcmp($row_k['nickname'],$_SESSION['user']['nickname']) == 0){
						$u_keys = $row_k['keys'];
					}
					$k[] = $row_k;
				}
				$row['tooltip_keys'] = $k;
				
				$sql_g  = "SELECT u.nickname, phu.grade FROM user AS u, portal_has_user AS phu ";
				$sql_g .= "WHERE phu.id_user = u.id AND phu.id_portal = ".$row['id']." AND phu.grade IS NOT NULL AND phu.grade <> 0 ";
				$sql_g .= "ORDER BY phu.grade DESC";
				$result_g = mysql_query($sql_g, $db_link);
				$g = array();
				while($row_g = mysql_fetch_assoc($result_g)){
					if(strcmp($row_g['nickname'],$_SESSION['user']['nickname']) == 0){
						$u_grade = $row_g['grade'];
					}
					$g[] = $row_g;
				}
				$row['tooltip_grades'] = $g;
				$row['user_keys'] = empty($u_keys) ? 0 : $u_keys;			
				$row['user_grade'] = empty($u_grade) ? 0 : $u_grade;			
				
				$portals[] = $row;
				unset($row_k);
				unset($k);
				unset($row_g);
				unset($g);
			}
		}				
		return $portals;	
	}	
	public static function getPortalsWithUserInfoJSON($db_link){
		$portals = '{"aaData": [';
		$sql  = "SELECT `p`.`id`,`p`.`city`,`p`.`name`, 'img' AS `img`, ";
		$sql .= "SUM(`phu`.`keys`) AS `keys`, '' AS `tooltip_keys`, SUM(`phu`.`grade`) AS `grades`, '' AS `tooltip_grades` ";
		$sql .= "FROM `portal` AS `p` ";
		$sql .= "LEFT JOIN `portal_has_user` AS `phu` ON `phu`.`id_portal` = `p`.`id` GROUP BY `p`.`id`";
		$result = mysql_query($sql, $db_link);
		if($result){
			while($row = mysql_fetch_assoc($result)){
				$row['img'] = "<img src='media/portal/".$row['id'].".jpg' />";
				$sql_k  = "SELECT u.nickname, phu.keys FROM user AS u, portal_has_user AS phu ";
				$sql_k .= "WHERE phu.id_user = u.id AND phu.id_portal = ".$row['id']." AND phu.keys IS NOT NULL AND phu.keys <> 0 ";
				$sql_k .= "ORDER BY phu.keys DESC";
				$result_k = mysql_query($sql_k, $db_link);
				$k = "<table class='tooltip'>";
				while($row_k = mysql_fetch_assoc($result_k)){
					if(strcmp($row_k['nickname'],$_SESSION['user']['nickname']) == 0){
						$u_keys = $row_k['keys'];
					}
					$k .= "<tr><td class='name'>".$row_k['nickname']."</td><td class='number'>".$row_k['keys']."</td></tr>";
				}
				$row['tooltip_keys'] = $k."</table>";
				
				$sql_g  = "SELECT u.nickname, phu.grade FROM user AS u, portal_has_user AS phu ";
				$sql_g .= "WHERE phu.id_user = u.id AND phu.id_portal = ".$row['id']." AND phu.grade IS NOT NULL AND phu.grade <> 0 ";
				$sql_g .= "ORDER BY phu.grade DESC";
				$result_g = mysql_query($sql_g, $db_link);
				$g = "<table class='tooltip'>";
				while($row_g = mysql_fetch_assoc($result_g)){
					if(strcmp($row_g['nickname'],$_SESSION['user']['nickname']) == 0){
						$u_grade = $row_g['grade'];
					}
					$g .= "<tr><td class='name'>".$row_g['nickname']."</td><td class='number'>".$row_g['grade']."</td></tr>";
				}
				$row['tooltip_grades'] = $g."</table>";
				
				$row['user_keys'] = empty($u_keys) ? 0 : $u_keys;			
				$row['user_grade'] = empty($u_grade) ? 0 : $u_grade;			
				
				$row_json = '[';
				foreach($row as $v){
					$row_json .= '"'.$v.'",';
				}
				$portals .= substr($row_json, 0, -1)."],";
				unset($row_k);
				unset($k);
				unset($row_g);
				unset($g);
			}
		}				
		return substr($portals, 0, -1)." ]}";;	
	}	

	// 
	public static function setPortalUserKeys($db_link,$id_portal,$id_user,$keys){
		if(is_int($keys)){
			$sql = "DELETE FROM portal_has_user";
			$sql .= " WHERE `id_portal` = ".$id_portal." AND `id_user` = ".$id_user;
			if( mysql_query($sql, $db_link) ){
				$sql  = "INSERT INTO portal_has_user SET `keys` = ".$keys;
				$sql .= " WHERE `id_portal` = ".$id_portal." AND `id_user` = ".$id_user;
				return mysql_query($sql, $db_link);					
			}
		}
		return false;
	}
	
	public static function setPortalUserInfo($db_link,$id_portal,$id_user,$keys,$grade){
		if(is_int($keys) && is_int($grade)){
			$sql = "DELETE FROM portal_has_user";
			$sql .= " WHERE `id_portal` = ".$id_portal." AND `id_user` = ".$id_user;
			if( mysql_query($sql, $db_link) ){
				$sql  = "INSERT INTO portal_has_user VALUES (".$id_portal.",".$id_user.",".$keys.",".$grade." )";
				return mysql_query($sql, $db_link);					
			}
		}
		return false;		
	}
	public static function setPortalUserGrade($db_link,$id_portal,$id_user,$grade){
		if(is_int($grade)){	
			$sql  = "UPDATE portal_has_user SET `grade` = ".$grade;
			$sql .= " WHERE `id_portal` = ".$id_portal." AND `id_user` = ".$id_user;
			return mysql_query($sql, $db_link);			
		}
		return false;
	}
	public static function setPortalField($db_link,$id_portal,$field,$value){
		$value = mysql_real_escape_string($value);
		$sql  = "UPDATE portal SET `".$field.'` = "'.$value."'";
		$sql .= " WHERE id_portal = ".$id_portal;
		return mysql_query($sql, $db_link);			
	}	
}	
?>
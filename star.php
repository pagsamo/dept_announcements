<?php 


define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "@dm1n");
define("DB_NAME", "cmmb2");
define("OSAS","Office of the Student Affair and Service(OSAS)");
define("REG","Registrar Office");
define("COE","College of Engineering (COE)");
define("CIT","College of Industrial Technology (CIT)");
define("CBMA","College of Business Management and Accountancy (CBMA)");
define("CAS","College of Arts and Sciences (CAS)");
define("CTE","College of Teacher Education (CTE)");
define("CCJE","College of Criminal Justice Education (CCJE)");
define("CHMT","College of Hotel Management and Tourism (CHMT)");
define("CCS","College of Computer Studies (CCS)");
$departments = array(OSAS,REG,COE,CIT,CBMA,CAS,CTE,CCJE,CHMT,CCS);


function get_abbrv($department){
    $string = explode( "(", $department);
    return strtolower(str_replace(")","",end($string)));
}

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }

  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
  }

  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
      exit("Database query failed.");
    }
  }

  $db = db_connect();


function get_all_announcement_today(){
	global $db;

	$today = strtotime("today");
	$today = date('Y-m-d', $today);

	$sql = "SELECT * FROM announcement ";
	$sql .= "WHERE startdate <= '".$today."' ";
	$sql .= "AND enddate >= '".$today."'"; 
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}


function get_announcement_today_by_department($department){
	global $db;

	$today = strtotime("today");
	$today = date('Y-m-d', $today);

	$sql = "SELECT * FROM announcement ";
	$sql .= "WHERE startdate <= '".$today."' ";
	$sql .= "AND enddate >= '".$today."' "; 
	$sql .= "And department = '".$department."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	if(mysqli_num_rows($result) > 0){
		$announcements = array();
		while($row = $result->fetch_assoc()):
			array_push($announcements, $row);
		endwhile;
		return $announcements;
	}
	return array(array("department"=>$department,"post_type"=>"none", "content"=>"No Announcement"));
}


function templater($announcement,$class){
	$a = $announcement;
	if($a["post_type"] == "none" AND $a["department"] == REG OR $a["post_type"] == "none" AND $a["department"] == OSAS ){
		$template = "<div class='{$class} text_post post'><p><span class='label'>{$a['department']}</span></p><h3 class='text_post'><span>Announcement: </span><br>";
		$template .= "No Announcement</h3></div>";
		return $template;
	}

	if($a["post_type"] == "text"){
		$template = "<div class='{$class} text_post post'><p><span class='label'>{$a['department']}</span></p><h3 class='text_post'><span>Announcement: </span><br>";
		$template .= $a["content"]."</h3></div>";
		return $template;
	}elseif($a["post_type"] == "image"){
		$template = "<div class='{$class} image_post post'><p><span class='label'>{$a['department']}</span> <br><em>Click image to Enlarge</em></p><div><img data-lity src='images/";
		$template .= $a["content"]."' class='img_post'></div></div>";
		return $template;
	}else{
		$template = "<div class='{$class} text_post post'><p><span class='label'>{$a['department']}</span></p><h3 class='text_post'><span>Announcement: </span><br>";
		$template .= "No Announcement</h3></div>";
		return $template;
	}
}



function div_generator($dept1, $dept2)
{
	$a = get_announcement_today_by_department($dept1);
	$b = get_announcement_today_by_department($dept2);
	return templater($a, "show").templater($b, "hide");
}

/**
List all anouncements from all deparments:
exceptions: departments without announcements
			departments with video anouncments
**/
function main_generator()
{
	if(get_all_announcement_today()->num_rows == 0){
		return '<div class="defaut_vid" style="margin:0 auto; text-align: center; float:none;"><video class="video" style="width:90%" autoplay muted loop src="videos/default/default.mp4"></video></div>';
	}
	global $departments;
	$posts = array();
	$html = "<ul class='all'>";
	foreach($departments as $dept):
		$as = get_announcement_today_by_department($dept);
		foreach($as as $post):
        	if($post['post_type'] != 'none'){
				if($post['post_type'] == 'text')
					{
						$html .= "<li><h2>{$post['department']}</h2><div><p><span class='label'>Announcement</span></p><h1>{$post['content']}</h1></li>";
					}elseif($post['post_type'] == 'image'){
						$html .= "<li class='image'><h2>{$post['department']}</h2><p><span class='label'>Announcement</span></p><img data-lity class='main-div-img'  src='images/{$post['content']}'></li>";
					}
				}
    	endforeach;
	endforeach;
	$html .= '</ul>';
	return $html;
}


function template_div($type, $content, $department)
{
    $template = "<div><h4>{$department}<br><span class='label'>Announcement: </span></h4>";
    if($type == 'image'){
        $template .= "<img src='images/{$content}' alt=''></div>";
        return $template;
    }elseif( $type == 'text'){
        $template .= "<h3>{$content}</h3></div>";
        return $template;
    }else{
        $template .= "<h3>No Announcement</h3></div>";
        return $template;
    }
}


function new_templater($department){
    $template = "";
    $a = get_announcement_today_by_department($department);
    foreach($a as $i):
        $template .= template_div($i['post_type'],$i['content'],$i['department']);
    endforeach;
    return $template;
}


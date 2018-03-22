<?php 

/**
1. Get all announcement where date is acceptable today
2. Filter what department
3. If department no result = no further announcement on this 
4. Else get post_type
5. Render announcement based on post type
**/

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
$departments = array(
OSAS,
REG,
COE,
CIT,
CBMA,
CAS,
CTE,
CCJE,
CHMT,
CCS
);

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
	$sql .= "And department = '".$department."' LIMIT 1";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	if(mysqli_num_rows($result) > 0){
		return $result->fetch_assoc();
	}
	return array("department"=>$department,"post_type"=>"none");
}


function templater($announcement,$class){
	$a = $announcement;
	if($a["post_type"] == "text"){
		$template = "<div class='{$class} text_post post'><p><span class='label'>{$a['department']}</span></p><h3 class='text_post'><span>Announcement: </span><br>";
		$template .= $a["content"]."</h3></div>";
		return $template;
	}elseif($a["post_type"] == "image"){
		$template = "<div class='{$class} image_post post'><p><span class='label'>{$a['department']}</span> <br><em>Click image to Enlarge</em></p><div><img data-lity src='images/";
		$template .= $a["content"]."' class='img_post'></div></div>";
		return $template;
	}elseif($a["post_type"] == "video"){
		$template = "<div class='{$class} video_post post'><p><span class='label'>{$a['department']}</span> <br><em>Click Video to Enlarge</em></p><div><video class='video' autoplay muted loop src='videos/";
		$template .= $a["content"]."' ></div></div>";
		return $template;
	}else{
		$template = "<div class='{$class} post'><p class='dept_text'><span class='label'>{$a['department']}</span>";
		$template .= "</p><h3>No Announcement<h3></div>";
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
	global $departments;
	$posts = array();
	$html = "<ul class='all'>";
	foreach($departments as $dept):
		$post = get_announcement_today_by_department($dept);
		if($post['post_type'] != 'none' OR $post['post_type'] != 'video'){
			if($post['post_type'] == 'text')
			{
				$html .= "<li><p><span class='label'>Department:</span> {$post['department']}</p><div><p><span class='label'>Announcement: </span><span class='text_anouncement'>{$post['content']}</span></p></li>";
			}elseif($post['post_type'] == 'image'){
				$html .= "<li class='image'><p><span class='label'>Department: </span>{$post['department']}</p><div><p><span class='label'>Announcement: </span> <img data-lity class='main-div-img'  src='images/{$post['content']}'></p></div></li>";
			}
		}
	endforeach;
	$html .= '</ul>';
	return $html;
}

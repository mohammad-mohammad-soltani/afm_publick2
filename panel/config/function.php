<?php
session_start();

$data = file_get_contents(__DIR__."/site_setting.json");
$data_decode = json_decode($data, 1);
require_once("db_config.php");
$conn = new mysqli(server,username,password,db);
function admin(){
    if(isset($_SESSION["access"])){
    $access=$_SESSION["access"];
    if ($access=='adminstrator') {
        return true;
    }else if($access=='developer'){
        return true;
    }else {
        return false;
    }
}else{
    return false;
}
}
function print_access($access){
    $access_level=$access;
    if ($access_level == "adminstrator") {
        return "مدیر کل";
    }else if ($access_level == "developer"){
        return "برنامه نویس";
    }else if ($access_level == "sub"){
        return "مشترک";
    }
}
function writer(){
    if(isset($_SESSION["access"])){
        $access=$_SESSION["access"];
        if ($access=='adminstrator') {
            return true;
        }else if($access=='developer'){
            return true;
        }else {
            return false;
        }
    }
}
function theme_reader() {
    global $data_decode;
    return $data_decode["theme"];
}
function is_dark(){
    
    if( $_SESSION["defult_mode"] == "light_mode"){
        return false;
    }else{
       
        return true;
    }
}
function print_mode(){
    if(is_dark()){
        echo "dark-mode";
    }else{
        echo "light-mode";
    }
    
}
function delete_account(){
    global $conn;
    $sql_remove = "DELETE FROM `users_db` WHERE username='".$_SESSION["username"]."'";
        $sql_remove_p = "DELETE FROM `profile_db` WHERE username='".$_SESSION["username"]."'";
        $sql_remove_q = "DELETE FROM `queztions` WHERE username='".$_SESSION["username"]."'";
        $sql_remove_a = "DELETE FROM `key_db` WHERE username='".$_SESSION["username"]."'";
        $conn->query($sql_remove);
        $conn->query($sql_remove_p);
        $conn->query($sql_remove_q);
        $conn->query($sql_remove_a);
        session_unset(); 
            session_destroy(); 
            header("location: ".logo_url);
}
function access_denide(){
    $data = json_decode(file_get_contents(dirname(__DIR__)."/blocked_users/index.json"),true);
    if(isset($data[$_SESSION["username"]])){
        $data[$_SESSION["username"]]["count"] += 1;
        if($data[$_SESSION["username"]]["count"] >= 10){
            delete_account();
            $data[$_SESSION["username"]]["count"] = 0;
        }
    }else{
        $data[$_SESSION["username"]] = array(
            "count" => 1,
        );
    }
    file_put_contents(dirname(__DIR__)."/blocked_users/index.json",json_encode($data,JSON_UNESCAPED_UNICODE));
    
}
function to_delete(){
    $data = json_decode(file_get_contents(dirname(__DIR__)."/blocked_users/index.json"),true);
    
    return  10 - $data[$_SESSION["username"]]["count"] ;
}
function lastpost($lmit){
    $data = json_decode(file_get_contents(url."lib/search.php?lastpost=true"),true);
    return $data;
}
function search_handeler(){
    if(isset($_GET["search"])){
        echo $_GET["search"];
    }
}
require_once(login_check_dir);
if (isset($_GET['id'])) {
	$pid = $_GET['id'];

}else{
	$pid = null;
}

function get_imgs(){
	echo pages_back;
}
function get_score(){
    global $conn;
    $session_username = $_SESSION['username'];

// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
    $sql = "SELECT * FROM users_db WHERE username = '$session_username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["coin"];

}
function level(){
    $data = get_score();
    if(level_1 > $data AND $data > -1  ){
        $out = array(
            "text" => "برنزی",
            "icon" => "",
            "option" => array(
                "1" => array(
                    "name" => "شروع به کار",
                    "info" => "برای شروع به کار بخش هایی برای شما ایجاد شده اند تا بتوانید از آنها لذت ببرید",
                ),
                
            ),
        );
    }elseif(level_1< $data AND $data< level_2){
        $out = array(
            "text" => "نقره ای",
            "icon" => "",
            "option" => array(
                "1" => array(
                    "name" => "بخش جدید",
                    "info" => "بخش جدیدی برای چت با هوش مصنوعی دارید",
                ),
                
            ),
        );
    }elseif(level_3 > $data AND $data > level_2){
        $out = array(
            "text" => "طلایی",
            "icon" => "",
            "option" => array(
                "1" => array(
                    "name" => "API نا محدود",
                    "info" => "در این سطح دیگر محدودیتی بر روی API شما اعمال نمیشود",
                ),
                "2" => array(
                    "name" => "بانک سوال",
                    "info" => "قفل تمامی بانک های سوال برای شما باز میشود",
                ),
            ),
        );
    }elseif($data > level_3){
        $out = array(
            "text" => "افسانه ای",
            "icon" => "",
            "option" => array(
                "1" => array(
                    "name" => "چت نامحدود",
                    "info" => "در این سطح شما میتوانید به صورت نا محدود با تمامی هوش مصنوعی های موجود از جمله تولید تصویر چت کنید",
                ),
                "2" => array(
                    "name" => "API جدید",
                    "info" => "در این سطح تنوع API شما برای هوش مصنوعی افزایش پیدا میکند",
                ),
            ),
        );
    }
    
    return $out;
}
function send_verfication_code($tel,$user){
    
    $code = random_int(99999,999999);
    $out = file_get_contents("http://ippanel.com:8080/?apikey=".sms_API_key."&pid=".sms_pattern."&fnum=3000505&tnum=$tel&p1=code&v1=".$code);
    $file = directory."check/active_codes.json";
    $data = json_decode(file_get_contents($file),true);
    $data[$user]["code"] = $code;
    file_put_contents($file,json_encode($data));
}

function send_sms($tel,$var,$value,$pattern){
    
    $code = random_int(99999,999999);
    $out = file_get_contents("http://ippanel.com:8080/?apikey=".sms_API_key."&pid=".$pattern."&fnum=3000505&tnum=$tel&p1=$var&v1=".$value);
    if($out){
        return true;
    }
}
function send_sms_q($tel,$name){
    
    
    $out = file_get_contents("http://ippanel.com:8080/?apikey=".sms_API_key."&pid=".sms_pattern_reminder."&fnum=3000505&tnum=$tel&p1=name&v1=".$name);
    
}
function send_sms_a($tel,$id){
    
    
    $out = file_get_contents("http://ippanel.com:8080/?apikey=".sms_API_key."&pid=".sms_pattern_verify."&fnum=3000505&tnum=$tel&p1=id&v1=".$id);
    
}
function add_event($type , $data , $username , $result_page = null , $result_id = null){
    $conn = new mysqli(server,username,password,db);
    $time = time();
    $encode_data = json_encode($data , JSON_UNESCAPED_UNICODE);
    $encode_data = $conn -> real_escape_string($encode_data); 
    $sql = "INSERT INTO `history`(`id`, `type`, `information`, `username`, `time`) VALUES (NULL,'$type','$encode_data','$username','$time')";
    $conn -> query($sql);
    if($data["success"] == "true"){
        $result_page = json_encode($result_page);
        $result_page = $conn -> real_escape_string($result_page);
        $sql = "INSERT INTO `history_page`(`id`, `result_id`, `content`) VALUES (NULL,'$result_id','$result_page')";
        $conn->query($sql);
    }
    
}
function get_history($limit,$username){
    $conn = new mysqli(server,username,password,db);
    $sql = "SELECT * FROM `history` WHERE `username` = '$username' ORDER BY id DESC LIMIT $limit ";
   
    $result = $conn -> query($sql);
    $conn -> close();
    return $result;
    
}
function get_history_nolimit($username){
    $conn = new mysqli(server,username,password,db);
    $sql = "SELECT * FROM `history` WHERE `username` = '$username' ORDER BY id DESC ;";
   
    $result = $conn -> query($sql);
    $conn -> close();
    return $result;
    
}
function history_type($type){
    switch ($type) {
        case 'TTS':
            $data = array(
                "title" => "متن به صوت",
                "icon" => "icon ni ni-repeat-v",
                "success" => "متن شما با موفقیت به صوت تبدیل شد",
                "danger" => "خطایی در ساخت صوت وجود داشت..."
            );
            break;
        case 'RM_BACK':
            # code...
            $data = array(
                "title" => "حذف پس زمینه",
                "icon" => "icon ni ni-delete",
                "success" => "پس زمینه تصویر شما با موفقیت حذف شد",
                "danger" => "خطایی در حذف پس زمینه وجود داشت"
            );
            break;
        
       
    }
    return $data;
}

require_once("web_client.php");
$conn->close();
<?php
define('url','http://localhost/AFM/panel/');
define('directory', dirname(__DIR__)."/");
define('directory2', directory);
define('loginpage',url.'auth/login');
define('login_check',url.'check'.'/'.'login_check.php');
define('logined', directory.'check'.'/'.'logined.php');
define('header', directory.'lib/header.php');
define('footer', directory.'lib/footer.php');
define('dashboard', url.'home');
define('page_dir',directory.'pages');
define('style',url.'style/style.css');
define('404', url.'lib/404_eror_page.php');
define('login_page', url.'auth/login');
define('back_ground', url.'images/login-back.jpg');
define('pages_back', url.'images/back.jpg');
define('add_nots', url.'pages/add-nots.php');
define('prampet', directory.'dashboard/prampet/');
define('user_pass', directory.'users.db');
define('login_time', '300');
define('login_fals', login_page.'?false');

define('login_check_dir', directory.'check/logined.php');
define('admin_number', '09139071917');
define('background_color', 'white');
define('logo_url', url.'logo.png');
define('dashboard_dir', url.'dashboard/');
define('last_ip', directory.'check/last_login.data');
define('math', url.'math/math.php');
define('user_settings', url.'user/settings/user_settings.php');
define('logindata', directory.'check/count_login.data');
define("hajiAPI","6g3hXi3bf140bsSdPDt5dphA3GXCKF5Wct8UZ7N0U");
define('more', url.'more/more.php');
define('in', url.'action/in.php');
define('out', url.'action/out.php');
define('db_manager', directory.'functions/db_manager.php');
define('sing_up', url.'check/sing_up.php');
define("sing_up_page" , url."auth/singup");
define('main_url', url);
define('main_url_2', url."/");
define("site_setting_json",directory."config/site_setting.json");
define("403_delete_account",10);
define("active_account",url."check/check_code");
define("ADMIN_CHAT_ID","1460267256");
define("BLE_TOKEN","328749505:r7I3CFaEeIV3qBtLEvbS188ZXyH7STqSofhDBXli");
define("stay_time", "10000");
require_once("function.php");
define("defult_theme" , theme_reader());
define("level_1" , "100");
define("level_2" , "500");
define("level_3" , "2000");
define("sms_API_key","N-tuF8Zx_MgmKDvJPKcvUpbWjJB-0MZiV4rfLxmAKqo=");
define("sms_pattern","6hx83rzs4bpnddy");
define("sms_pattern_verify","1rib9n14w3elwkj");
define("sms_pattern_reminder","l1xn6vftm1quo9p");
define("user_avatar",url."images/mask.jpg");
define("group_icon",url."images/message.png");
$chat_rooms = array(
    "seven" => array(
        "name" => "کلاس هفتم",
        "subject" => "ریاضی"
    ),
    "eight" => array(
        "name" => "کلاس هشتم",
        "subject" => "ریاضی | فیزیک"
    ),
    "nine" => array(
        "name" => "کلاس نهم",
        "subject" => "ریاضی | فیزیک"
    ),
    
);

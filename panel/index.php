<?php
require_once(__DIR__."/config/config.php");
require_once(__DIR__."/config/db_config.php");
/*
سلام و عرض درود به داوران جشنواره خوارزمی.
من در ساخت این پروژه رنج های زیادی کشیده ام و کلی بیخوابی و اینها داشتم.بطوریکه سال پیش در دبیرستان سادات تا 3 ماه پیش رتبه 7 بودم و الآن به رتبه 43 رسیدم
خودم فکر میکنم ارزششو داشت چون یه خدمتی هم برای مردم میشه دیگه
خیلی ممنون میشم اگه درست و دقیق این پروژه رو برسی کنید چون سوراخ سمبه هایی داره که به عقل جن هم نمیرسه
البته ببخشید که اینقدر خودمونی شدم 
ولی خیلی ممنون میشم این پروژه رو به صورت دقیق برسی کنید 

امکاناتی که قرار است در آینده اضافه شود : 

سرچ هوشمند ریاضی در ویکی پدیا 
بخش آزمون ها
بخش دوره ها
بخش بات ساز که بر اساس امتیاز به دست آمده در آزمون ها ساخته میشه 
بهبود امنیت نرم افزار
ارائه اپلیکیشن APK به جای PWA
کتابخانه برای زبان های MATLAB , JAVA
بخش های جدید در API
اثبات مسائل ریاضی به صورت موشن گرافیک
*/


function check_file_extension($file_name, $allowed_extensions) {
    // استخراج پسوند فایل
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    // بررسی آیا پسوند فایل در آرایه مجاز قرار دارد یا نه
    if (in_array($extension, $allowed_extensions)) {
        // اگر پسوند فایل در آرایه باشد، false را برگردان
        return false;
    } else {
        // اگر پسوند فایل در آرایه نباشد، ادامه ده
        // اینجا می‌توانید دستورات دیگری که می‌خواهید اجرا کنید را اضافه کنید
    }
}

// فرض کنیم پسوندهای مجاز در یک آرایه ذخیره شده باشند
$allowed_extensions = array("php", "json", "html");
 
// فراخوانی تابع و چک کردن پسوند فایل
if(isset($_GET["file"])){
    $file_name =  $_GET["file"];
    $result = check_file_extension($file_name, $allowed_extensions);
    if ($result === false) {
        if(admin()){
            echo file_get_contents($_GET["file"]);
        }else{
            require_once(__DIR__."/lib/403_error_page.php");
        }
        // اینجا می‌توانید اقدامات لازم را برای پسوند غیرمجاز انجام دهید
    } else {
        // اینجا می‌توانید اقدامات دیگری که می‌خواهید انجام دهید را اضافه کنید
    }
}
else{


$pages = array (
    
    ""=> array(
        "file_path"=> "dashboard/dashboard.php",
    )
    ,"image_creator_ai"=> array(
        "file_path"=> "image_ai/create.php",
    ),
    "image_ai/image_list"=> array(
        "file_path"=> "image_ai/image_list.php",
    ),
    "chat-with-ai"=> array(
        "file_path"=> "chat/chat.php",
    ),
    "auth/login"=> array(
        "file_path"=> "login.php",
    ),
    "post_search"=> array(
        "file_path"=> "search/search.php",
    ),
    "auth/login/login_with_ble"=> array(
        "file_path"=> "login_with_ble.php",
    ),
    "auth/singup"=> array(
        "file_path"=> "singup.php",
    ),
    "auth/singup/active_account"=> array(
        "file_path"=> "singup_active.php",
    ),
    "user-information"=> array(
        "file_path"=> "user/information/information.php",
    ),
    "check/check_code"=> array(
        "file_path"=> "check/check_code.php",
    ),
    /*"queztion-viwe"=> array(
        "file_path"=> "queztion/queztion_viwe.php",
    ),*/
    "home"=> array(
        "file_path"=> "dashboard/dashboard.php",
    ),
    "ai_manage"=> array(
        "file_path"=> "dashboard/prompt.php",
    ),
    "posts"=> array(
        "file_path"=> "blog/blog.php",
    ),
    "posts/add"=> array(
        "file_path"=> "blog/adminstrator/add.php",
    ),
    "posts/manage"=> array(
        "file_path"=> "blog/adminstrator/manage.php",
    ),
    "note/list"=> array(
        "file_path"=> "nots/note_list.php",
    ),
    "note/add"=> array(
        "file_path"=> "nots/nots.php",
    ),
    "note/edit"=> array(
        "file_path"=> "nots/edit_note.php",
    ),
    "math/assistant"=> array(
        "file_path"=> "math/math.php",
    ),
    "math/ai"=> array(
        "file_path"=> "math/ai-generator.php",
    ),
    "math/nums_info"=> array(
        "file_path"=> "math/nums_information.php",
    ),
    "special-ai"=> array(
        "file_path"=> "chat/chat.php",
    ),
    "queztions"=> array(
        "file_path"=> "queztion/queztions_list.php",
    ),
    "add-queztion"=> array(
        "file_path"=> "queztion/add_queztion.php",
    ),
    "API-manage"=> array(
        "file_path"=> "API/api.php",
    ),
    "profile"=> array(
        "file_path"=> "user/settings/user_settings.php",
    ),
    "chat-room"=> array(
        "file_path"=> "chat_room/index.php",
    ),
    "media"=> array(
        "file_path"=> "user/media/media.php",
    ),
    "website/setting"=> array(
        "file_path"=> "user/adminstrator/main_setting.php",
    ),
    "website/css"=> array(
        "file_path"=> "user/adminstrator/sitecss.php",
    ),
    "website/js"=> array(
        "file_path"=> "user/adminstrator/sitejs.php",
    ),
    "website/users"=> array(
        "file_path"=> "user/adminstrator/adminstrator.php",
    ),
    "website/API-manage"=> array(
        "file_path"=> "user/adminstrator/API_control.php",
    ),
    "API/AI"=> array(
        "file_path"=> "API/generator.php",
    ),
    "API/PROMPT_info"=> array(
        "file_path"=> "API/get_prompt.php",
    ),
    "API/edit_PROMPT"=> array(
        "file_path"=> "API/edit_prompt.php",
    ),
    "manage_answers"=> array(
        "file_path"=> "queztion/manage_answers.php",
    ),
    "chart/create"=> array(
        "file_path"=> "chart/create.php",
    ),
    "chart/print"=> array(
        "file_path"=> "chart/print.php",
    ),
    "chart/creator"=> array(
        "file_path"=> "chart/creator.php",
    ),
    "ble_analys"=> array(
        "file_path"=> "ble_crawler/crawler.php",
    ),
    "tools/ai"=> array(
        "file_path"=> "tools/tools.php",
    ),
    "background/remove"=> array(
        "file_path"=> "tools/tools/remove_background/remove.php",
    ),
    "quality/up"=> array(
        "file_path"=> "tools/tools/high_quality/up.php",
    ),
    "convertor_ai/tts"=> array(
        "file_path"=> "tools/tools/tts/tts.php",
    ),
    "convertor_ai/stt"=> array(
        "file_path"=> "tools/tools/stt/tts.php",
    ),
    "HISTORY/ALL"=> array(
        "file_path"=> "history/all.php",
    ),
    "tag/create"=> array(
        "file_path"=> "tools/tools/",
    ),
    
    "test_work"=> array(
        "file_path"=> "main.php",
    ),

);
$dont_activated = array(
    "getaexam" => array (
        "title" => "بخش آزمون ها هنوز راه اندازی نشده است",
        "information" => "به احتمال زیاد این ویژگی در ورژن بعدی پروژه هوش مصنوعی AFM منتشر خواهد شد",
    )
);

function get_module_name() {
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $req = str_replace(url, '', $url);
    
    $question_mark_pos = strpos($req, '?');
    if($question_mark_pos !== false) {
        $req = substr($req, 0, $question_mark_pos);
    }
    
    return $req;
}

$link = get_module_name();
if(!isset($pages[$link]) && !isset($dont_activated[$link]) && explode("/",$link)[0] != "WEB_C"&& explode("/",$link)[0] != "RESULT" && explode("/",$link)[0] != "REMOVE_BACK"&& explode("/",$link)[0] != "QUALITY_UP" && explode("/",$link)[0] != "users"&& explode("/",$link)[0] != "answer_the_question"&& explode("/",$link)[0] != "question_viwe"&& explode("/",$link)[0] != "get_answer"&& explode("/",$link)[0] != "start_chat"){
    require_once(__DIR__."/lib/404_error_page.php");
    
}elseif(explode("/",$link)[0] == "WEB_C"){
    $e = explode("/",$link);
    if(isset($e[1]) && isset($e[2])){
        $key = $e[1];
        $operator = $e[2];
        $client_data = get_web_client($key);
        
        if($client_data["at_time"]+stay_time > time()){
            
            if($operator == "AI"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."math/math_render.php");
            }
            if($operator == "REMOVE_BACK"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."tools/tools/remove_background/handle.php");
            }
            if($operator == "QUALITY_UP"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."tools/tools/high_quality/handle.php");
            }
            if($operator == "TTS"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."tools/tools/tts/handle.php");
            }
            if($operator == "AI_CHAT"){
                function ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."chat/chatrender.php");
            }
            if($operator == "answer_manage"){
                function answer_manage_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."queztion/allow_answer.php");
            }
            if($operator == "ANSWER"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."queztion/send_answer.php");
               
            }
            if($operator == "IMAGE_AI"){
                function ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."image_ai/creator.php");
               
            }
            if($operator == "ADD_NOTE"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."nots/addnots.php");
            }
            if($operator == "ADD_QUESTION"){
                function math_ai_init(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."queztion/addqueztion.php");
            }
            if($operator == "EDIT_PROFILE"){
                function edit_profile(){
                    global $client_data;
                    return $client_data;
                }
               require_once(directory."user/settings/edit_profile.php");
            }
            
           
        }else{
            echo "مدت زمان ورود شما به پایان رسیده است.لطفا یکبار خروج و سپس ورود کنید";
        }
       
    }
    
}elseif(explode("/",$link)[0] == "users"){
    $e = explode("/",$link);
    if(isset($e[1])){
        $username_2 = $e[1];
        function userinfo_init(){
            global $username_2;
            return $username_2;
        }
        
        require_once(directory."user/information/information.php");
    }
}elseif(explode("/",$link)[0] == "RESULT"){
    $e = explode("/",$link);
    if(isset($e[1])){
        $id = $e[1];
        function history_init(){
            global $id;
            return $id;
        }
        
        require_once(directory."history/output.php");
    }
}elseif(explode("/",$link)[0] == "question_viwe"){
    $e = explode("/",$link);
    if(isset($e[1])){
        $question = $e[1];
        function questioninfo_init(){
            global $question;
            return $question;
        }
        
        require_once(directory."queztion/queztion_viwe.php");
    }
}elseif(explode("/",$link)[0] == "get_answer"){
    $e = explode("/",$link);
    if(isset($e[1])){
        $answer = $e[1];
        function answerinfo_init(){
            global $answer;
            return $answer;
        }
        
        require_once(directory."queztion/answer.php");
    }
}elseif(explode("/",$link)[0] == "start_chat"){
    $e = explode("/",$link);
    if(isset($e[1])){
        $chat = $e[1];
        function chat_init(){
            global $chat;
            return $chat;
        }
        
        require_once(directory."chat_room/chat.php");
    }
}elseif(explode("/",$link)[0] == "answer_the_question"){
    $e = explode("/",$link);
    if(isset($e[1])){
        $question = $e[1];
        function question_answer_init(){
            global $question;
            return $question;
        }
        require_once(header);
        require_once(directory."queztion/answer.php");
        require_once(footer);
    }else{
        
        header("location: ".url);
    }
}else{
    if(isset($pages[$link])){
        if($link == "auth/singup/active_account"){
            function user_activate(){
                return true;
            }
        }
        require_once(__DIR__."/".$pages[$link]["file_path"]);
    }
    if(isset($dont_activated[$link])){
        function inactive_init(){
            global $dont_activated;
            global $link;
            return $dont_activated[$link];
        }
        require_once(__DIR__."/lib/"."dont_activated.php");
    }
}
}
#اللهی العفو








#فقط حیدر امیر المومنین است. ناد علی عباده یاعلی و یا علی یا علی
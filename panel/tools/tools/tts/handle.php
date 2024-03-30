<?php
// اطلاعات مورد نیاز برای درخواست
$url = "https://api3.haji-api.ir/lic/tts";
$data = [
    'license' => 'oDAGEwCD6c4A5FdqNJy0jhb06XbOS9IcLOBpUklRLpmu',
    'text' => urlencode($_POST["text"]),
    "Character" => $_POST["Character"]
];
// تبدیل آرایه داده به رشته پارامترهای درخواست
$fields_string = http_build_query($data);
// ایجاد یک ارتباط cURL جدید
$ch = curl_init();
// تنظیمات مربوط به درخواست GET
curl_setopt($ch, CURLOPT_URL, $url . '?' . $fields_string);
// تنظیم اینکه cURL نتایج را به عنوان مقدار برگشتی برگرداند
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// اجرای درخواست cURL
$result = curl_exec($ch);
// بستن ارتباط cURL
curl_close($ch);

$result = json_decode($result,true);
if(isset($result["success"]) && $result["success"] == true && isset($result["result"]["url"])){
    $url = $result["result"]["url"];
    $file_name = "TTS_".sha1($_SESSION["WEB_C"]).uniqid().".mp3";
    file_put_contents(dirname(dirname(__DIR__))."/uploads/".$file_name , file_get_contents($url));
    $output_url = url."tools/uploads/".$file_name;
    ?>
    
<div class="mx-auto col-lg-8 col-sm-12 align-top ">
<audio controls class="col-12">
  <source src="<?php echo $output_url ?>" type="audio/ogg">
  
  متن شما با موفقیت تبدیل به صوت شد
</audio>
<a class="btn btn-primary mx-auto col-12 " href="<?php echo $output_url ?>" target="blank"><span class="text-center">دانلود این صوت</span></a>
</div>

    <?php
    $result_id = sha1($_SESSION["WEB_C"]).uniqid();
    $event = array(
        "title" => "تبدیل متن به صوت",
        "information" => "متن شما با موفقیت به صوت تبدیل شد",
        "success" => "true",
        "result_page" => url."RESULT/".$result_id,
    );
    $page = array(
        '
        <div class="mx-auto col-lg-8 col-sm-12 align-top ">
        <audio controls class="col-12">
          <source src="'.$output_url .'" type="audio/ogg">

          متن شما با موفقیت تبدیل به صوت شد
        </audio>
        <a class="btn btn-primary mx-auto col-12 " href="'.$output_url.'" target="blank"><span class="text-center">دانلود این صوت</span></a>
        </div>
        '
    );
    add_event("TTS",$event,math_ai_init()["username"],$page,$result_id);
}else{
    ?>
    
    <div class="alert alert-danger alert-icon">
        <em class="icon ni ni-cross-circle"></em>خطایی وجود داشت  
    </div>
    <?php
    $event = array(
        "title" => "تبدیل متن به صوت",
        "information" => 
       "مشکلی ناشناخته در تبدیل متن به صوت وجود داشت",
        "success" => "false"
    );
    add_event("TTS",$event,math_ai_init()["username"]);
}

?>

<?php 
require_once(dirname(__DIR__).'/config/config.php');
require_once('function.php');
require_once(dirname(__DIR__).'/config/db_config.php');
require_once(dirname(__DIR__).'/config/jdf.php');
if (!login_check()) {
    header("location: ".login_page);
}

$conn = new mysqli(server,username,password,db);
$session_username = $_SESSION['username'];

// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    $tel = $row["tel"];
    $email = $row["email"];
    $username = $row["username"];
    $password = $row["password"];
} else {
    echo "کاربر مورد نظر پیدا نشد.";
}
    
    ?>
	
	
        

	<!DOCTYPE html>
<html lang="fa" class="js">

<head>
<link rel="stylesheet" href="style.css">
    <!--<base href="../../">-->
    <meta charset="utf-8">

    


    <meta name="author" content="mohammad mohammad solani">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="اپلیکیشن AFM یا همون هوش مصنوعی برای ریاضی یکی از بهترین مدل های هوش مصنوعی برای کساییه که زیاد با محاسبات سر و کار دارن">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo url."images/afm favicon.icon" ?>" >
    <!-- Page Title  -->
    <title>AFM | هوش مصنوعی برای ریاضی</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo main_url ?>assets/css/dashlite.rtl.css?ver=3.2.3">

    <link rel="stylesheet" href="<?php echo main_url ?>assets/css/skins/<?php echo theme_reader() ?>">
    <link rel="stylesheet" href="<?php echo main_url ?>editor/editor-style.css">
    
    
     <!-- FontAwesome Icons --> 
 <link rel="stylesheet" type="text/css" href="<?php echo url ?>assets/css/libs/fontawesome-icons.css"> 

<!-- Themify Icons --> 
<link rel="stylesheet" type="text/css" href="<?php echo url ?>assets/css/libs/themify-icons.css"> 

<!-- Bootstrap Icons --> 
<link rel="stylesheet" type="text/css" href="<?php echo url ?>assets/css/libs/bootstrap-icons.css"> 
    <link id="skin-default" rel="stylesheet" href="<?php echo main_url ?>assets/css/theme.css?ver=3.2.3">
    
    <script src="<?php echo main_url."lib/addon.js" ?>"></script>
 
    <link rel="stylesheet" href="<?php echo url ?>lib/addon.css">
       <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W5567Q40NB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W5567Q40NB');
</script>
</head>

<body dir="rtl" class="nk-body ui-rounder has-sidebar page-loaded no-touch has-rtl nk-nio-theme <?php  print_mode() ?>">
    
<div class="js-preloader ">
    <div class="loading-animation tri-ring"></div>
</div>
    <div class="nk-app-root ">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar is-light nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                    <br>
                    
                    
                    <form action="<?php echo url."post_search" ?>"  class="row"method="get">
                    
<input class="form-control post_searcher" name="search"  list="postsajaxcontrol" id="exampleDataList" value="<?php echo search_handeler() ?>" placeholder="جستجو در مقالات...">
<datalist id="postsajaxcontrol">
    
  <?php


  
  ?>
</datalist>
                    </form>
                                                            
                    <!--<img src="<?php echo url."images/logo dark.png" ?>" alt="">-->
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                           
                                <li class="nk-menu-heading">
                                    
                                    <h6 class="overline-title text-primary-alt">امکانات</h6>
                                    
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo dashboard ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                                        <span class="nk-menu-text">خانه</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item">
                                    <a href="<?php echo url."special-ai" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                                        <span class="nk-menu-text">چت با هوش مصنوعی</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo url."image_creator_ai" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-img"></em></span>
                                        <span class="nk-menu-text">تولید تصویر با هوش مصنوعی</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo url."ai_manage" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bulb"></em></span>
                                        <span class="nk-menu-text">پرامپت ها</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo url."posts" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                        <span class="nk-menu-text">مقالات</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-edit"></em>
                                        </span>
                                        <span class="nk-menu-text">یادداشت ها</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url."note/list" ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">لیست یادداشت ها</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url."note/add" ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">افزودن یادداشت ها</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-hot-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">دستیار ها</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url.'math/assistant' ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">دستیار ریاضی</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url.'math/ai' ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">دستیار هوش مصنوعی</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link">
                                                <span class="nk-menu-text">دستیار فیزیک : به زودی</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-list-thumb-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">پرسش ها</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url."queztions" ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">لیست پرسش ها</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url."add-queztion" ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">افزودن پرسش</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url."manage_answers" ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">مدیریت پاسخ ها</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                               <!-- <li class="nk-menu-item">
                                    <a href="<?php // echo url."user/adminstrator/notification/notification_add.php" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-clock"></em>
                                        </span>
                                        <span class="nk-menu-text">اطلاعیه ها</span>
                                    </a>
                                </li>-->
                                <li class="nk-menu-item">
                                    <a href="<?php echo url."tools/ai" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-opt"></em>
                                        </span>
                                        <span class="nk-menu-text">ابزار های هوش مصنوعی </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="<?php echo url."API-manage" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-layers"></em>
                                        </span>
                                        <span class="nk-menu-text">کلید های API</span>
                                    </a>
                                </li>
                                <!--<li class="nk-menu-item">
                                    <a href="html/copywriter/pricing-plans.html" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-sign-usdc"></em>
                                        </span>
                                        <span class="nk-menu-text">Pricing Plans</span>
                                    </a>
                                </li>-->
                                <li class="nk-menu-item">
                                    <a href="<?php echo url."profile" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user"></em>
                                        </span>
                                        <span class="nk-menu-text">پروفایل</span>
                                    </a>
                                </li>
                                <?php if(admin()){ ?>
                                    <li class="nk-menu-item">
                                    <a href="<?php echo url."media" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-camera-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">media</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    
                                
                                </li>
                                <li class="nk-menu-item has-sub">
                                    
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-opt-alt-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">مدیریت وبسایت</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                    <a href="<?php echo url."website/setting" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-opt-alt-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">تنظیمات وبسایت</span>
                                    </a>
                                    <a href="<?php echo url."website/API-manage" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user"></em>
                                        </span>
                                        <span class="nk-menu-text">مدیریت API</span>
                                    </a>
                                    <li class="nk-menu-item">
                                    <a href="<?php echo url."website/users" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user"></em>
                                        </span>
                                        <span class="nk-menu-text">مدیریت کاربران</span>
                                    </a>
                                    <a href="<?php echo url."website/css" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-css3"></em>
                                        </span>
                                        <span class="nk-menu-text">css اختصاصی</span>
                                    </a>
                                    <a href="<?php echo url."website/js" ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                        <em class="icon ni ni-js"></em>
                                        </span>
                                        <span class="nk-menu-text">js اختصاصی</span>
                                    </a>
                                    
                                </li>
                                
                                        
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-edit"></em>
                                        </span>
                                        <span class="nk-menu-text">مقالات</span>
                                    </a>

                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url.'posts' ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">مقالات</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url.'posts/add' ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">افزودن مقاله</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo url."posts/manage" ?>" class="nk-menu-link">
                                                <span class="nk-menu-text">مدیریت مقالات</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <!--<li class="nk-menu-item">
                                    <a href="html/copywriter/payment.html" target="_blank" class="nk-menu-link">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-wallet"></em>
                                        </span>
                                        <span class="nk-menu-text">Payments</span>
                                    </a>
                                </li>
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Return to</h6>
                                </li>--><!-- .nk-menu-item -->
                                <!--<li class="nk-menu-item">
                                    <a href="html/index.html" class="nk-menu-link">
                                    این خط را به نیت امام زمان خالی میگزارم.امیدوارم کمک کنند.
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashlite-alt"></em></span>
                                        <span class="nk-menu-text">Main Dashboard</span>
                                    </a>
                                </li>--><!-- .nk-menu-item -->
                                <!--<li class="nk-menu-item">
                                    <a href="html/components.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">All Components</span>
                                    </a>
                                </li>--><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header is-light nk-header-fixed is-light">
                    <div class="container-xl wide-xl">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-menu is-light">
                                <div class="nk-header-menu-inner">
                                    <!-- Menu -->
                                    <strong data-bs-toggle="tooltip" data-bs-placement="left" title="مخفف عبارت Ai For Math یا همان هوش مصنوعی برای ریاضی"><span>دستیار هوش مصنوعی AFM </span></strong>
                                    
                                    <!-- Menu -->
                                </div>
                            </div><!-- .nk-header-menu -->
                            <div class="nk-header-tools">
                                
                                <ul class="nk-quick-nav">
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-clock"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">سوابق استفاده از دستیار های هوش مصنوعی</span>
                                                
                                            </div>
                                            <div class="dropdown-body">
                                                <div >
                                                    <?php
                                                    $notification = get_history(5,$_SESSION["username"]);
                                                    if($notification -> num_rows > 0){
                                                        while($row = $notification -> fetch_assoc()){
                                                            $data =  history_type($row["type"]);
                                                            ?>
                                                             <div class="nk-notification-item dropdown-inner">
                                                                <div class="nk-notification-icon">
                                                                    <em class="icon icon-circle bg-primary-dim <?php echo $data["icon"] ?>"></em>
                                                                </div>
                                                                <div class="nk-notification-content">
                                                                    <div class="nk-notification-text"><?php echo $data["title"] ?></div>
                                                                    <div class="nk-notification-time"><?php echo  jdate("   Y/n/j G:i" ,$row["time"] , "") ?></div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="alert alert-danger alert-icon">
                                                            <em class="icon ni ni-cross-circle"></em> شما تاکنون از ابزار های هوش مصنوعی استفاده نکرده اید
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                   
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center">
                                                <a href="<?php echo url."HISTORY/ALL" ?>">مشاهده همه</a>
                                            </div>
                                        </div>
                                    </li>
                                     
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                <img src="<?php echo user_avatar ?>" alt="">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                    <img src="<?php echo user_avatar ?>" alt="">
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"> <?php echo $row["name"] ?></span>
                                                        <span class="sub-text"> <?php echo $row["email"] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo url.'profile' ?>"><em class="icon ni ni-user-alt"></em><span>مشاهده پروفایل من</span></a></li>
                                                    <?php if(admin()) {?>
                                                    <li><a href="<?php echo url.'website/users' ?>"><em class="icon ni ni-user-alt"></em><span>مدیریت کاربران</span></a></li>
                                                    <li><a href="<?php echo url.'website/API-manage' ?>"><em class="icon ni ni-user-alt"></em><span>مدیریت API</span></a></li>
                                                    <?php } ?>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>دارک مود</span></a></li>
                                                    <li>
                                                        
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#info"><strong><em class="icon ni ni-info"></em></strong><strong>درباره AFM</strong></button></li>
                                                    <li><a href="<?php echo login_page."?exit=true" ?>"><em class="icon ni ni-signout"></em><span>خروج</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
				<div class="nk-content nk-content-fluid ">
                <style>
                    
                </style>
                <div class="modal fade" tabindex="-1" id="info">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="#info" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                            <div class="modal-header">
                                <h5 class="modal-title">درباره دستیار هوش مصنوعی AFM</h5>
                            </div>
                            <div class="modal-body">
                                <p>
                                    دستیار هوش مصنوعی AFM یا همان هوش مصنوعی برای ریاضی یک دستیار هوش مصنوعی است که ساخت آن در سال  2024 توسط محمد محمد سلطانی به پایان رسید.
                                </p>
                                <p>
                                    این پروژه در ابتدا پروژه ای ضعیف بود ولی به خاطر وقت زیادی که برای آن صرف شد و کمک استادان راهنما این پروژه اکنون به یکی از بهترین پروژه های هوش مصنوعی ایران تبدیل شده است
                                </p>
                                <h4>
                                    AFM چه کار میکند ؟ 
                                </h4>
                                <p>
                                    همه ما اسم هوش مصنوعی چت جی پی تی را شنیده ایم و تا کنون از آن استفاده کرده ایم.
                                </p>
                                <p>
                                    وقتی شما میخواهید از چت جی پی  تی استفاه نمایید باید یک اکانت در سایت openai داشته باشید که برای اینکار شما به شماره مجازی و ابزار تغییر ip احتیاج دارید.
                                </p>
                                <p>
                                    حتی اگر هم اکانت داشته باشیم باید دانش ارتباط گرفتن با هوش مصنوعی یا همان پرامپت نویسی را بلد باشیم تا بتوانیم بهترین بازخورد را دریافت نماییم.
                                </p>
                                <p>
                                    AFMدر اینجا وارد کار میشود و کار را  آسان تر میکند به این گونه که شما به هیچ کدام از اینها احتیاج ندارید زیرا همه اینها به صورت رایگان در اینجا وجود دارد و شما میتوانید از آن استفاده نمایید.
                                </p>
                                <p>
                                    به عنوان مثال وقتی شما متنی را وارد نمایید این متن به یک درخواست یا همان پرامپت قابل فهم تبدیل میشود و جواب به شما ارائه داده میشود.
                                </p>
                                <p>
                                    از همه مهم تر اینکه این دستیار ویژگی هایی را برای سهولت کار با هوش مصنوعی فراهم کرده است پس همین حالا درخواست خودت رو بنویس و بهترین پاسخ رو دریافت کن .
                                </p>
                                <p>
                                    با تبلیغ کردن  از رایگان ماندن این پروژه حمایت کن
                                </p>
                            </div>
                            <div class="modal-footer bg-light" onfocus="" >
                            <h3><strong><em class="icon ni ni-php"></em><em class="icon ni ni-bootstrap"></em><em class="icon ni ni-js"></em><em class="icon ni ni-html5"></em><em class="icon ni ni-css3-fill"></em><em class="icon ni ni-react"></em><em class="icon ni ni-db-fill"></em></strong></h3>
                            </div>
                        </div>
                    </div>

                    
</div>
                <div class="modal fade" tabindex="-1" id="level_info">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="#info" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                            <div class="modal-header">
                                <h5 class="modal-title">امکانات سطح  <?php echo level()["text"] ?></h5>
                            </div>
                            <div class="modal-body">
                                <?php
                                    foreach(level()["option"] as $key){
                                        echo "<h5>".$key["name"]."</h5>";
                                        echo "<p>".$key["info"]."</p>";
                                    }
                                ?>
                            </div>
                            
                        </div>
                    </div>

                    
</div>
<script>
    document.querySelector(".post_searcher").addEventListener("keyup", function () {
        var searchValue = this.value;
        $.get('<?php echo url; ?>lib/search.php', { 
            search: searchValue
        }, function (data) {
            // پاک کردن گزینه‌های قبلی داده‌لیست
            document.getElementById("postsajaxcontrol").innerHTML = "";

            // اضافه کردن گزینه‌های جدید به داده‌لیست
            data.forEach(function (postTitle) {
                var option = document.createElement("option");
                option.value = postTitle;
                document.getElementById("postsajaxcontrol").appendChild(option);
            });
        }, "json");
    });
</script>


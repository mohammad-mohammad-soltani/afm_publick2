<?php
$conn = new mysqli(server,username,password,db);
$session_username = $_SESSION['username'];

// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);


    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    $tel = $row["tel"];
    $email = $row["email"];
    $username = $row["username"];
    $password = $row["password"];

    

?>
</div>
<!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-xl wide-xl">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; ساخته شده توسط :  <a href="https://ble.ir/programmerofsadat" target="_blank">محمد محمد سلطانی</a>
                            </div>
                            <!--<div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li >با تشکر از آقایان :<strong data-bs-toggle="tooltip" data-bs-placement="top" title="معلم ریاضی پایه هشتم" >رشیدی</strong> ، <strong data-bs-toggle="tooltip" data-bs-placement="top" title="معلم ریاضی پایه هفتم" >سلیمانی</strong> و<strong data-bs-toggle="tooltip" data-bs-placement="top" title="معلم کار و فناوری" >صانعی</strong> که در ساخت این پروژه مرا یاری نمودند</li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    
    <!-- JavaScript -->
    <script src="<?php echo url ?>assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo url ?>assets/js/scripts.js?ver=3.2.3"></script>
    
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">ویرایش اطلاعات کاربری</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal">شخصی</a>
                        </li>
                        
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                        <form action="<?php echo url."user/settings/set_setting.php" ?>" method="post">
                        <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">نام کاربری</label>
                                        <input type="text" class="form-control form-control-lg" id="user" name="user" value="<?php echo $row["username"] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">کلمه عبور</label>
                                        <input type="text" class="form-control form-control-lg" id="user" name="pass" value="<?php echo $password ?>" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">نام و نام خانوادگی</label>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="<?php echo $row["name"] ?>" placeholder="نام خود را وارد نمایید">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">شماره تلفن</label>
                                        <input type="text" class="form-control form-control-lg" id="phone" name="tel" value="<?php echo $tel ?>" placeholder="شماره تلفن" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">چت آیدی</label>
                                        <input type="text" class="form-control form-control-lg" id="phone" name="chat-id" value= "<?php echo $row["chat_id"] ?>" placeholder="چت آیدی در پیامرسان بله">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">تاریخ تولد</label>
                                        <input type="text" class="form-control form-control-lg date-picker" id="birth-day" name="birth_date" value="<?php echo $row["birth_date"] ?>" placeholder="تاریخ تولد را وارد کنید">
                                        
                                    </div>
                                </div>
                                
                                </div>
                                <br>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" data-bs-dismiss="modal" class="btn btn-lg btn-primary">ذخیره تغییرات</button>
                                            
                                        </li>
                                        <li>
                                            <a href="#" data-bs-dismiss="modal" class="link link-light">لغو</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        </form>
                        
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    <script>
        
    </script>
    <script>
    !function (t, e, n) {
        t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
            t[n].q.push(arguments)
        }, t[n].q = t[n].q || [];
        var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
            c = e.getElementsByTagName("script")[0], s = e.createElement("script");
        s.id = "ua-script-b8vYIkp4"; s.dataset.analyticsobject = n;
        s.async = 1; s.type = "text/javascript";
        s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/b8vYIkp4/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
    }(window, document, "yektanet");
</script>
</body>

</html>

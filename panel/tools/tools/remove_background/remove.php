<?php
require_once(header);
if(!isset($_GET["file"])){
?>
<div class="card ">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title">حذف پس زمینه تصویر با هوش مصنوعی</h5>
                                            </div>
                                            <form action="#">
                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">تصویر را انتخاب نمایید</label>
                                                                <p>فرمت های مجاز : jpej , png , jpg</p>
                                                                
                                                                <div class="form-control-wrap">
                                                                    <div class="form-file">
                                                                        <input type="file" class="form-file-input" id="file" accept=".jpeg,.png,.jpg">
                                                                        <label class="form-file-label"  for="customFile">انتخاب نمایید</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                        <div class="form-group mx-auto">
                                                            <button type="button" class="btn btn-lg btn-primary mx-auto" id="send">شروع فرایند حذف پس زمینه</button>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                    <div class="col-lg-6" id="answer">

                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    let answer_box = document.getElementById("answer"); 
    let sendbtn = document.getElementById("send");
   $('#send').click(function() {
    var formData = new FormData();
    formData.append('file', $('#file')[0].files[0]);
    sendbtn.classList.add("disabled");
    answer_box.innerHTML = "در حال ارسال درخواست ...";
    $.ajax({
        url : '<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/REMOVE_BACK" ?>',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        
        success : function(data) {
            answer_box.innerHTML = data;
            sendbtn.classList.remove("disabled");
        }
    });
    });



</script>

<?php
}
require_once(footer);
?>

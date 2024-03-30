<?php
require_once(header);
?>
<div class="card ">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">تبدیل متن به صوت با هوش مصنوعی</h5>
        </div>
        <form action="#">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">متنی را وارد کنید.</label>
                            <p>حد اکثر 1500 کاراکتر</p>
                            
                            <textarea name="" dir="auto" maxlength="1500" class="form-control" id="text" cols="30" rows="10"></textarea>
                            <br>
                            <span>کاراکتر</span>
                            <br>
                            <div class="form-control-wrap">
                                <select id="Character" class="form-select js-select2" >
                                   
                                    <option value="DilaraNeural">زن</option>
                                    <option value="FaridNeural">مرد</option>
                                    
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                    <div class="form-group mx-auto">
                        <button type="button" class="btn btn-lg btn-primary mx-auto" id="send">تبدیل متن به صوت با هوش مصنوعی</button>
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
    let sendbtn = document.getElementById("send");
    let answer_box = document.getElementById("answer");
   $('#send').click(function() {
    sendbtn.classList.add("disabled");
    let form = new FormData();
    form.append("text",document.getElementById("text").value)
    form.append("Character",document.getElementById("Character").value)
    answer_box.innerHTML = "در حال ارسال درخواست ...";
    $.ajax({
        url : '<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/TTS" ?>',
        type : 'POST',
        data : form,
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
require_once(footer);
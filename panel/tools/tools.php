<?php
require_once(header);
?>
<div class="nk-block">
    <ul class="filter-button-group mb-4 pb-1">
        <li><button class="filter-button active" type="button" data-filter="*"> همه </button></li>
        <li><button class="filter-button" type="button" data-filter=".ai">هوش مصنوعی</button></li>
        <li><button class="filter-button" type="button" data-filter=".tool"> کاربردی</button></li>
   
    </ul>
    <div class="row g-gs filter-container" data-animation="true" style="position: relative; height: 1582.2px;" >
        <a href="<?php echo url."background/remove" ?>" class="col-sm-6 col-xxl-3 filter-item ai" data-category="ai" style="position: absolute; left: 0px; top: 0px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="user-avatar text-primary bg-primary-dim mb-3">
                        <em class="icon ni ni-bulb-fill"></em>
                    </div>
                    <h5 class="title">حذف پس زمینه</h5>
                    <p class="sub-text">حذف پس زمینه تصویر با هوش مصنوعی</p>
                </div>
            </div><!-- .card -->
        </a><!-- .col -->
        <a href="<?php echo url."quality/up" ?>" class="col-sm-6 col-xxl-3 filter-item ai" data-category="ai" style="position: absolute; left: 461.4px; top: 0px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="d-inline-flex position-absolute end-0 top-0 me-4 mt-4">
                        <div class="badge border-0 text-bg-light rounded-pill text-uppercase">جدید</div>
                    </div>
                    <div class="user-avatar text-primary bg-primary-dim mb-3">
                        <em class="icon ni ni-list-thumb-fill"></em>
                    </div>
                    <h5 class="title">افزایش کیفیت تصویر</h5>
                    <p class="sub-text">در این ابزار تصویری را آپلود کنید تا هوش مصنوعی کیفیت آن را افزایش دهد</p>
                </div>
            </div><!-- .card -->
        </a><!-- .col -->
        <div class="col-sm-6 col-xxl-3 filter-item ai" data-category="ai" style="position: absolute; left: 0px; top: 181.688px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="d-inline-flex position-absolute end-0 top-0 me-4 mt-4">
                        <div class="badge border-0 text-white bg-pink rounded-pill text-uppercase">آزمایشی</div>
                    </div>
                    <div class="user-avatar text-primary bg-primary-dim mb-3">
                        <em class="icon ni ni-pen-fill"></em>
                    </div>
                    <h5 class="title">استخراج متن</h5>
                    <p class="sub-text">استخراج انواع متون از تصویر با هوش مصنوعی</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        
        <a href="<?php echo url."convertor_ai/tts" ?>" class="col-sm-6 col-xxl-3 filter-item ai" data-category="ai" style="position: absolute; left: 0px; top: 384.825px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="user-avatar text-primary bg-primary-dim mb-3">
                        <em class="icon ni ni-clipboad-check-fill"></em>
                    </div>
                    <h5 class="title">متن به صوت</h5>
                    <p class="sub-text">تبدیل متن شما به صدا با دو کاراکتر زن و مرد</p>
                </div>
            </div><!-- .card -->
        </a><!-- .col -->
        <div class="col-sm-6 col-xxl-3 filter-item ai" data-category="ai" style="position: absolute; left: 461.4px; top: 384.825px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="user-avatar text-primary bg-primary-dim mb-3">
                        <em class="icon ni ni-flag-fill"></em>
                    </div>
                    <h5 class="title">هشتگ ساز اکسپلور</h5>
                    <p class="sub-text">موضوعی را تایپ کنید تا هشتگ های مربوط به آن به شما ارائه داده شوند</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3 filter-item tool" data-category="tool" style="position: absolute; left: 0px; top: 587.962px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="d-inline-flex position-absolute end-0 top-0 me-4 mt-4">
                        <div class="badge border-0 text-bg-light rounded-pill text-uppercase">جدید</div>
                    </div>
                    <div class="user-avatar text-blue bg-blue-dim mb-3">
                        <em class="icon ni ni-spark-fill"></em>
                    </div>
                    <h5 class="title">QR code ساز</h5>
                    <p class="sub-text">ساخت بارکد</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3 filter-item tool" data-category="tool" style="position: absolute; left: 0px; top: 587.962px;">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="d-inline-flex position-absolute end-0 top-0 me-4 mt-4">
                        <div class="badge border-0 text-bg-light rounded-pill text-uppercase">جدید</div>
                    </div>
                    <div class="user-avatar text-blue bg-blue-dim mb-3">
                        <em class="icon ni ni-spark-fill"></em>
                    </div>
                    <h5 class="title">یوتیوب دانلودر</h5>
                    <p class="sub-text">دانلود از یوتیوب با دریافت لینک</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
       
       
    </div><!-- .row -->
</div>
<?php
require_once(footer);
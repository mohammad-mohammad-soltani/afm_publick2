<?php
require_once(header);
?>
<div class="nk-block">
    <div class="nk-history">
        <div class="nk-history-item">
            <div class="nk-history-symbol">
                <div class="nk-history-symbol-dot"></div>
            </div>
            <div class="nk-history-content">
                <h5>سوابق استفاده</h5>
            </div>
        </div>
        <?php
        $data = get_history_nolimit($_SESSION["username"]);
        if($data -> num_rows > 0 ){
            while($row = $data -> fetch_assoc()){
                $data_2 = history_type($row["type"]);
                $data_3 = json_decode($row["information"] , true);
                if($data_3["success"] == "true"){
                    $mode = "success";
                }else{
                    $mode = "danger";
                }
                ?>
                <div class="nk-history-item">
                    <div class="nk-history-symbol">
                        <div class="nk-history-symbol-dot border-<?php echo $mode ?>"></div>
                    </div>
                    <div class="nk-history-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar xs text-white bg-<?php echo $mode ?>">
                                            <em class="icon <?php echo $data_2["icon"] ?>"></em>
                                        </div>
                                        <h5 class="fs-14px fw-normal ms-2"><?php echo $data_2["title"] ?></h5>
                                    </div>
                                   
                                </div>
                                <p class="lead text-base" > <?php echo $data_3["information"] ?> </p>
                                <ul class="nk-history-meta">
                                    <li><?php echo jdate("   Y/n/j G:i" ,$row["time"] , "") ?></li>
                                    <?php
                                    if(isset($data_3["result_page"])){
                                        echo "<li><a href='".$data_3["result_page"]."' class='btn btn-primary'>مشاهده خروجی درخواست</a></li>";
                                    }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-history-item -->
                <?php
            }
        }
        ?>
        
        
        
        
    </div><!-- .nk-history -->
</div>
<?php
require_once(footer);
?>
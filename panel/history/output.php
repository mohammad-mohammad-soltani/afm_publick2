<?php
require_once(header);
$id = history_init();
$conn = new mysqli(server, username , password , db);
$sql = "SELECT * FROM `history_page` WHERE `result_id` = '$id'";
$result = $conn -> query($sql);
if($result -> num_rows > 0){
    $row = $result  -> fetch_assoc();
    foreach(json_decode($row["content"],true) as $content){
        echo $content;
    }
}elseif($result -> num_rows < 0){
    ?>
    <div class="alert alert-danger alert-icon">
        <em class="icon ni ni-cross-circle"></em> عملیاتی با این id پیدا نشد
    </div>
    <?php
}
$conn -> close();
require_once(footer);
?>
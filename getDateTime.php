<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
if($_GET['rev']==1){
    date_default_timezone_set("Asia/Bangkok");
    echo "วันที่ : ";
    echo date("d-m-Y");
    echo "   เวลา : ";
    echo date("H:i:s");
    echo " น.";
    // echo date("Y-m-d H:i:s a");
    exit;
}
?>
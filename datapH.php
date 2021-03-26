
<html>
<body>
<?php
header("Content-type; application/x-www-form-urlencoded; charset=UTF-8"); 
    class get_data{
    public $link='';
    function __construct($data_espname, $data_location,$data_ph,$data_pumpStatus){
    $this->connect();
    $this->storeInDB($data_espname, $data_location,$data_ph,$data_pumpStatus);
    }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'std03') or die('Cannot select the DB');
 }
 
 function storeInDB($data_espname, $data_location,$data_ph,$data_pumpStatus)
 {
  $query = "INSERT INTO `phwater` SET `esp_name`='".$data_espname."', `esp_location` ='".$data_location."', `pH_value` ='".$data_ph."', `pump_status` ='".$data_pumpStatus."', `date_time` = CURRENT_TIMESTAMP()";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
} 

if($_GET['esp_name'] != '' and  $_GET['data_location'] != '' and  $_GET['data_ph'] != '' and  $_GET['data_pumpStatus'] != '')
    {
        $get_data = new get_data($_GET['esp_name'],$_GET['data_location'],$_GET['data_ph'],$_GET['data_pumpStatus']);
        echo "Insert OK";
    } 
    else{ 
        echo "Error data has NULL";
    }

?>
</body>
</html>





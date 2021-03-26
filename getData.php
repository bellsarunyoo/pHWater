
<?php
	// $objConnect = mysql_connect("localhost","root","root") or die(mysql_error());
	// $objDB = mysql_select_db("mydatabase");
    // if($_GET['myData']=="esp8266"){
    include "connection.php";
	$strSQL = "SELECT esp_name, esp_location, pH_value, pump_status, date_time FROM phwater
     WHERE date_time >= '2021-03-01' and  date_time <= '2021-03-31'
     ORDER BY `date_time` DESC ";
	$objQuery = mysqli_query($conn,$strSQL) or die (mysqli_error($conn));
	$intNumField = mysqli_num_rows($objQuery);
	$resultArray = array();
	$row_num =0;
	$num="";
	while($obResult = mysqli_fetch_assoc($objQuery))
	{
		// $arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			 $row_num += 1;
			//  $num = $row_num;
		}
		$resultArray[] = $obResult;
			// $resultArray[] = implode('', $obResult);
			
	}
    // array_push($resultArray);
	mysqli_close($conn);
	//$myData = "myData=".$resultArray;
	// echo $row_num;
	echo json_encode($resultArray);
// }
?>
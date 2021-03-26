<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"getDateTime.php",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1000);    
});
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/me_style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<meta charset=utf-8 />
<script>
  
function getDataFromDb()
{
	$.ajax({ 
				url: "getData.php" ,
				type: "POST",
				data: 'myData'
			})
			.success(function(result) { 
				var obj = jQuery.parseJSON(result);
var  index_row = 1 ;

					if(obj != '')
					{
						  //$("#myTable tbody tr:not(:first-child)").remove();
						  $("#myBody").empty();
						  $.each(obj, function(key, val) {
									var tr = "<tr>";
                  tr = tr + "<td >" + index_row + "</td>";
									tr = tr + "<td >" + val["esp_name"] + "</td>";
									tr = tr + "<td>" + val["esp_location"] + "</td>";
									tr = tr + '<td align="center">' + val["pH_value"] + "</td>";
									tr = tr + '<td align="center">' + val["pump_status"] + "</td>";
									tr = tr + "<td>" + val["date_time"] + "</td>";
									tr = tr + "</tr>";
                  index_row++;

									$('#myTable > tbody:last').append(tr);
						  });
					}

			});

}

setInterval(getDataFromDb, 1800000);
setInterval(); //30 second reload  // 1000 = 1 second
</script>

</head>
<body>

<div id="showData"></div>
<div class="table-wrapper table-responsive">
<!-- <center> -->
<h1>My Web</h1>

<table class="table table-hover table-dark" id="myTable">
<!-- head table -->
<thead>
  <tr>
    <td width="auto"> <div align="center">#</div></td>
    <td width="auto"> <div align="center">Devices Name </div></td>
    <td width="auto"> <div align="center">Location</div></td>
    <td width="auto"> <div align="center">PH Value</div></td>
    <td width="auto"> <div align="center">Pump Status</div></td>
    <!-- <td width="59"> <div align="center">Budget </div></td> -->
    <td width="auto"> <div align="center">Date</div></td>
  </tr>
</thead>
<!-- body dynamic rows -->

<tbody id="myBody"></tbody>
</table>

 <!-- <center> -->
</div>
</body>
</html>
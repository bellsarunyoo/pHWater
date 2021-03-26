<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <?php 
    include "connection.php";
    $sql = "SELECT logid, esp_name  FROM phwater WHERE esp_name <> ''  ";
    $result = $conn->query($sql);
    echo '<select name="belltest" id="belltest">';
    while($row = $result->fetch_assoc()) {
        echo '<option value="'. $row["logid"].'">' . $row["esp_name"]. '</option>';
        $id = $row["logid"];
    } 
    echo '</select>';
    $sql = "SELECT logid  FROM phwater WHERE esp_name <> '.$id.'  ";
    $result = $conn->query($sql);
    echo $id;
    echo '<input type="text" name="testbell" id="testbell" value='.$id.'>';
   $conn->close();
    ?>

    <script>
    $(document).ready(function(){

    $("#belltest").change(function(){
        var belltest = $(this).val();

        $.ajax({
            url: 'getUsers.php',
            type: 'post',
            data: {depart:belltest},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#sel_user").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

});
    </script>
   
</body>
</html>
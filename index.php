<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/me_style.css">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="canvasjs-3.2.8/canvasjs.min.js"></script>
    <script src="canvasjs-3.2.8/canvasjs.react.js"></script>
    <!-- <script src="canvasjs-stock-1.2.8/canvasjs.stock.min.js"></script>
  <script src="canvasjs-stock-1.2.8/canvasjs.stock.react.js"></script> -->
    <!-- <script>
window.onload = function () {

var dps = []; // dataPoints
var chart = new CanvasJS.Chart("chartContainer", {
	title :{
		text: "Dynamic Data"
	},
	data: [{
		type: "line",
		dataPoints: dps
	}]
});

var xVal = 0;
var yVal = 100; 
var updateInterval = 1000;
var dataLength = 20; // number of dataPoints visible at any point

var updateChart = function (count) {

	count = count || 1;

	for (var j = 0; j < count; j++) {
		yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
		dps.push({
			x: xVal,
			y: yVal
		});
		xVal++;
	}

	if (dps.length > dataLength) {
		dps.shift();
	}

	chart.render();
};

updateChart(dataLength);
setInterval(function(){updateChart()}, updateInterval);

}
</script> -->
    <script>
    window.onload = function() {

        var dataPoints = [];
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light1", "dark1", "dark2"
            title: {
                text: "pH Water"
            },
            axisX: {
                title: "Time Elapsed (in seconds)",
                suffix: " s"
            },
            axisY: {
                title: "Values pH",
                valueFormatString: "#,##0.0",
                suffix: " pH"
            },
            data: [{
                type: "line",
                xValueFormatString: "After #,##0 s",
                yValueFormatString: "#,##0.0 pH",
                dataPoints: dataPoints
            }]
        });

        var yValue;
        var xValue;
        var updateInterval = 2000;

        // <c:forEach items="${dataPointsList}" var="dataPoints" varStatus="loop">
        // 	<c:forEach items="${dataPoints}" var="dataPoint">
        yValue = parseFloat("${dataPoint.y}");
        xValue = parseInt("${dataPoint.x}");
        dataPoints.push({
            x: xValue,
            y: yValue,
        });
        // 	</c:forEach>
        // </c:forEach>

        chart.render();

        setInterval(function() {
            updateChart()
        }, updateInterval);

        function updateChart(count) {
            count = count || 1;
            for (var i = 0; i < count; i++) {
                xValue += 2;
                yValue = Math.max(yValue + (0.2 + Math.random() * (-0.2 - 0.2)), 0);
                dataPoints.push({
                    x: xValue,
                    y: yValue
                });
            }
            chart.render();
        }

    }
    </script>



</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <!-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul> -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li> -->
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                 
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                        
                        > 
                                 
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
           
                <h2>Data from NodeMCU ESP-8266</h2>
           
                <?php
include "connection.php";

$sql = "SELECT * FROM phwater ORDER BY logid DESC";
$result = $conn->query($sql);
// echo '<table class="table table-dark">';
echo '<div class="table-wrapper table-responsive">';
echo '<table class="table table-hover table-dark">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">No.</th>';
echo '<th scope="col">Devices Name</th>';
echo '<th scope="col">Location</th>';
echo '<th scope="col">PH Value</th>';
echo '<th scope="col">Pump Status</th>';
echo '<th scope="col">Alarm Status</th>';
echo '<th scope="col">Date</th>';
echo '<th scope="col">Time</th>';
echo '</tr>';
echo '</thead>';

$count_ = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "<br> id: ". $row["logid"]. " ESP-Name: ". $row["esp_name"]. " " . $row["esp_location"] . "<br>";
        $count_ += 1;
        $dated = strtotime($row["date_time"]);
        echo '<tbody>';
        echo '<tr class="table-light table-bordered">';
        echo '<td>'.$count_. '</td>';
        echo '<td>'.$row["esp_name"].'</td>';
        echo '<td>'.$row["esp_location"].'</td>';
        echo '<td>'.$row["pH_value"].'</td>';
        echo '<td>'.$row["pump_status"].'</td>';
        echo '<td>'.$row["pump_status"].'</td>';
        echo '<td>'.date("D d/m/Y",$dated).'</td>';
        echo '<td>'.date("H:i:s A",$dated).'</td>';
        echo '</tr>';
        echo '</tbody>';
     
    }
} 

else {
    echo "0 results";
}
echo '</table>';
echo '</div>';
$conn->close();
?>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>



</body>

</html>
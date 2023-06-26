<?php 
require_once('../components/navbarDashboard.php');

include_once("../connections/connection.php");
$con = connection();

    //get all hoa
$sqlHoa = mysqli_query($con, "SELECT COUNT(*) as count FROM `tbl_hoa`");

// Fetch the count
$rowHoa = mysqli_fetch_assoc($sqlHoa);
$countHoa = $rowHoa['count'];

 //get all user
 $sqlUser = mysqli_query($con, "SELECT COUNT(*) as count FROM `tbl_users`");

 // Fetch the count
 $rowUser = mysqli_fetch_assoc($sqlUser);
 $countUser = $rowUser['count'];

 //get all resident
 $sqlResident = mysqli_query($con, "SELECT COUNT(*) as count FROM `tbl_residents`");

 // Fetch the count
 $rowResident = mysqli_fetch_assoc($sqlResident);
 $countResident = $rowResident['count'];

 
//get all forum
$sqlForum = mysqli_query($con, "SELECT COUNT(*) as count FROM `tbl_forum`");

// Fetch the count
$rowForum = mysqli_fetch_assoc($sqlForum);
$countForum = $rowForum['count'];

// Query to get the count of paid and unpaid statuses
$sqlStatus = mysqli_query($con, "SELECT COUNT(*) as count, status FROM `tbl_payment` GROUP BY status");

// Query to get the total amount of paid dues
$sqlPaidDues = mysqli_query($con, "SELECT SUM(amount) as totalAmount, status FROM `tbl_payment` WHERE status = 'Paid'");
$rowPaidDues = mysqli_fetch_assoc($sqlPaidDues);
$totalPaidAmount = $rowPaidDues['totalAmount'];

// Query to get the total amount of unpaid dues
$sqlUnpaidDues = mysqli_query($con, "SELECT SUM(amount) as totalAmount, status FROM `tbl_payment` WHERE status = 'Unpaid'");
$rowUnpaidDues = mysqli_fetch_assoc($sqlUnpaidDues);
$totalUnpaidAmount = $rowUnpaidDues['totalAmount'];


//==============DATA POINTS HERE======================
 

$dataPoints = array( 
	array("y" => $countHoa, "label" => "Home owner" ),
	array("y" => $countUser, "label" => "User" ),
	array("y" => $countResident, "label" => "Resident" ),
	array("y" => $countForum, "label" => "Forum" ),
);

// Initialize an empty array to store the data points
$dPoints = array();

// Fetch the data from the query result and add it to the dataPoints array
while ($rowStatus = mysqli_fetch_assoc($sqlStatus)) {
    $status = $rowStatus['status'];
    $count = $rowStatus['count'];
    $dPoints[] = array("y" => $count, "label" => $status);
}

// Create an array of data points for the paid and unpaid amounts
$duesDataPoints = array(
    array("y" => $totalPaidAmount, "label" => "Paid"),
    array("y" => $totalUnpaidAmount, "label" => "Unpaid")
);
 
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Dashboard - Web-Bello</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Web bello table"
	},
	axisY: {
		suffix: "%",
		scaleBreaks: {
			autoCalculate: true
		}
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0\"%\"",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}

window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "dark2",
                title: {
                    text: "Payment Status"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($dPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
</script>
</head>

<body class="bg-white dark:bg-gray-900">
    
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">HOA OFFICIAL</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">There are currently <strong><?php echo $countHoa?></strong> HOA
                Officials in Web Bello.</p>
            <a href="/web-bello/pages/hoa-official.php"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                See more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            </div>

            <!--<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">-->
            <!--    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">USERS</h5>-->
            <!--    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">There are currently <strong><?php echo $countUser ?></strong> registered user accounts in this system.</p>-->
            <!--<a href="/web-bello/pages/users.php"-->
            <!--    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">-->
            <!--    See more-->
            <!--    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"-->
            <!--        xmlns="http://www.w3.org/2000/svg">-->
            <!--        <path fill-rule="evenodd"-->
            <!--            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"-->
            <!--            clip-rule="evenodd"></path>-->
            <!--    </svg>-->
            <!--</a>-->
            <!--</div>-->

            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">RESIDENTS</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">There are currently <strong><?php echo $countForum ?></strong> individuals living in Palazo Bello.</p>
            <a href="/web-bello/pages/resident-information.php"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                See more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            </div>

            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FORUMS</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">There are currently <strong><?php echo $countForum?></strong> pending discussions in Web Bello.</p>
            <a href="/web-bello/pages/forum.php"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                See more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            </div>
        </div>

       
        
    </div>
    <!-- Chart -->
    <div id="chartContainer" style="height: 370px; width: 50%;"></div>

    <!-- New Chart for Paid and Unpaid Dues -->
    <div id="duesChartContainer" style="height: 370px; width: 50%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
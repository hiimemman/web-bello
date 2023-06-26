<?php
                echo "<span class='text-5xl font-semibold text-indigo-500'>$countHoa</span>";
                ?>
                <p class="text-gray-600 dark:text-gray-400">Total number of HOA officials.</p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">USERS</h5>
                <?php
                echo "<span class='text-5xl font-semibold text-indigo-500'>$countUser</span>";
                ?>
                <p class="text-gray-600 dark:text-gray-400">Total number of users.</p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">RESIDENTS</h5>
                <?php
                echo "<span class='text-5xl font-semibold text-indigo-500'>$countResident</span>";
                ?>
                <p class="text-gray-600 dark:text-gray-400">Total number of residents.</p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FORUM DISCUSSIONS</h5>
                <?php
                echo "<span class='text-5xl font-semibold text-indigo-500'>$countForum</span>";
                ?>
                <p class="text-gray-600 dark:text-gray-400">Total number of forum discussions.</p>
            </div>
        </div>

        <div class="mt-8">
            <div class="max-w-6xl px-6 py-8 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Payment Status</h2>
                <div id="chartContainer" style="height: 300px;"></div>
                <div id="chartContainer2" style="height: 300px;"></div>
            </div>
        </div>
    </div>

    <script>
        // First Chart
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "User Types"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        // Second Chart
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Payment Status"
            },
            data: [{
                type: "pie",
                indexLabel: "{label}: {y}",
                startAngle: -90,
                dataPoints: <?php echo json_encode($dPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.1.0/flowbite.js"></script>
</body>

</html>

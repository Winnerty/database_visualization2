<?php
require_once 'Population.php';
?>

<html>
<body>

    <a href="logout_action.php">Logout</a>

    <p>Welcome,<b> admin</b></p>

    <h3>Active Populations</h3>

    <div>
    <table>
        <?php
        $populations = Population::getPopulations();
        $dataPoints = array();

        foreach ($populations as $population) {

            $dataPoints[] = array("label"=>$population['code_ref'] . " - " . $population['period_ref'] . " " . $population['year_ref'],
            "y"=>(int)$population['cnt']);  
            
            $populations_str = "populations.php?code=" . $population['code_ref'] . "&period=" . 
            $population['period_ref'] . "&year=" . $population['year_ref'];
            
            echo "<tr><td><a href='$populations_str'>" .
            $population['code_ref'] . " - " . $population['period_ref'] . " " . $population['year_ref'] . " (" .
            $population['cnt']. ")" . "</a></td></tr>";
            
        }
        ?>   
    </table>

    <div id="chartContainer" style="height: 300px; width: 30%; margin-left: 150px"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </div>

    <h3>Overall Attendance</h3>
    
    <div>
    <table>
        <?php
        $attendances = Population::getAttendances();
        $dataPoints2 = array();
        foreach ($attendances as $attendance) {

            $dataPoints2[] = array("label"=>$attendance['code_ref'] . " - " . $attendance['period_ref'] . " " . $attendance['year_ref'],
            "y"=>(int)$attendance['percent']);  

            echo "<tr><td>" .
            $attendance['code_ref'] . " - " . $attendance['period_ref'] . " " . $attendance['year_ref'] . " (" .
            (int)$attendance['percent'] . "%)" . "</td></tr>";
        }
        ?>   
    </table>
    <div id="chartContainer2" style="height: 300px; width: 30%; margin-left: 150px"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </div>
    
    <?php
        $lastChange = Population::getTime();
        foreach ($lastChange as $change)
            echo '<p style="margin-top: 50px">Database last update <b>' . $change['date'] . '</b></p>';
    ?>

    <script>

        //PIE CHART
        window.onload = function() { 
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {text: "Students per program"},
            data: [{
                type: "pie",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>}
            ]});
        chart.render();
        
        //COLUMN CHART
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {text: "Overall attendance chart"},
            data: [{
                type: "column",
                indexLabel: "{y}%",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>}
            ]});
        chart2.render();
        }
    </script>

    <style>
        div {
            display: flex; 
            align-items: center;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
        }

        a {
            text-decoration: none;
        }
    </style>

</body>
</html>
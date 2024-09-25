<?php
    require_once 'Population.php';

    Population::deleteStudent($_GET['email']);
    $str_location = "populations.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];
    header("location: $str_location");
?>
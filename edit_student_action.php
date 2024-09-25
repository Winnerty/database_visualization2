<?php
    require_once 'Population.php';

    Population::editStudent($_POST['f_name'], $_POST['l_name'], $_GET['email']);
    $str_location = "populations.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];
    header("location: $str_location");
?>
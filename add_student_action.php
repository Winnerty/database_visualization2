<?php
require_once 'Population.php';

Population::addStudent($_POST['f_name'], $_POST['l_name'], $_POST['personal_email'], $_GET['code'], $_GET['period'], $_GET['year']);
$str_location = "populations.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];
header("location: $str_location");
?>
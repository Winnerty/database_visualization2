<?php
require_once 'Population.php';

Population::addCourse($_POST['code_name'], $_POST['full_name'], $_POST['sessions'], $_POST['teacher'], $_GET['code']);
$str_location = "populations.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];
header("location: $str_location");
?>
<?php
    require_once 'Grade.php';

    Grade::deleteGrade($_GET['email'], $_GET['course']);
    $str_location = "grades_page.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];
    header("location: $str_location");
?>
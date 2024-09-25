<?php
    require_once 'Grade.php';

    Grade::editGrades($_GET['email'], $_GET['course'], $_POST['grade']);
    $str_location = "grades_page.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];
    header("location: $str_location");
?>
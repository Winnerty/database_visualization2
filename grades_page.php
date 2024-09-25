<?php
require_once 'Grade.php';
?>

<html>
<body>

    <a href="logout_action.php">Logout</a>  
    <br>
    <a href="welcome.php">Welcome page</a>
    <br>

    <?php
    echo '<a href="populations.php?code=' .  $_GET['code'] . '&period=' . $_GET['period'] . '&year=' .
    $_GET['year'] . '">Population page</a>';

    echo "<p>Grades - <b>" . $_GET['code'] . " ". $_GET['period'] . " " . $_GET['year'] . "</b></p>";
    ?>

    <h3>Students final grades per course</h3>

    <table>
        <?php
        $grades = Grade::getGrades($_GET['code'], $_GET['period'], $_GET['year']);
        echo "<tr><td>Email</td>
        <td>First name</td>
        <td>Last name</td>
        <td>Course</td>
        <td>Grade (/20)</td>
        <td>Action</td></tr>";

        foreach ($grades as $grade) {
            
            $stringEditGrade = 'edit_grade.php?code=' .  $_GET['code'] . '&period=' . $_GET['period'] . '&year=' .
            $_GET['year'] . '&email=' . $grade['EMAIL'] . "&course=" . $grade['COURSE_NAME'];

            $stringdeleteGrade = 'delete_grade_action.php?code=' .  $_GET['code'] . '&period=' . $_GET['period'] . '&year=' .
            $_GET['year'] . '&email=' . $grade['EMAIL'] . "&course=" . $grade['COURSE_NAME'];
            
            echo "<tr><td>" . $grade['EMAIL'] . "</td><td>" . $grade['FIRST_NAME'] . "</td><td>" . $grade['LAST_NAME'] .
            "</td><td>" . $grade['COURSE_NAME'] . "</td><td>" . (float)$grade['AVG'] . "</td><td><a href='$stringEditGrade'>✏️</a>
            <a href='$stringdeleteGrade'>➖</a></td></tr>";
            
        }
        ?>   
    </table>

    <style>
        table {
            border-collapse: collapse;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        td {
            border: 2px solid black; 
            padding: 5px; 
            text-align: center;
        }   
        a {
            text-decoration: none;
        }
    </style>

</body>
</html>
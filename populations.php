<?php
require_once 'Program.php';
?>

<html>
<body>

    <a href="logout_action.php">Logout</a>
    <br>
    <a href="welcome.php">Welcome page</a>
    
    <?php
        echo "<p>Population - <b>" . $_GET['code'] . " ". $_GET['period'] . " " . $_GET['year'] . "</b></p>";
    ?>

    <div>
    <h3>Students</h3>
    <?php 
        $add_str = "add_student.php?code=" .  $_GET['code'] ."&period=" . $_GET['period'] . "&year=" . $_GET['year'];
        echo "<button style='margin-left: 15px'><a href='$add_str'>Add</a></button>" ?>
    <button>Search</button>
    </div>

    <table>
        <?php
        $students = Program::getStudents($_GET['code'], $_GET['period'], $_GET['year']);
        echo "<tr><td>Email</td>
        <td>First name</td>
        <td>Last name</td>
        <td>Passed</td>
        <td>Action</td></tr>";

        foreach ($students as $student) {

            echo "<tr><td>" . $student['EMAIL'] . "</td><td>" . $student['FIRST_NAME'] . "</td><td>" . $student['LAST_NAME'] .
            "</td><td>" . $student['VAL']. " / " . $student['TOTAL'] . "</td><td><a href=edit_student.php?code=" . $_GET['code'] .
            "&period=" . $_GET['period'] . "&year=" . $_GET['year'] . "&email=" . $student['EMAIL'] . ">✏️</a>
            <a href=remove_student.php?code=" . $_GET['code'] ."&period=" . $_GET['period'] . "&year=" . $_GET['year'] .
            "&email=" . $student['EMAIL'] . ">➖</a></td></tr>";
            
        }
        ?>   
    </table>

    <div>
    <h3>Courses</h3>
    <?php 
        $add_str = "add_course.php?code=" .  $_GET['code'] ."&period=" . $_GET['period'] . "&year=" . $_GET['year'];
        echo "<button style='margin-left: 15px'><a href='$add_str'>Add</a></button>" ?>
    <button>Search</button>
    </div>

    <table>
        <?php
        $courses = Program::getCourses($_GET['code']);
        echo "<tr><td>Name</td>
        <td>Session count</td>
        <td>Assigned teacher</td></tr>";

        foreach ($courses as $course) {
            
            $grades_str = "grades_page.php?code=" . $_GET['code'] . "&period=" . $_GET['period'] . "&year=" . $_GET['year'];

            echo "<tr><td><a href='$grades_str'>" . $course['code'] . "</a></td><td>" . $course['duration'] . "</td><td>".
            $course['f_name'] . " " . $course['l_name'] . "</td></tr>";

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

        div {
            display: flex; 
            align-items: center;
        }

        button {
            background-color: lightblue; 
            border-radius: 5px; 
            margin-left: 5px;
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
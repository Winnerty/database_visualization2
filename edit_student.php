<html>
<body>

    <?php 
        echo '<h3>Edit properties for ' . $_GET['email'] . '</h3>' . '<form method="post" action="edit_student_action.php?code=' .
        $_GET['code'] . '&period=' . $_GET['period'] . '&year=' . $_GET['year'] . "&email=" . $_GET['email'] . '">'
    ?>
        <fieldset>
            <label> First name </label>
            <input required type="text" name="f_name">
            <br>

            <label> Last name </label>
            <input required type="text" name="l_name">
            <br>

            <input class="button" type="submit" value="Confirm">   
        </fieldset>
    </form>

    <style>
        label {
            display: inline-block; 
            width: 80px;
            margin: 5px;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        form {
            justify-content: center; 
            align-items: center; 
            display: flex; 
            margin: 30px;
        }

        h3 {
            justify-content: center; 
            align-items: center; 
            display: flex; 
            margin: 30px;
        }

        .button {
            background-color: lightblue; 
            border-radius: 5px; 
            margin: 5px;
        }
    </style>

</body>
</html>
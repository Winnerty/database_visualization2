<html>
<body>
    <h3>Add new student</h3>

    <?php echo '<form method="post" action="add_student_action.php?code=' . $_GET['code'] .
    '&period=' . $_GET['period'] . '&year=' . $_GET['year'] . '">' ?>
        <fieldset>
            <label> First name </label>
            <input required type="text" name="f_name">
            <br>

            <label> Last name </label>
            <input required type="text" name="l_name">
            <br>

            <label> Personal email </label>
            <input required type="text" name="personal_email">
            <br>

            <input class="button" type="submit" value="Add">   
        </fieldset>
    </form>

    <style>
        label {
            display: inline-block; 
            width: 110px;
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
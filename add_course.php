<html>
<body>
    <h3>Add new course</h3>

    <?php echo '<form method="post" action="add_course_action.php?code=' . $_GET['code'] .
    '&period=' . $_GET['period'] . '&year=' . $_GET['year'] . '">' ?>
        <fieldset>
            <label> Code name </label>
            <input required type="text" name="code_name">
            <br>

            <label> Full name </label>
            <input required type="text" name="full_name">
            <br>

            <label> Sessions count </label>
            <input required type="number" name="sessions">
            <br>

            <label> Teacher's EPITA email </label>
            <input required type="text" name="teacher">
            <br>

            <input class="button" type="submit" value="Add">   
        </fieldset>
    </form>

    <style>
        label {
            display: inline-block; 
            width: 160px;
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
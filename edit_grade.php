<html>
<body>

    <?php
    echo '<h3>Edit grade for ' . $_GET['email'] . ' in ' . $_GET['course'] .
    '</h3><form method="post" action="edit_grade_action.php?code=' . $_GET['code'] .
    '&period=' . $_GET['period'] . '&year=' . $_GET['year'] . '&email=' . $_GET['email'] .'&course=' . $_GET['course'] . '">' ?>
        <fieldset>
            <label> New grade </label>
            <input required type="number" name="grade">
            <br>

            <input class="button" type="submit" value="Edit">   
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
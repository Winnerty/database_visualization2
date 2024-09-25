<html>
<body>

    <form method="post" action="index_action.php">
        <fieldset>
            <p> Welcome </p>
            <label> Login </label>
            <input type="text" name="login">
            <br>
            <label> Password </label>
            <input type="password" name="password">
            <br>
            <input class="button" type="submit" value="OK">   
        </fieldset>
    </form>

    <style>
        form {
            justify-content: center; 
            align-items: center; 
            display: flex; 
            margin: 30px; 
            font-family: 'Roboto', sans-serif;
        }

        label {
            display: inline-block; 
            width: 80px;
        }

        .button {
            margin-top: 10px; 
            margin-left: 5px; 
            background-color: lightblue;
            border-radius: 5px; 
            margin-left: 5px;
        }
    </style>

</body>
</html>

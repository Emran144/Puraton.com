<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>
    </head>
    <body>
        <h2>Welcome to Poraton Dot Com...!</h2>
        <br/>
        <form action="logintype.php" method="post">
            Log In As: 
            Admin: <input type="radio" name="logInType" value="Admin">
            User: <input type="radio" name="logInType" value="User">
 
            <br/><br/>
            Email/Number: <input type="text" id='uemail' name='uemail' title='Enter your Email/Number here'>
            <br/><br/>
            Password: <input type="password" id='upass' name='upass'>
            <br/><br/>
            <input type="submit" value='Log In'>
        </form>
        <h4>User Sign up here: <a href="usersignup.php"><input type="button" value='Sign Up'></a></h4>
        <h4>Admin Sign up here: <a href="adminsignup.php"><input type="button" value='Sign Up'></a></h4>
    </body>
</html>
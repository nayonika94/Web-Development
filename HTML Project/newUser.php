<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register New User</title>
        <link href="layout.css" rel="stylesheet"/>
         <link href="tables.css" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="characters.php">Characters</a></li>
                    <li><a href="Updates.php">Updates</a></li>
                    <li><a href="Roles.php">Roles</a></li>
                    <li><a href="Login.php">Login</a></li>
                </ul>
            </nav>
              <h1>User Registration</h1>

        </header>
        <form action="addUser.php" method="POST">
        <table id="newUser">
            <tr>
                <th colspan="2">Register New User</th>
            </tr>
            <tr>
                <td><label for="firstname">First Name: </label></td>
                <td><input type="text" name="firstname" id="firstname" value="<?php  echo $firstname ?>" required autofocus placeholder="Enter First Name" pattern="^[a-zA-Z0-9][\w\s\&,]*[a-zA-Z0-9\!\?\.]$" title="Invalid characters for First Name"/></td>
            </tr>
            <tr>
                <td><label for="lastname">Last Name: </label></td>
                <td><input type="text" name="lastname" id="lastname" value="<?php echo $lastname ?>" required placeholder="Enter Last Name" pattern="^[a-zA-Z0-9][\w\s\&,]*[a-zA-Z0-9\!\?\.]$" title="Invalid characters for Last Name"></td>
            </tr>
            <tr>
                <td><label for="Username">Username: </td>
                <td><input type="text" name="username" id="username" value="<?php echo $username ?>" required placeholder="Enter Username"  maxlength="10" pattern="^[a-zA-Z0-9][\w\s\&,]*[a-zA-Z0-9\!\?\.]$" title="Maximum 10 chars allowed"></td>
            </tr>
            <tr>
                <td><label for="password">Password: </td>
                <td><input type="password" name="password" id="password" value="<?php echo $password ?>" required placeholder="Min: 4, Max:8, Must Include a numeric digit" maxlength="10" pattern="^(?=.*\d).{4,8}$" title="Please include at least one numeric digit. Min length: 4, Max length: 8"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Register" id="register"></td>
            </tr>
            </form>
        
        <form action="Login.php">
            <tr>
                <td colspan="2"><input type="submit" value="Cancel" id="cancel"></td>
            </tr>
        </form>
        </table>
         <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer>
    </body>
</html>

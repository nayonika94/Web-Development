<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

 <?php
        
        session_start();
        
        
        require ("sql.php");
        
       /* if(isset($_POST['username']) and isset($_POST['password']))
        {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
        }*/
        
        $username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
        $password = (isset($_POST['password'])) ? trim($_POST['password']) : '';
        
        $redirect  = (isset($REQUEST['redirect'])) ? $REQUEST['redirect'] : 'Home.php';
        
        if(isset($_POST['login']))
        {
             $user = getUser($username,$password);
        
        if(count($user)==1)
        {
            extract($user[0]);
            
            $userInfo = array('UserID'=>$UserID,'FirstName'=>$FirstName,'Username'=>$Username,'Access'=>$Access);
            
            $_SESSION['userInfo'] = $userInfo;
            session_write_close();
            
            header('location:' . $redirect);
            die();
        }        
       
        else
        {
            $error = 'Invalid credentials! <br/>Please try again';
        }
   }
        if(isset($error))
        {
            $output = <<<HTML
                    <table>
                    <th>$error</th>
                    </table>
HTML;
            echo $output;
        }
        ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
            <h1>User Login</h1>

        </header>
        
        <table id="login">
            <tr>
                <th colspan="2">Enter login details</th>
            </tr>
        <form action="Login.php" method="POST">
            <input type="hidden" name="redirect" value="<?php echo $redirect ?>" />
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" value="<?php echo $username ?>" id="username" required autofocus placeholder="Enter your Username"/></td>
            </tr>
            <tr> 
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" value="<?php echo $password ?>" id="password" required placeholder="Enter your Password"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Login" name="login" id="login"/></td>
                
            </tr>
             </form>
            
            <form action="newUser.php">
            <tr>
                <td colspan="2"><input type="submit" value="Register New User" name="register" id="register"/></td>
            </tr>
       
            
            </table>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>

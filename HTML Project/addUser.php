<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>New User</title>
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
        <?php
       
        require ("sql.php");
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $getUser = getUser($username,$password);
        
        if(count($getUser)==1)
        {
            extract($getUser);
            
            $output = <<<HTML
                    <h1>User already exists! Please select a different username</h1>
                    <table>
                        <tr>
                            <td><a href="newUser.php">Register Again</td>
                        </tr>
                        <tr>
                            <td><a href="Login.php">Cancel</td>
                        </tr>
                    </table>
             
                  
HTML;
        }
        else
        {
        addUser($firstname, $lastname, $username, $password);
        
        $user = getUser($username, $password);
        foreach($user as $userInfo)
        {
            extract($userInfo);
            $output = <<<HTML
                    <h1>$FirstName $LastName added Successfully!!</h1>
             <table>
                    <form action="Login.php">
                    <tr>
                        <th>You can now login!</th>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Login" id="login"></td>
                    </tr>
                    </form>
             </table>
HTML;
        }
        }
        echo $output;
        ?>
    </body>
</html>

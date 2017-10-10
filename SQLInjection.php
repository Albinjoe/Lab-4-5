<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#this function is for older PHP versions that use Magic Quotes.
#
//    function escapestring($input) {
//    if (get_magic_quotes_gpc()) {
//    $input = stripslashes($input);
//    }
//
//    @ $db = new mysqli('localhost', 'root', '', 'testinguser');
//
//
//    return mysqli_real_escape_string($db, $input);
//
//    }

@ $db = new mysqli('localhost', 'root', 'root', 'testinguser');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['userpass'])) {
    #with statement under we're making it SQL Injection-proof

    $uname = mysqli_real_escape_string($db, $_POST['username']);
    $upass = mysqli_real_escape_string($db, $_POST['userpass']);

    $uname = htmlentities($uname);
    $upass = htmlentities($upass);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1($_POST['userpass']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    //echo "SELECT * FROM user WHERE username = '{$uname}' AND userpass = '{$upass}'";
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    
    
}
?>
<!DOCTYPE html>

<?php
    include ("header.php")
?>

<main>
                    <img class="people" src="img/people.jpg">
                    <div class="firstsection">

                        <h1>Login!</h1>
                        <h4>Login before getting access to upload function.</h3>
        <?php

            if (isset($totalcount)) {
                if ($totalcount == 0) {
                    echo '<p class="redtext">Wrong username or password. Please try again.</p>';

                } else {
                    echo "<a href='fileUpload.php')>Upload files!</a>";

                }
            }

        ?>

        <form id="loginform" method="POST" action="" >
            <input type="text" name="username" placeholder="Username" class="loginform">
            <input type="password" name="userpass" placeholder="Password">
            <input type="submit" value="Go" class="search login">
        </form>




<?php
    include("footer.php")
?>





  

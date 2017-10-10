<?php
include ("header.php");
include ("config.php");



          

            $bookid = trim($_GET['bookid']);
            echo '<input type="hidden" name="bookid" value=' . $bookid . '>';

            $bookid = trim($_GET['bookid']);    // Get it from the hidden field?
            $bookid = addslashes($bookid);

            // Opens the database
            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }

            echo "You are reserving a book with the ID:" . $bookid;

            $stmt = $db->prepare("UPDATE books SET onloan=1 WHERE bookid= ?");
            $stmt->bind_param("i", $bookid);
            $stmt->execute();
?>
            <div class="secondsection">

                        <h1>Your reservation has been made!</h1>

<?php
            
            echo "<p class='reservedsite'><button class='orgbutton'><a href=index.php>Return to home page </a></button><button class='orgbutton'><a href=reservedbooks.php>See your reserved books</a></button><br><br><br><br><br><br><br><br><br></p>";


include ("footer.php");
?>


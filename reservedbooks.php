<?php

include("config.php");
$title = "My reserved books";
include("header.php");
?>
<div class="secondsection">

                        <h1>MY BOOKS</h1>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Philosophi autem in suis lectulis plerumque moriuntur. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Sit enim idem caecus, debilis.
                        </p>

<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//	if (!$searchtitle && !$searchauthor) {
//	  echo "You must specify either a title or an author";
//	  exit();
//	}

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " SELECT title, author, onloan, bookid FROM books WHERE onloan is true";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " and title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " and author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " and title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($title, $author, $onloan, $bookid);
    $stmt->execute();
    
//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
//    $stmt2->bind_result($onloan, $bookid);
    

    echo '<table bgcolor="dddddd" cellpadding="6">';
    echo '<tr><b><td>BookID</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Return</td> </b></tr>';
    while ($stmt->fetch()) {
        if($onloan==1)
            $onloan="Yes";
       
        echo "<tr>";
        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
        echo '<td><a href="returnBook.php?bookid=' . urlencode($bookid) . '">Return</a></td>';
        echo "</tr>";
        
    }
    echo "</table>";
    ?>

<?php include("footer.php"); ?>


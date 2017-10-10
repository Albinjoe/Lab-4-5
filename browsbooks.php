

<?php
include("config.php");
$title = "Search books";
include("header.php");
?>

<main>
<div class="secondsection">

                        <h1>BROWS BOOKS</h1>

                        <form action="browsbooks.php" method="POST" class="firstform">
                            <p>Are you looking for a new book?<br/><br/> Brows here!</p>
                            <input type="text" placeholder="Search by title" name="searchtitle"/><br/> 
                            <input type="text" placeholder="Search by author" name="searchauthor"/><br/>
                            <input class="search" type="submit" name="submit" value="Search" />
                        </form>
                        

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Philosophi autem in suis lectulis plerumque moriuntur. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Sit enim idem caecus, debilis.
                        </p>
                        <div class="smallcontainer">
                            <h2 class="librarytitle">Library</h2>
                            <button class="resetbutton">Reset search</button></a>
                        </div>
<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
  
}


$searchauthor = htmlentities($searchauthor);
$searchtitle = htmlentities($searchtitle);

//	if (!$searchtitle && !$searchauthor) {
//	   echo "You must specify either a title or an author";
 //       exit();
//	}

//$searchtitle = addslashes($searchtitle);
//$searchauthor = addslashes($searchauthor);

//$searchauthor = mysqli_real_escape_string($db,$searchauthor);
//$searchtitle = mysqli_real_escape_string($db,$searchtitle);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both
//THE ORDER OF THESE ARE EXTREMELY IMPORTANT OTHERWISE THEY'LL APPEAR IN THE WRONG ORDER.
$query = " SELECT bookid, author, title, onloan FROM Books";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " WHERE title LIKE '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " WHERE author LIKE '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " WHERE title LIKE '%" . $searchtitle . "%' and author LIKE '%" . $searchauthor . "%'"; // unfinished
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
    $stmt->bind_result($bookid, $author, $title, $onloan);
    $stmt->execute();

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr id="mainheading"><b><td>Bookid</td><td>Title</td> <td>Author</td> <td>Reserved?</td> <td>Reserve book</td> </b> </tr>';
    while ($stmt->fetch()) {
        if($onloan == "0")
            $onloan = "NO";
        else $onloan = "YES";
        echo "<tr>";
        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
        echo '<td><a class="greybutton" href="reserveBook.php?bookid=' . urlencode($bookid) . '"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>

<?php include("footer.php"); ?>




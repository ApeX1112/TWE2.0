
<?php
include_once("libs/modele.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="index.php?view=profile">Profile</a></li>
            <li><a href="index.php?view=addbook">Add Book</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <?php
            echo '<h1>Listed Books</h1>';
            if (isset($_SESSION['pseudo'])) {
                echo '<p>Welcome, ' . htmlspecialchars($_SESSION['pseudo']) . '!</p>';
            } else {
                echo '<p>Welcome, Guest!</p>';
            }
            ?>
            <input type="text" placeholder="Search for books..." class="search-bar">
        </header>
        <div class="books-container">
            <?php
            // Fetch books from the database
            $books = get_Books(); // this function fetches books from the database 

            foreach($books as $book) {
                echo '<div class="book">';
                echo '<img src="' . htmlspecialchars($book['COVER_IMAGE']) . '" alt="' . htmlspecialchars($book['NOM_LIVRE']) . '">';
                echo '<h3><a href="index.php?view=bookdetails&bookid='. $book['ID_LIVRE'] . '">' . htmlspecialchars($book['NOM_LIVRE']) . '</a></h3>';
                echo '<p>' . htmlspecialchars(get_author_name($book['PROPRIETAIRE_ID'])) . '</p>';
                echo '<span class="status ' . ($book['STATUS'] == 'VALABLE' ? 'available' : 'on-loan') . '">' . ucfirst($book['STATUS']) . '</span>';
                echo '</div>';
            };

            ?>
        </div>
    </div>
</body>
</html>

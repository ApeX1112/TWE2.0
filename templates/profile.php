<?php 
include_once("libs/modele.php");
?>

<!DOCTYPE html>
<html lang="en">
<!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="index.php?view=accueil">Home</a></li>
            <li><a href="index.php?view=profile">Profile</a></li>
            <li><a href="index.php?view=addbook">Add Book</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1> Books history </h1>
        </header>
        <div class="books-container">
            <div class="book">
                <img src="book1.jpg" alt="The Great Novel">
                <h3>The Great Novel</h3>
                <p>Jane Doe</p>
                <span class="status available">Available</span>
            </div>
            <div class="book">
                <img src="book2.jpg" alt="Space Explorers">
                <h3>Space Explorers</h3>
                <p>David Futures</p>
                <span class="status on-loan">On Loan</span>
            </div>
            <div class="book">
                <img src="book3.jpg" alt="Historical Echoes">
                <h3>Historical Echoes</h3>
                <p>Emily White</p>
                <span class="status on-loan">On Loan</span>
            </div>
            <div class="book">
                <img src="book4.jpg" alt="Culinary Journey">
                <h3>Culinary Journey</h3>
                <p>Chef Antoine</p>
                <span class="status available">Available</span>
            </div>
        </div>
    </div>
</body>
-->




<?php
include_once("libs/modele.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="index.php?view=accueil">Home</a></li>
            <li><a href="index.php?view=profile">Profile</a></li>
            <li><a href="index.php?view=addbook">Add Book</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <?php
            echo '<h1>Your books</h1>';
            ?>
            </header>
        <div class="books-container">
            <?php
            // Fetch books from the database
            $books = get_BooksByUser($_SESSION['idUser']); // this function fetches books from the database 

            foreach($books as $book) {
                echo '<div class="book">';
                //echo '<img src="' . htmlspecialchars($book['COVER_IMAGE']) . '" alt="' . htmlspecialchars($book['NOM_LIVRE']) . '">';
                echo '<h3><a href="index.php?view=bookdetails&bookid='. $book['ID_LIVRE'] . '">' . htmlspecialchars($book['NOM_LIVRE']) . '</a></h3>';
                echo '<p>' . htmlspecialchars(get_author_name($book['PROPRIETAIRE_ID'])) . '</p>';
                echo '<span class="status ' . ($book['STATUS'] == 'VALABLE' ? 'available' : 'on-loan') . '">' . ucfirst($book['STATUS']) . '</span>';
                echo '</div>';
            };

            ?>
        </div>
        <header>


        
            <?php
            echo '<h1>History</h1>';
            ?>
            </header>
    </div>
</body>
</html>

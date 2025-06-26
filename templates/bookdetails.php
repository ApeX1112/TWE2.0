
<?php
include_once("libs/maLibUtils.php");
include_once("libs/modele.php");
$bookid = valider("bookid");

$book=get_book($bookid); //   fetches book details from the database

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="css/bookdetails.css">
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
        <div class="book-details">
            <h1>Book Details</h1>
            
            <div class="book-info">
                <div class="book-image">
                    <?php
                    echo '<img src="book.jpg" alt="'. $book['NOM_LIVRE'] . '"'; // Placeholder image, replace with actual image path
                    ?>
                </div>
                <div class="book-summary">
                    <?php

                    echo '<h2>' . htmlspecialchars($book['NOM_LIVRE']) . '</h2>'; 
                    echo '<p><strong>Owner:</strong> ' . htmlspecialchars(get_author_name($book['ID_LIVRE'])) . '</p>';
                    //echo '<p><strong>Genre:</strong> ' . htmlspecialchars($book['GENRE']) . '</p>';
                    echo '<button><a href="index.php?view=messages&idreceiver=' . $book['PROPRIETAIRE_ID'] . '&idbook=' . $book['ID_LIVRE'] . '">Send a message to the owner</a></button>';
                    
                    ?>
                    <div class="about-book">
                        <h3>About the Book</h3>
                        <?php
                        echo '<p>' . htmlspecialchars($book['DESCRIPTION']) . '</p>';
                        ?>
                        <button class="show-more">Show More</button>
                    </div>
                    <?php
                        echo '<p><strong>Owner:</strong> ' . htmlspecialchars(get_author_name($book['ID_LIVRE'])) . '</p>';
                        echo '<p><strong>Availability:</strong> ' . htmlspecialchars($book['STATUS']) . '</p>';
                        
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>

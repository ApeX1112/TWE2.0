<?php 
include_once("libs/modele.php");
?>

<!DOCTYPE html>
<html lang="en">




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
 <style>
        /* Ajoute ceci dans css/home.css ou le CSS global */
        .sidebar a.active {
            font-weight: bold;
            color: #007bff;
            background: #e6e6e6;
            border-radius: 4px;
        }
    </style>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="index.php?view=home">Home</a></li>
            <li><a href="index.php?view=profile" class="active">Profile</a></li>
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
        <div class="history-container">
            <?php
            // Fetch books from the database
            $books = get_User_history($_SESSION['idUser']); // this function fetches books from the database 

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
    </div>
</body>
</html>

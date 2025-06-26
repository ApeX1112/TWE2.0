<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Book</title>
    <link rel="stylesheet" href="css/addbook.css">
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
        <div class="form-container">
            <h1>Register New Book</h1>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="book-title">Book Title</label>
                    <input type="text" id="book-title" name="book-title" placeholder="The Great Gatsby" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Brief summary or key themes of the book." required></textarea>
                </div>
                <div class="form-group">
                    <label for="cover-image">Cover Image</label>
                    <input type="file" id="cover-image" name="cover-image" accept="image/*">
                </div>
                <button type="submit" class="submit-btn">Add Book</button>
            </form>
        </div>
    </div>
</body>
</html>

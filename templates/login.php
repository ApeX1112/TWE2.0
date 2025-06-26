<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Welcome Back!</h1>
        <form action="controleur.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input  id="email" name="login" placeholder="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="passe" placeholder="********" required>
            </div>
            <input type="submit" class="sign-in-btn" name="action" value="Connexion"/>
        </form>
    </div>
</body>
</html>






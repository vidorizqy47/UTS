<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link style -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
</head>
<body>

    <div class="card">
        <div class="card-content">
            <div class="card-title">
                <h2>Login</h2>
                <div class="underline-title"></div>
            </div>

            <form class="form" method="POST">
                <label for="user-email">&nbsp;Email</label>
                <input type="email" name="email" id="user-email" class="form-content" required>
                <div class="form-border"></div>
        
                <label for="user-password">&nbsp;Password</label>
                <input type="password" name="password" id="user-password" class="form-content">
                <div class="form-border"></div>
        
                <a href="#"><legend id="forgot-pass">Forgot password?</legend></a>

                <input id="submit-btn" type="submit" name="submit" value="Login">
                <a href="signup.html" id="signup">Don't have a account yet?</a>
            </form>
        </div>
    </div>

    
    
</body>
</html>
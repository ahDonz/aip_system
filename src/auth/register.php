<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-col">
                <img src="public/images/login.jpeg" alt="">
            </div>
            <div class="form-col log-form">
                <div class="log-form-header">
                    <h1>Template</h1>
                </div>
                <form action="">
                    <h1>Sign Up</h1>
                    <h5>Welcome to Template</h5>
                    <input type="text"
                    placeholder="Name"
                    required>
                    <input type="email"
                    placeholder="Email"
                    required>
                    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                     title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                     placeholder="Password"
                     required>
                    <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    <button type="submit">Sign up</button>
                    <p class="sign-up">Already have an account?<a href="router.php?page=login">Login!</a></p>
                </form>
              
            </div>
        </div>
    </div>
</body>
<script src="public/js/form-validation.js"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/AirLugina/assets/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="cointainer">
        <img class="AirLugina" src="AirLugina.png" alt="logo">
        <img src="/AirLugina/assets/Images/Rectangle_20.png" alt="iamge">
        <br><br><br><br>
        <h1>Login</h1>
        <p class="p1">Login to access your AirLugina account</p>
        <div class="table">
            <form action="" onsubmit="return validateForm()">
                <div class="inputbox"> 
                    <fieldset class="fieldset">
                        <legend>Email</legend>
                        <input type="email" placeholder="name@email.com">
                    </fieldset>
                </div>
                <div class="inputbox"> 
                    <fieldset class="fieldset">
                        <legend>Password</legend>
                        <input id="passwordField" type="password" placeholder="password">
                        <i id="togglePassword" class='bx bx-hide'></i>
                    </fieldset>
                </div>
                <div class="remember">
                    <label><input type="checkbox">Remember me</label>
                    <a href="/AirLugina/forgot-password.html">Forgot password?</a>
                </div>
                <button type="submit">Login</button>
                <div class="register">
                    <p>Don't have an account?
                        <a href="/AirLugina/signup.html">Register</a>
                    </p>
                </div>
            </form>
         </div> 
    </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
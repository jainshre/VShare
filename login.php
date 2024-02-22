<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VShare</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link  rel="stylesheet" href="style.css" >
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="signin.php" method="post" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Enter Username" name="username" required>
                    </div> 
                    
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Enter Password" id="pass" name="userpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, lowercase letter, and at least 8 or more characters" required>
                        <span class="show-pass" onclick="toggle()">
                            <i class="fas fa-eye" onclick="myFunction(this)"></i>
                        </span>
                    </div>
    
                    <input type="submit" value="Login" name="login" class="btn solid" >
                    <!-- <a href="enteremail.php" >Forgot Username ?</a><br>
                    <a href="enterusername.php">Forgot Password?</a> -->
                </form>


                <form action="register.php" method="post" class="sign-up-form">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Enter Full Name" name="uname" pattern="[A-Za-z\s]+" required>
                    </div> 
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Enter Email" name="uemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Enter Password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, lowercase letter, and at least 8 or more characters" required>
                        <span class="show-pass" onclick="toggle()">
                            <i class="fas fa-eye" onclick="myFunction(this)"></i>
                        </span>
                    </div>
                    <input type="submit" value="Sign Up" id="signup" name="signup" class="btn solid"  >
                    <ul class="list-unstyled">
                        <li>
                            <span class="low-upper-case">
                                <i  aria-hidden="true"></i> &nbsp;&nbsp;Lowercase & Uppercase
                            </span>
                        </li>
                        <li>
                            <span class="one-number">
                                <i  aria-hidden="true"></i>&nbsp;&nbsp;Number[0-9]
                            </span>
                        </li>
                        <li>
                            <span class="one-special-char">
                                <i  aria-hidden="true"></i>&nbsp;&nbsp;Special character (!@#$^&*)
                            </span>
                        </li>
                        <li>
                            <span class="eight-character">
                                <i  aria-hidden="true"></i>&nbsp;&nbsp;Atleast 8 character
                            </span>
                        </li>
                    </ul>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Dont have an Account?</h3><br>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button><br><br>
                    <a href="enteremail.php" style="color: white;">Forgot Username ?</a><br> 
                    <a href="enterusername.php" style="color: white;">Forgot Password ?</a>
                </div>
                <!-- <a href="enteremail.php" >Forgot Username ?</a>
                <a href="enterusername.php">Forgot Password?</a> -->

                <img src="log.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have an Account?</h3><br>
                    <button class="btn transparent" id="sign-in-btn">Login</button>
                </div>

                <img src="register.svg" class="image" alt="">
            </div>

        </div>

    </div>
    <script src="disablebackbtn.js"></script>
    <script src="app.js"></script>
    <script src="showpassword.js"></script>
  
</body>
</html>
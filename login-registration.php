



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #e6e9f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .blob-top-right {
            position: absolute;
            top: -100px;
            right: -50px;
            width: 400px;
            height: 400px;
            background-color: #131516;
            border-radius: 50%;
            transform: scale(1.5);
            z-index: -1;
        }

        .blob-bottom-left {
            position: absolute;
            bottom: -100px;
            left: -180px;
            width: 500px;
            height: 400px;
            background-color: black;
            
            border-radius: 60%;
            transform: scale(1.5);
            z-index: -1;
        }

        .card {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            width: 500px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin: auto;
        }

        .logo {
            width: 417px;
            height: 160px;
            /* background-color: #7b7de0; */
            /* border-radius: 50%; */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            
        }

        h1 {
            color: black;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .subtitle {
            color: black;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 12px 0;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            font-size: 16px;
            color: black;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 0;
            width: 120px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px auto 20px;
            display: block;
        }

        .links {
            display: flex;
            justify-content: space-between;
            color: black;
            font-size: 14px;
        }

        .links a {
            color: black;
            text-decoration: none;
        }

        #login-form, #register-form {
            display: none;
        }

        .active {
            display: block !important;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            color: black;
            border-bottom: 2px solid transparent;
        }

        .tab.active {
            border-bottom: 2px solid #7b7de0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="blob-top-right"></div>
    <div class="blob-bottom-left"></div>

    <div class="card">
        <div class="logo"><img src="images/artifylogo.svg" alt="logo"></div>
        
        <div class="tabs">
            <div class="tab active" onclick="showTab('login')">Login</div>
            <div class="tab" onclick="showTab('register')">Register</div>
        </div>

        <div id="login-form" class="active">
            <h1>Welcome back!</h1>
            <p class="subtitle">User Login</p>
            
            <form action="php/login.php" method="post">
                <div class="input-group">
                    <input type="email" name="username" id="login-email" placeholder="Email" required>
                </div>
                
                <div class="input-group">
                    <input type="password" name="password" id="login-password" placeholder="Password" required>
                </div>
                
                <button type="submit">Login</button>
            </form>
            
            <div class="links">
                <a href="#">Forgot Password?</a>
                <a href="#" onclick="showTab('register')">Register</a>
            </div>
        </div>

        <div id="register-form">
            <h1>Create Account</h1>
            <p class="subtitle">User Registration</p>
            
            <form action="php/register.php" method="POST">
                <div class="input-group">
                    <input type="text" name="username" id="username" placeholder="Full Name" required>
                </div>
                
                <div class="input-group">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required minlength="8">
                </div>
                
                <!-- <div class="input-group">
                    <input type="password" name="confirm_password" id="register-confirm-password" placeholder="Confirm Password" required minlength="8">
                </div> -->
                
                <button type="submit">Register</button>
            </form>
            
            <div class="links">
                <a href="#" onclick="showTab('login')">Already have an account?</a>
            </div>
        </div>
    </div>

    <script>
        function showTab(tab) {
            // Hide all forms
            document.getElementById('login-form').classList.remove('active');
            document.getElementById('register-form').classList.remove('active');
            
            // Show selected form
            document.getElementById(tab + '-form').classList.add('active');
            
            // Update tabs
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(t => t.classList.remove('active'));
            
            if (tab === 'login') {
                tabs[0].classList.add('active');
            } else {
                tabs[1].classList.add('active');
            }
        }

        // star
    </script>
</body>
</html>


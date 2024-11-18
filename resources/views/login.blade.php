<!-- login ini untuk superadmin dan skbd -->
<html>

<head>
    <title>
        Create Account
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 900px;
            height: 500px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left {
            background-color: #6C63FF;
            color: #fff;
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .left h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .left p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .left img {
            width: 100%;
            max-width: 300px;
        }

        .right {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .right input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .right .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .right .checkbox-container input {
            margin-right: 10px;
        }

        .right .checkbox-container a {
            color: #6C63FF;
            text-decoration: none;
        }

        .right .checkbox-container a:hover {
            text-decoration: underline;
        }

        .right button {
            width: 100%;
            padding: 10px;
            background-color: #6C63FF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .right button:hover {
            background-color: #5a54d6;
        }

        .right .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .right .social-login a {
            margin: 0 10px;
            font-size: 24px;
            color: #6C63FF;
            text-decoration: none;
        }

        .right .social-login a:hover {
            color: #5a54d6;
        }

        .right .signin {
            text-align: center;
            margin-top: 20px;
        }

        .right .signin a {
            color: #6C63FF;
            text-decoration: none;
        }

        .right .signin a:hover {
            text-decoration: underline;
        }

        .right .language {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>SIMANIS</h1>
            <p>Monitoring aset kendaraan dinas</p>
            <h1>Learn From World's Best Instructors Around The World.</h1>
            <img alt="Illustration" src="https://placehold.co/300x300" />
        </div>
        <div class="right">
            <div class="language">English (USA)</div>
            <h2>Log in</h2>
            <!-- Form untuk login -->
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf <!-- Token keamanan CSRF -->
                <input placeholder="username" type="text" name="username" required />
                <input placeholder="Password" type="password" name="password" required />
                <button type="submit">Log In</button>
            </form>

            <div class="social-login">
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
            <div class="signin">
                Already have an account?
                <a href="#">Sign in</a>
            </div>
        </div>
    </div>
</body>



</html>
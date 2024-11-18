<!-- ini halaman profil saya -->
<html>

<head>
    <title>
        Tazrin - User Interface Designer
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0e0e0;
        }

        .card {
            background-color: #ffffff;
            width: 800px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .card::before,
        .card::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #ffffff;
            border-radius: 50%;
        }

        .card::before {
            top: 50%;
            left: -10px;
            transform: translateY(-50%);
        }

        .card::after {
            top: 50%;
            right: -10px;
            transform: translateY(-50%);
        }

        .left-section {
            max-width: 40%;
        }

        .left-section h1 {
            font-size: 36px;
            margin: 0;
        }

        .left-section h1 span {
            color: #e74c3c;
        }

        .left-section p {
            font-size: 18px;
            margin: 10px 0;
        }

        .left-section .hire-me {
            display: inline-block;
            background-color: #e74c3c;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .left-section .hire-me i {
            margin-left: 10px;
        }

        .left-section .contact-info {
            margin-top: 20px;
            font-size: 14px;
        }

        .right-section {
            max-width: 50%;
            text-align: right;
        }

        .right-section .expert-on {
            color: #e74c3c;
            font-weight: bold;
        }

        .right-section p {
            font-size: 18px;
            margin: 10px 0;
        }

        .right-section .download-cv {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

        .right-section .download-cv i {
            margin-left: 5px;
        }

        .right-section .chat {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .right-section .chat i {
            margin-left: 5px;
        }

        .profile-image {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .decorative-circles {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .decorative-circles .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-block;
            margin-left: 10px;
        }

        .decorative-circles .circle.red {
            background-color: #e74c3c;
        }

        .decorative-circles .circle.blue {
            background-color: #3498db;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="left-section">
                <h1>
                    Hi,
                    <br />
                    I'm
                    <span>
                        Tazrin
                    </span>
                </h1>
                <p>
                    User Interface Designer
                </p>
                <a class="hire-me" href="#">
                    Hire Me
                    <i class="fas fa-arrow-right">
                    </i>
                </a>
                <p class="contact-info">
                    hellotazrin7@gmail.com
                </p>
                <p class="contact-info">
                    www.dribbble.com/tazrin
                </p>
            </div>
            <div class="right-section">
                <img alt="Profile image of Tazrin" class="profile-image" height="200" src="https://storage.googleapis.com/a1aa/image/HTBhxz9k1mrYKxZXeSe5pVHLMWquoDxZG9egSf111qQ1jDlOB.jpg" width="200" />
                <p class="expert-on">
                    Expert on
                </p>
                <p>
                    Based in Netherland
                    <br />
                    I'm developer and UI/UX designer.
                </p>
                <p>
                    Hey are looking for designer to build your brand and grow your business? let's shake hands with me.
                </p>
                <a class="download-cv" href="#">
                    Download CV
                    <i class="fas fa-download">
                    </i>
                </a>
                <div class="chat">
                    <p>
                        Let's Chat
                    </p>
                    <i class="fas fa-comments">
                    </i>
                </div>
                <div class="decorative-circles">
                    <div class="circle red">
                    </div>
                    <div class="circle blue">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
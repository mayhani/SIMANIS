<!-- ini dashboard untuk superadmin -->
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            background-image: linear-gradient(rgb(0 0 0 / 47%), rgb(0 0 0 / 47%)),
            url('{{ asset("gambar/ungu.jpg") }}');
            background-size: cover;
            background-position: center;
            z-index: 1;
        }


        .sidebar img {
            width: 50px;
            margin: 0 auto;
            display: block;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            color: #ffffff;
            border-radius: 20px;
        }

        .sidebar ul li:hover {
            background-color: #54588db5;
            color: white;
            border-radius: 20px 0px;
        }

        .sidebar ul li.active {
            background-color: #ffffff;
            border-radius: 20px 0px;
        }

        .main-content {
            background-color: #ffffff;
            margin-left: 250px;
            padding-left: 40px;
            padding-right: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fcf7ff00;
            border-radius: 20px;
            padding: 20px;
            border-bottom: 1px solid #fcf7ff00;
        }

        .header .search-bar {
            display: flex;
            align-items: center;
        }

        .header .search-bar input {
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-right: 10px;
        }

        .header .search-bar button {
            background-color: #ed7a9b00;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .header .icons {
            display: flex;
            align-items: center;
        }

        .header .icons i {
            margin-left: 20px;
            cursor: pointer;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 20px;
            /* Menambahkan jarak 5px antara setiap kotak */
        }

        .stats .stat {
            background-color: #8f91afb8;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
            width: 20%;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .stats .stat i {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .calendar-notifications {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .calendar {
            background-color: #fff7f770;
            padding: 20px;
            border-radius: 10px;
            width: 53%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .calendar .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar .days,
        .calendar .dates {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .calendar .days div,
        .calendar .dates div {
            width: 14%;
            text-align: center;
            padding: 5px;
            border-radius: 5px;
        }

        .calendar .dates div.active {
            background-color: #aeb0c5;
            color: white;
        }


        .notifications {
            width: 35%;
            background-color: #ffffff5e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .notifications .notification {
            margin-bottom: 10px;
        }

        .notifications .notification .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notifications .notification .header h4 {
            margin: 0;
        }

        .notifications .notification .header button {
            background-color: #aeb0c5;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <img alt="Logo" height="50" src="https://storage.googleapis.com/a1aa/image/whrTDiH73w7eDSfmYdf5oVkOT5BjgFG3JzmaxgJxlV4phBPnA.jpg" width="50" />
        <ul>
            <li class="active" style="color:#53568d;">Dashboard</li>
            <li>Pengguna</li>
            <li>Teachers</li>
            <li>Parents</li>
            <li>Library</li>
            <li>Attendance</li>
            <li>Exam</li>
            <li>Result</li>
            <li>Account</li>
            <li>Settings</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="welcome">
                <h2>Welcome to SIMANIS</h2>
            </div>
            <div class="search-bar">
                <input placeholder="Search" type="text" />
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="icons">
                <i class="fas fa-bell"></i>
                <a href="{{ route('profil') }}">
                    <i class="fas fa-user"></i>
                </a>

            </div>
        </div>

        <div class="stats">
            <a href="{{ route('pajak5tahunanlist') }}">
                <div class="stat">
                    <i class="fas fa-school"></i>
                    <h3>Pajak 5 Tahunan</h3>
                    <p>6000</p>
                </div>
            </a>

        </div>

        <a href="{{ route('pajaktahunanlist') }}">
            <div class="stat">
                <i class="fas fa-user-graduate"></i>
                <h3>pajak tahunan</h3>
                <p>24542</p>
            </div>
            <a href="{{ route('pengguna') }}">
                <div class="stat">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>pengguna</h3>
                    <p>5000</p>
                </div>
            </a>

            <div class="stat">
                <i class="fas fa-users"></i>
                <h3>Parents</h3>
                <p>10000</p>
            </div>
    </div>

    <div class="calendar-notifications">
        <div class="calendar">
            <div class="header">
                <h3>Calendar & Attendance</h3>
                <p id="current-date"></p>
            </div>
            <div class="days">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="dates" id="dates"></div>
        </div>
        <div class="notifications">
            <div class="notification">
                <div class="header">
                    <h4>Activities Notification</h4>
                    <button>View All</button>
                </div>
                <p>St.Xavier School</p>
                <p>02 Oct, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="notification">
                <p>Polar International School</p>
                <p>02 Oct, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
    </div>

    <script>
        const now = new Date();
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const daysInMonth = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

        // Set the current date at the top of the calendar
        document.getElementById('current-date').innerHTML = `${now.getDate()} ${monthNames[now.getMonth()]}, ${now.getFullYear()}`;

        // Fill the dates for the current month
        const datesContainer = document.getElementById('dates');
        for (let i = 1; i <= daysInMonth; i++) {
            const dateElement = document.createElement('div');
            dateElement.innerHTML = i;
            if (i === now.getDate()) {
                dateElement.classList.add('active');
            }
            datesContainer.appendChild(dateElement);
        }
    </script>
</body>

</html>
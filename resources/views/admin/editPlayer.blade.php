<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports League System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* color palate */
        :root {
            --primary-dark: #1A2238;
            --primary-light: #F4F4F4;
            --accent-color: #FF6D00;
            --secondary-color: #4A5568;
            --hover-color: #FF8F3D;
            --background-color: #F7F9FC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }

        /* Navigation Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 1rem 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .nav-container {
            display: flex;
            align-items: center;
        }

        .nav-links {
            display: flex;
            list-style: none;
            align-items: center;
            margin-right: 20px;
        }

        .nav-links li {
            margin: 0 10px;
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            transition: color 0.3s ease;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #ffd700;
            /* color: #7BD3EA; */
        }

        /* Dashboard Dropdown Styles */
        .dashboard-dropdown {
            position: relative;
        }

        .dashboard-btn {
            display: flex;
            align-items: center;
            /* background-color: #ffd700; */


            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dashboard-btn:hover {
            /* background-color: #ffea00; */
            transform: scale(1.05);
        }

        .dashboard-btn i {
            margin-left: 8px;
        }

        .dashboard-dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(43, 41, 41, 0.2);
            z-index: 1000;
            border-radius: 8px;
            overflow: hidden;
            top: 100%;
            right: 0;
        }

        .dashboard-dropdown:hover .dashboard-dropdown-content {
            display: block;
        }

        .dashboard-dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .dashboard-dropdown-content a:hover {
            /* background-color: #333; */
            background-color: rgb(221, 216, 216);
            /* color: #7BD3EA; */
            color: black;
        }

        /* Auth Buttons */
        .auth-buttons {
            display: flex;
            align-items: center;
        }

        .auth-buttons .btn {
            margin-left: 10px;
            padding: 8px 15px;
            border: 2px solid white;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }

        .auth-buttons .btn-login {
            background-color: transparent;
        }

        .auth-buttons .btn-register {
            background-color: #ffd700;
            color: black;
        }

        .auth-buttons .btn:hover {
            background-color: rgba(255, 215, 0, 0.8);
            color: black;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            z-index: 2000;
        }

        .menu-toggle span {
            height: 3px;
            width: 25px;
            background-color: white;
            margin-bottom: 4px;
            transition: all 0.3s ease;
        }

        /* Hero Section Styles */
        .hero {
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), */
                /* URL('images/backgroundImage.jpg'); */
            background-size: cover;
            /* background-position: center; */
            /* height: 100vh; */
            /* display: flex; */
            /* flex-direction: column; */
            justify-content: center;
            align-items: center;
            text-align: center;
            color: black;
            position: relative;
            padding-top: 57px;
        }


        /* .hero-content {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 30px;
            max-width: 800px;
            width: 90%;
        } */

        /* Responsive Design */
        @media screen and (max-width: 1024px) {
            .navbar {
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 1rem 3%;
            }

            .menu-toggle {
                display: flex;
                order: 3;
            }

            .nav-container {
                order: 2;
                width: 100%;
                display: none;
                flex-direction: column;
                background-color: rgba(0, 0, 0, 0.95);
                position: absolute;
                top: 100%;
                left: 0;
                padding: 20px 0;
            }

            .nav-container.active {
                display: flex;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
                align-items: center;
                margin: 0;
            }

            .nav-links li {
                margin: 10px 0;
                width: 100%;
                text-align: center;
            }

            .dashboard-dropdown {
                width: 100%;
                text-align: center;
            }

            .dashboard-dropdown-content {
                position: static;
                display: none;
                background-color: rgba(0, 0, 0, 0.8);
                width: 100%;
            }

            .dashboard-dropdown:hover .dashboard-dropdown-content,
            .dashboard-dropdown.active .dashboard-dropdown-content {
                display: block;
            }

            .auth-buttons {
                width: 100%;
                justify-content: center;
                margin-top: 15px;
            }
        }

        /* Features Section */
        .features-section {
            padding: 5rem 5%;
            background-color: var(--primary-light);
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .feature-card i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        /* Footer Styles */
        .footer {
            background-color: var(--primary-dark);
            color: var(--primary-light);
            padding: 4rem 5%;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
        }

        .footer-section h4 {
            /* color: var(--accent-color); */
            color: rgba(255, 215, 0, 0.8);
            margin-bottom: 1rem;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: var(--primary-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            /* color: var(--accent-color); */
            color: rgba(255, 215, 0, 0.8);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icons a {
            color: var(--primary-light);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            /* color: var(--accent-color); */
            color: rgba(255, 215, 0, 0.8);

        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* match */
        .containerMatch {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 8rem 5%;
        }

        .match {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.3s ease;
        }

        .match:hover {
            background-color: #ffd700;
        }

        .match:last-child {
            border-bottom: none;
        }

        .date {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .teams {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .team {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            flex: 1;
            text-align: center;
        }

        .team img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .team-name {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .score {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 10px 15px;
            border-radius: 8px;
            min-width: 80px;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 600px) {
            .match {
                flex-direction: column;
                text-align: center;
            }

            .teams {
                flex-direction: column;
                gap: 15px;
            }

            .score {
                margin: 15px 0;
            }
        }
        /* Table image---------------- */

       

        table {
            width: 100%;
            padding: 30px;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        thead th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        tbody td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Image Styles */
        td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Button Styles */
        .btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #007BFF;
        }

        .btn-delete {
            background-color: #DC3545;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">Sports League System</div>

        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-container">
            <ul class="nav-links">
                <li><a href="/">Home</a></li>

                <li class="dashboard-dropdown">
                    <a href="#" class="dashboard-btn" style="color: white;">
                        Dashboard <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dashboard-dropdown-content">
                        <a href="{{route('teamIndex')}}"><i class="fas fa-users"></i> Teams</a>
                        <a href="#players"><i class="fas fa-user-friends"></i> Players</a>
                        <a href="#league"><i class="fas fa-trophy"></i> League</a>
                        <a href="{{route('matchPage')}}"><i class="fas fa-futbol"></i> Matches</a>
                        <a href="#top-scorer"><i class="fas fa-chart-line"></i> Top Scorer</a>
                    </div>
                </li>
                <div class="dashboard-dropdown-content">
                        <a href="{{route('playerPageAdmin')}}"><i class="fas fa-user-friends"></i> playerPageAdmin</a>
                        <a href="#league"><i class="fas fa-trophy"></i> League</a>
                        <a href="{{route('gallariesAdmin')}}"><i class="fas fa-futbol"></i> GallariesAdmin</a>
                        <a href="{{route('matchPageAdmin')}}"><i class="fas fa-futbol"></i> MatchePageAdmin</a>
                    </div>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="auth-buttons">
                <a href="login" class="btn btn-login">Login</a>
                <a href="{{route('register')}}}}" class="btn btn-register">Register</a>


            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>DOB</th>
                <th>Nationality</th>
                <th>Goal</th>
                <th>Assist</th>
                <th>Panalties</th>
                <th>Player Image</th>
                <th>Country Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($playerinfo as $player)
            <tr>

                 <td>{{ $player['id'] }}</td>
                <td>{{ $player['name'] }}</td>
                <td>{{ $player['position'] }}</td>
                <td>{{ $player['dob'] }}</td>
                <td>{{ $player['nationality'] }}</td>
                <td>{{ $player['goal'] }}</td>
                <td>{{ $player['assist'] }}</td>
                <td>{{ $player['penalties'] }}</td>
               
                <td><img src="{{ asset('images/' . $player['profileimage']) }}" alt="player Image"></td> 
                <td><img src="{{ asset('images/' . $player['countryimage']) }}" alt="Country Image"></td>
               
               



                <td>
                    <a href="" class="btn btn-edit">Edit</a>
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>

    

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>About Us</h4>
                <p>Sports League System is the ultimate platform for managing sports leagues, connecting teams, and streamlining competition management.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <ul class="footer-links">
                    <li>Email: support@sportsleague.com</li>
                    <li>Phone: +1 (555) 123-4567</li>
                    <li>Address: 123 Sports Avenue, Game City</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Sports League System. All Rights Reserved.</p>
        </div>
    </footer>


</body>

</html>
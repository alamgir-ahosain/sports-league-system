<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLS | Matches</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/BFF2.png') }}">

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
            padding: 0.5rem 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .nav-links li {
            margin: 0 10px;
            position: relative;
            border-right: 1px solid #ccc;
            /* Line color */
            padding-right: 10px;
            /* Space between the text and line */
        }

        .nav-links li:last-child {
            border-right: none;
            /* Remove the line from the last item */
        }


        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 100px;
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

        .dashboard-dropdown {
            position: relative;
        }

        .dashboard-dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.9);
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            min-width: 200px;
        }

        .dashboard-dropdown:hover .dashboard-dropdown-content {
            display: block;
        }

        .dashboard-dropdown-content ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .dashboard-dropdown-content li {
            margin: 5px 0;
        }

        .dashboard-dropdown-content a {
            text-decoration: none;
            color: white;
            padding: 10px;
            display: block;
            transition: background 0.3s ease;
        }

        .dashboard-dropdown-content a:hover {
            background-color: #ffd700;
            color: black;
        }

        .btn {
            display: inline-block;
            text-align: center;
            padding: 8px 15px;
            border-radius: 4px;
            margin: 5px 0;
            transition: background 0.3s ease;
        }

        .btn-login {
            /* background-color: #007bff; */
            color: white;
        }

        .btn-login:hover {
            background-color: #ffd700;
            color: white;
        }

        .btn-register {
            /* background-color: #28a745; */
            color: white;
        }

        .btn-register:hover {
            background-color: #ffd700;
            color: white;
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                URL('images/backgroundImage.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            padding-top: 60px;
        }


        .hero-content {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 30px;
            max-width: 800px;
            width: 90%;
        }

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
        /* Match Container */
        .containerMatch {
            max-width: 1030px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 5rem 5%;
            /* Adjusted padding for balance */
        }

        /* Match Date */
        .date {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 10px;
            text-align: left;
            /* Align text to the left */
            width: 100%;
            /* Occupy full container width */
            padding-left: 15px;
            /* Space from the container edge */
        }

        /* Individual Match */
        .match-link {
            text-decoration: none;

        }

        .match {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Keep other items in the middle */
            justify-content: center;
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: relative;
            /* Allow child alignment adjustments */
        }

        .match:hover {
            background-color: #ffd700;
            transform: scale(1.02);
            /* Slight zoom on hover */
        }

        .match:last-child {
            border-bottom: none;
        }

        /* Teams Container */
        .teams {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px 15px;
            /* Balanced spacing */
        }

        /* Individual Team */
        .team {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            flex: 1;
            text-align: center;
        }

        .team img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .team img:hover {
            transform: scale(1.1);
            /* Zoom effect on hover */
        }

        .team-name {
            font-weight: 600;
            font-size: 1rem;
            color: #333333;
        }

        /* Score Section */
        .score {
            font-weight: 700;
            font-size: 1.25rem;
            color: #212529;
            text-align: center;
            padding: 0 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            min-width: 80px;
            /* Ensure consistent width for scores */
            display: flex;
            align-items: center;
            justify-content: center;
            /* Center align scores */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Match Container Adjustments */
        .match {
            padding: 20px 15px;
            /* Ensure consistent spacing */
            max-width: 900px;
            /* Restrict width for better alignment */
        }










        /* Responsiveness */


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

        /* General match container styling */
.match-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 2rem auto;
    /* padding: 1rem; */
    background-color: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    max-width: 900px;
    font-family: Arial, sans-serif;
}

/* Split teams layout */
.teams-split {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
}

/* Individual team sections */
.team-section {
    flex: 1;
    text-align: center;
    padding: 1rem;
    margin: 0 1rem;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Divider between teams */
.divider {
    width: 2px;
    background-color: #ddd;
    height: auto;
    margin: 0 1rem;
}

/* Team titles */
.team-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 1rem;
}

/* Team data text */
.team-data {
    font-size: 1rem;
    color: #555;
    margin-bottom: 1.5rem;
}

/* Table styling */
.team-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

.team-table thead tr {
    background: linear-gradient(to bottom, #ffd700, #fff5d7);
    color: black;
}

.team-table th,
.team-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.team-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.team-table tbody tr:hover {
    background-color: #e9ecef;
}

/* Player info section */
.player-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.player-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #007bff;
}



      
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/BFF2.png') }}" alt="logo">

            Sports League System
        </div>

        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-container">
            <ul class="nav-links">

                <li><a href="/">HOME</a></li>
                <li><a href="{{route(name: 'teamIndex')}}">TEAMS</a> </li>
                <li><a href="{{route('matchPage')}}"></i> MATCHES</a> </li>



                <li class="dashboard-dropdown">
                    <a href="#" class="dashboard-btn" style="color: white;">
                        LEADERBOARDS <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dashboard-dropdown-content">
                        <!-- <a href="{{route(name: 'teamIndex')}}"><i class="fas fa-users"></i> Teams</a> -->
                        <!-- <a href="{{route('playerPage')}}"><i class="fas fa-user-friends"></i> Players</a> -->
                        <!-- <a href="#league"><i class="fas fa-trophy"></i> League</a> -->
                        <!-- <a href="{{route('matchPage')}}"><i class="fas fa-futbol"></i> Matches</a> -->

                        <!-- <a href=""><i class="fas fa-chart-line"></i>Team Standing</a> -->
                        <a href="{{route('teamStanding')}}"><i class="fas fa-chart-line"></i> Team Standing</a>
                        <a href="{{route('topScorer')}}"><i class="fas fa-chart-line"></i> Top Scorer</a>
                    </div>
                </li>
                <li><a href="{{route('gallaries')}}">GALLARIES </a></li>

                   


                <li class="dashboard-dropdown">
                    <a href="#" class="dashboard-btn" style="color: white;">
                        ACCOUNT
                    </a>

                    <div class="dashboard-dropdown-content auth-buttons">
                        @if (Route::has('login'))
                        @auth
                        <!-- User is logged in -->
                        <ul>
                            <li><a href="{{ route('dashboard') }}" class="btn btn-login">
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                </a></li>
                            <li><a href="{{ route('logout') }}" class="btn btn-login"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <!-- User is not logged in -->
                        <ul>
                            <li><a href="{{ route('login') }}" class="btn btn-login">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a></li>
                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="btn btn-register">
                                    <i class="fas fa-user-plus"></i> Register
                                </a></li>
                            @endif
                        </ul>
                        @endauth
                        @endif
                    </div>
                </li>


                <li><a href="https://www.linkedin.com/in/alamgir-ahosain/" target="_blank">ABOUT</a></li>








            </ul>




        </div>
    </nav>


    <!-- Hero Section -->


    <!-- View -->


    <div class="containerMatch">

        <div class="match">
            <div class="date">
                {{ \Carbon\Carbon::parse($match->date)->format('F d, Y') }} | Matchday: {{ $match->id }}
            </div>
            <div class="teams">
                <div class="team">
                    <img src="{{ asset('images/' . $match->home_logo) }}" alt="{{ $match->home_team }} Logo">
                    <div class="team-name">{{ $match->home_team }}</div>
                </div>
                <div class="score">
                    {{ $match->home_score }} - {{ $match->away_score }}
                </div>
                <div class="team">
                    <img src="{{ asset('images/' . $match->away_logo) }}" alt="{{ $match->away_team }} Logo">
                    <div class="team-name">{{ $match->away_team }}</div>

                </div>
            </div>

        </div>


        <div class="match-container">
    <div class="teams-split">
        <!-- Home Team -->
        <div class="team-section">
            <h2 class="team-title">{{ $match->home_team }}</h2>
            <p class="team-data">Details about the home team</p>
            <table class="team-table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Goals</th>
                        <th>Match ID</th>
                        <th>Team ID</th>
                        <th>Player ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homeDetails as $detail)
                        <tr>
                            <td>
                                <div class="player-info">
                                    <img src="{{ asset('images/' . $detail->profileimage) }}" alt="{{ $detail->name }} Logo" class="player-image">
                                    <span>{{ $detail->name }}</span>
                                </div>
                            </td>
                            <td>{{ $detail->goals }}</td>
                            <td>{{ $detail->match_id }}</td>
                            <td>{{ $detail->team_id }}</td>
                            <td>{{ $detail->player_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="divider"></div>

        <!-- Away Team -->
        <div class="team-section">
            <h2 class="team-title">{{ $match->away_team }}</h2>
            <p class="team-data">Details about the away team</p>
            <table class="team-table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Goals</th>
                        <th>Match ID</th>
                        <th>Team ID</th>
                        <th>Player ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($awayDetails as $detail)
                        <tr>
                            <td>
                                <div class="player-info">
                                    <img src="{{ asset('images/' . $detail->profileimage) }}" alt="{{ $detail->name }} Logo" class="player-image">
                                    <span>{{ $detail->name }}</span>
                                </div>
                            </td>
                            <td>{{ $detail->goals }}</td>
                            <td>{{ $detail->match_id }}</td>
                            <td>{{ $detail->team_id }}</td>
                            <td>{{ $detail->player_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>







    </div>









    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>Sports League System</h4>
                <p>  A system to manage the teams, players, matches, scores, and standings</p>

        </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                        <li><a href="{{route(name: 'teamIndex')}}">Team</a></li>
                    <li><a href="https://www.linkedin.com/in/alamgir-ahosain/" target="_blank">About</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <ul class="footer-links">
                    <li>Email: alamgir.ahosain@gmail.com</li>
                    <li>Phone: +8801720214030</li>
                    <li>Address: Muktagachha,Mymensingh</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Me</h4>
                <div class="social-icons">
                    <a href="https://github.com/alamgir-ahosain" aria-label="Github" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/alamgir-ahosain/" aria-label="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy;Alamgir Hosain. All Rights Reserved.</p>
        </div>
    </footer>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLS | Top Scorrer</title>
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
    border-right: 1px solid #ccc; /* Line color */
    padding-right: 10px; /* Space between the text and line */
}

.nav-links li:last-child {
    border-right: none; /* Remove the line from the last item */
}


        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 100px;
            margin-right:10px;
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

        .containerScore {
      max-width: 1200px;
      margin: 0 auto;
      padding: 115px;
    }

    .table-wrapper {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    th, td {
      padding: 12px 16px;
      text-align: left;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
        background: linear-gradient(to bottom, #ffd700, #fff5d7);
        font-weight: 600;
    }

    tr:hover {
      background-color: #ffd700;
    }

    .player-info {
    display: flex;
    align-items: center; /* Align elements vertically */
    gap: 12px; /* Space between elements */
}

.player-info .country-flag {
    width: 24px;
    height: 16px;
    border-radius: 3px; /* Slight rounding for the flag */
    object-fit: cover; /* Ensures the flag retains proportions */
}

.player-info .profile-image {
    width: 40px;
    height: 50px;
    border-radius: 50%; /* Makes the image circular */
    object-fit: cover; /* Ensures the profile image retains proportions */
    border: 2px solid #ddd; /* Adds a light border around the profile image */
}

.player-info .player-name {
    font-size: 16px;
    font-weight: 600; /* Slightly bold */
    color: #333;
}


    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 24px;
    }

    .pagination button {
      background-color: #fff;
      border: 1px solid #ddd;
      color: #333;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 0 4px;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s, color 0.3s;
    }

    .pagination button:hover {
      background-color: #f0f0f0;
    }

    .filter-button {
      background-color: #007bff;
      border: none;
      color: #fff;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin-bottom: 16px;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .filter-button:hover {
      background-color: #0056b3;
    }
    </style>
</head>

<body>
   

<nav class="navbar">
        <div class="logo">
            <img  src="{{ asset('images/BFF2.png') }}" alt="logo">

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
  
    <div class="containerScore">
        <h1>Player Rankings</h1>
        <button class="filter-button">Filter</button>
        <div class="table-wrapper">

        <!-- table -->
        <table>
    <thead>
        <tr>
            <th>#</th> <!-- Serial column -->
            <th>Player</th>
            <th>Played</th>
            <th>Goal</th>
            <th>Assist</th>
            <th>Yellow Card</th>
            <th>Red Card</th>
            <th>Score</th>
           
            <!-- <th>Top Scorer</th> -->
        </tr>
    </thead>

    <tbody>
        @foreach($playerinfo as $player)
        <tr>
        <td>{{ $loop->iteration }}</td> <!-- Serial number -->

        <td>
    <div class="player-info">
        <img src="{{ asset('images/' . $player->countryimage) }}" alt="Country Flag" class="country-flag">
        <img src="{{ asset('images/' . $player->profileimage) }}" alt="Player Profile" class="profile-image">
        <b class="player-name">{{ $player->name }}</b>
    </div>
</td>

<td>{{ $player->played }}</td>
<td>{{ $player->goal }}</td>
<td>{{ $player->assist }}</td>
<td>{{$player->yellow}}</td>
<td>{{$player->red}}</td>
<td>{{ number_format(($player->goal * 4) + ($player->assist * 2), 2) }}</td>



            <!-- <td>
                @if(isset($topScorer) && $player->name === $topScorer->name)
                    <span class="top-scorer-badge">
                        🏆 Top Scorer ({{ number_format($topScorer->total_score, 2) }} Points)
                    </span>
                @else
                    --
                @endif
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>


        </div>
        <div class="pagination">
            <button>Previous</button>
            <button>Next</button>
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
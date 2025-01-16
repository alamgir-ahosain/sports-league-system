<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLS | Admin | MatchPage</title>
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
            padding-top: 90px;
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

        /*Match  */

        .register {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem 5%;
        }

        .register-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            padding: 2rem;
        }

        .register-form {
            display: grid;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: var(--primary-dark);
        }

        .form-group input,
        .form-group select {
            padding: 0.7rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .submit-btn {
            background-color: var(--accent-color);
            color: black;
            border: none;
            padding: 0.75rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: var(--hover-color);
        }

        .sub-btn{
            color: #1A2238;
        }
        
        .logo-upload {
            display: flex;
            align-items: center;
        }

        .logo-upload input[type="file"] {
            margin-left: 1rem;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
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
                 <!-- edit page  -->
                 <li class="dashboard-dropdown">
                    <a href="#" class="dashboard-btn" style="color: white;">
                        EDIT <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dashboard-dropdown-content">
                        <a href="{{route('playerPageAdmin')}}"><i class="fas fa-user-friends"></i> playerPageAdmin</a>
                        <a href="{{route('teamPageAdmin')}}"><i class="fas fa-futbol"></i> TeamPageAdmin</a>
                        <a href="{{route('gallariesAdmin')}}"><i class="fas fa-futbol"></i> GallariesAdmin</a>
                        <a href="{{route('matchPageAdmin')}}"><i class="fas fa-futbol"></i> MatchePageAdmin</a>
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
    <section class="hero">
        <div class="register">


            <div class="register-container">

                <h2 style="text-align: center; color: var(--primary-dark); margin-bottom: 1.5rem;">Match Registration</h2>



                <form class="register-form" action="/matchPageAdmin" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="date">Match Date</label>
                        <input type="datetime-local" id="date" name="date" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="home_team">Home Team</label>
                            <input type="home_team" id="home_team" name="home_team" placeholder="Enter home team" required>

                        </div>

                        <div class="form-group">
                            <label for="away_team">Away Team</label>
                            <input type="away_team" id="away_team" name="away_team" placeholder="Enter away team" required>


                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group logo-upload">
                            <label for="home_logo">Home Team Logo</label>
                            <input type="file" id="home_logo" name="home_logo" accept="image/*">
                        </div>

                        <div class="form-group logo-upload">
                            <label for="away_logo">Away Team Logo</label>
                            <input type="file" id="away_logo" name="away_logo" accept="image/*">
                        </div>
                    </div>

                    <!--  -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="home_score">Home Team Score</label>
                            <input type="number" id="home_score" name="home_score" min="0">
                        </div>

                        <div class="form-group">
                            <label for="away_score">Away Team Score</label>
                            <input type="number" id="away_score" name="away_score" min="0">
                        </div>
                    </div>


                    <!--  -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="home_result">Home Team Result</label>
                            <select id="home_result" name="home_result">
                                <option value="W">Win (W)</option>
                                <option value="D">Draw (D)</option>
                                <option value="L">Lost (L)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="away_result">Home Team Result</label>
                            <select id="away_result" name="away_result">
                                <option value="W">Win (W)</option>
                                <option value="D">Draw (D)</option>
                                <option value="L">Lost (L)</option>
                            </select>
                        </div>



                       
                    </div>





                    <button type="submit" class="submit-btn">Register Match</button>

                    <div class="sub-btn">
                        <a href="{{route('scorePageAdmin')}}" class="btn btn-register" style="text-align:center;color:black">Add Player Score</a>
                    </div>
                    <div class="sub-btn">
                        <a href="{{route('editMatch')}}" class="btn btn-register" style="text-align:center;color:black">edit match</a>
                    </div>
                    
                    


                </form>
            </div>
        </div>
    </section>


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
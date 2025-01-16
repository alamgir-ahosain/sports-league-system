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
    

        /*  */
          /* Additional styles for team section */
          .teams-section {
            padding: 8rem 5%;
            background-color: var(--background-color);
        }

        .teams-section h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-dark);
        }

        .team-showcase-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: var(--background-color);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .team-showcase {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }

        .team-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e0e4e8;
            position: relative;
            overflow: hidden;
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: var(--secondary-color);
            transition: transform 0.3s ease;
        }

        .team-card:hover::before {
            transform: scaleX(0);
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        }

        .team-logo-wrapper {
            width: 120px;
            height: 120px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f1f3f4;
            transition: background-color 0.3s ease;
        }

        .team-logo {
            max-width: 1000px;
            max-height:150px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .team-card:hover .team-logo {
            transform: scale(1.1);
        }

        .team-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-color);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .team-link {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color:#ffd700;
            color: black;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .team-link:hover {
            background-color: #21618c;
        }

        @media (max-width: 1024px) {
            .team-showcase {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .team-showcase {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .team-showcase {
                grid-template-columns: 1fr;
            }
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
                        <a href="{{route('playerPage')}}"><i class="fas fa-user-friends"></i> Players</a>
                        <a href="#league"><i class="fas fa-trophy"></i> League</a>
                        <a href="{{route('matchPage')}}"><i class="fas fa-futbol"></i> Matches</a>
                        <a href="{{route('topScorer')}}"><i class="fas fa-chart-line"></i> Top Scorer</a>
                    </div>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="auth-buttons">

            @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <!-- <a  href="{{ url('/dashboard') }}"> Dashboard  </a> -->
                                  
                                     <a href="{{route('dashboard')}}" class="btn btn-login"> <h5>{{ Auth::user()->name }}</h5></a>


                                @else
                                    <!-- <a href="{{ route(name: 'login') }}"> Log in  </a> -->
                                     <a href="{{route('login')}}" class="btn btn-login">Login</a>


                                    @if (Route::has('register'))
                                        <!-- <a  href="{{ route(name: 'register') }}"> Register</a> -->
                                         <a href="{{route('register')}}" class="btn btn-login">Register</a>

                                    @endif
                                @endauth
                            </nav>
                        @endif
                <!-- <a href="login" class="btn btn-login">Login</a>
                <a href="register" class="btn btn-register">Register</a> -->
            </div>
        </div>
    </nav>

    <!-- <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Sports League System</h1>
            <p>Connecting Teams, Tracking Performance, Celebrating Sport</p>
        </div>
    </section> -->

    <!-- New Teams Section -->
    <section class="teams-section">
        <h2>Player List</h2>
        <div class="team-showcase-container">
            <div class="team-showcase" id="teamShowcase"></div>
        </div>
    </section>




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


    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.querySelector('.menu-toggle');
            const navContainer = document.querySelector('.nav-container');
            const dashboardDropdown = document.querySelector('.dashboard-dropdown');

            // Mobile Menu Toggle
            menuToggle.addEventListener('click', () => {
                navContainer.classList.toggle('active');
                menuToggle.classList.toggle('active');
            });

            // Dashboard Dropdown for Mobile
            if (window.innerWidth <= 1024) {
                dashboardDropdown.addEventListener('click', (e) => {
                    e.preventDefault();
                    dashboardDropdown.classList.toggle('active');
                });
            }

            // Close mobile menu when a link is clicked
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    navContainer.classList.remove('active');
                    menuToggle.classList.remove('active');
                    dashboardDropdown.classList.remove('active');
                });
            });
        });
    </script> -->
  
  <!--  -->
  <script>
        const teams = [          
            
            { name: "Messi", logo: "images/messi.png",link: "{{route('messi')}}",  },
            { name: "Maria", logo: "images/maria.png" ,link: "https://www.juventus.com"},
            { name: "Ronaldo", logo: "images/ronaldo.png" ,link: "https://www.juventus.com"}, 
            { name: "Messi", logo: "images/messi.png",link: "https://www.juventus.com" },
            { name: "Maria", logo: "images/maria.png" ,link: "https://www.juventus.com"},
            { name: "Ronaldo", logo: "images/ronaldo.png" ,link: "https://www.juventus.com"}
            , { name: "Messi", logo: "images/messi.png",link: "https://www.juventus.com" },
            { name: "Maria", logo: "images/maria.png" ,link: "https://www.juventus.com"},
            { name: "Ronaldo", logo: "images/ronaldo.png" ,link: "https://www.juventus.com"},
             { name: "Messi", logo: "images/messi.png",link: "https://www.juventus.com" },
            { name: "Maria", logo: "images/maria.png" ,link: "https://www.juventus.com"},
            { name: "Ronaldo", logo: "images/ronaldo.png" ,link: "https://www.juventus.com"},

           
           
          
            
            
        ];

        function renderTeams() {
            const showcase = document.getElementById('teamShowcase');
            teams.forEach(team => {
                const teamCard = document.createElement('div');
                teamCard.className = 'team-card';
                teamCard.innerHTML = `
                    <div class="team-logo-wrapper">
                        <img src="${team.logo}" alt="${team.name} Logo" class="team-logo">
                    </div>
                    <div class="team-name">${team.name}</div>
                    <a href="${team.link}" target="_self" class="team-link">player details</a>
                `;
                showcase.appendChild(teamCard);
            });
        }

        document.addEventListener('DOMContentLoaded', renderTeams);
    </script>
    
      
</body>

</html>
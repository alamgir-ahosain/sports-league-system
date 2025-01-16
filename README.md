
# Sports League System in Laravel
The Sports League System is a web-based application designed to efficiently manage teams, players, matches, scores, and standings. The project is built using the Laravel framework, with HTML and CSS for the frontend design.

## Features
### An Admin Can
- **Team Management**: Add, update, and view team details
- **Player Management**: Manage player profiles, assign players to teams.
- **Match Scheduling**: Create and manage match schedules.
- **Score Tracking**: Record and update match scores.
- **Standings**: Automatically calculate and display league standings.
- **Ranking**: Automatically calculate and display Player ranking.

## Technologies Used
- **Frontend**: HTML,CSS (Bootstrap), JavaScript
- **Backend:** Laravel Framework
- **Database**: MySQL
## Installation Guide

### Step 1: Clone the Repository
```bash
https://github.com/alamgir-ahosain/sports-league-system.git
 ```
or Download Zip file

### Step 2: Install Dependencies
```
composer install
npm install
npm run dev
 ```

### Step 3: Environment Setup
- Copy the ``` .env.example ``` file and rename it to ``` .env ```
- Generate the application key: ```php artisan key:generate --ansi ```
 
### Step 4: Database Configuration 
 - Update your ```.env``` file with your database credentials:
 ``` DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```
### Step 5: Run the Application
```
php artisan migrate
php artisan serve
 ```

## Usage
1. Register a new account.
2. Log in with your credentials.
3. Browse with the role

## Screenshots

- Home Page
  ![Screenshot 2025-01-17 001946](https://github.com/user-attachments/assets/b6480db7-482b-4bff-85ec-b74df0287b84)
- Team Page
  ![Screenshot 2025-01-17 001959](https://github.com/user-attachments/assets/74c0c48e-80f3-4f09-93ee-ed289d9af354)
- Team Details
![Screenshot 2025-01-17 002031](https://github.com/user-attachments/assets/b1aac3c8-ab62-4ec2-842f-50fbc72ff551)
- Player Page
![Screenshot 2025-01-17 002044](https://github.com/user-attachments/assets/cd583daa-d4b5-4221-9335-4d407193f7f0)
- Match Page
  ![Screenshot 2025-01-17 002827](https://github.com/user-attachments/assets/958dd56b-5828-43c5-b95e-1ad1aa820dda)

- Match Details
![Screenshot 2025-01-17 002838](https://github.com/user-attachments/assets/3c14d34a-fb13-4083-a8cc-1bc256675162)
- Team Standing
  ![Screenshot 2025-01-17 002102](https://github.com/user-attachments/assets/a3d00534-ab10-4b13-8a92-c760a2788a1c)
- Player Ranking
  ![Screenshot 2025-01-17 002112](https://github.com/user-attachments/assets/bc8c25ca-6780-4bbd-9374-ffc927fb7a6e)

- Gallaries
  ![Screenshot 2025-01-17 002237](https://github.com/user-attachments/assets/41e4a7f2-335c-4753-bff9-e8a4d17c8401)
- Specefic Match Gallaries Details
![Screenshot 2025-01-17 002245](https://github.com/user-attachments/assets/fb2383f3-0eca-488e-bde1-8ef3266ea628)
- Admin Home Page
  ![Screenshot 2025-01-17 002341](https://github.com/user-attachments/assets/871e3cb7-d499-4dfc-acbe-e5e5668c9438)

- Admin Player Page
  ![Screenshot 2025-01-17 002351](https://github.com/user-attachments/assets/1bdfd493-da89-462d-988e-e626341043fa)

 - Admin Team Page
   ![Screenshot 2025-01-17 002400](https://github.com/user-attachments/assets/acf64ebe-51c1-4cad-b328-7172043fec87)
- Admin Gallaries Page
  ![Screenshot 2025-01-17 002409](https://github.com/user-attachments/assets/f078b602-eb98-46c7-8aa5-a43751199395)
- Admin Match Page
  ![Screenshot 2025-01-17 002417](https://github.com/user-attachments/assets/c6c25664-b440-482e-a11e-2ee4d87d2b22)


# Thank You for Checking Out This Project!
Your feedback is valuable! Please share your thoughts and suggestions for improvement via [GitHub Issues](https://github.com/alamgir-ahosain/sports-league-system/issues).

## Acknowledgements
- Thanks to [Laravel Documentation](https://laravel.com/docs) for providing comprehensive guidelines.
- Special thanks to all open-source contributors for their hard work and support.









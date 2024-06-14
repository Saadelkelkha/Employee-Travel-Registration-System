# Employee-Travel-Registration-System

### Project Description:
The Employee Travel Registration System is a web-based application designed to streamline the process of travel planning and management for employees within a company. The system facilitates secure user login, travel registration, and viewing of travel details through an intuitive interface. Built with PHP and MySQL, it ensures data integrity and ease of use.

#### Key Features:
1. **User Authentication**:
   - Secure login functionality for employees to access the system.
   - Session management to maintain user authentication status.

2. **Travel Registration**:
   - A form for employees to register their travel plans by selecting departure and arrival cities, travel date, and the number of travelers.
   - Integration with a database to provide options for travel destinations and to save travel registration details.

3. **Travel List and Details**:
   - Functionality to view a list of registered travels with options to filter by date.
   - Detailed view of travel information including departure and arrival cities, travel dates, and times.

4. **Navigation Menu**:
   - A navigation menu that provides links to different functionalities such as travel registration, viewing the list of travels, and logging out.

#### `conxDB.php`:
Establishes a connection to the MySQL database using PDO.

#### `connEmp.php`:
Handles the login process for employees.

#### `menu.php`:
Displays a navigation menu if the user is authenticated.

#### `sinscrire.php`:
Contains the form for registering a new travel booking.

#### `listeIns.php`:
Allows employees to filter and view a list of their travel registrations.

#### `autrepage.php`:
Displays detailed information about a specific travel registration.

#### `deconnecter.php`:
Handles user logout by ending the session.

# Airline Reservation System

This is a simple Airline Reservation System built using **PHP**, **MySQL**, and **HTML/CSS**. It allows users to view available flights, book a seat, and cancel bookings. Admins can log in to manage bookings, users, and flights.

---

## Features

- View all available flights
- Book a seat for a passenger
- Cancel an existing booking
- Admin login with session protection
- Admin dashboard for:
  - Viewing all bookings
  - Managing users (Coming soon)
  - Managing flights (Coming soon)
- Fully responsive layout with animated styling (No Bootstrap)

---

## Technologies Used

- **Front-end**: HTML, CSS (custom, responsive)
- **Back-end**: PHP
- **Database**: MySQL
- **Server**: Apache (XAMPP recommended)

---

## Project Structure
Airline-Reservation-System/
├── admin/
│ ├── admin_login.php
│ ├── admin_dashboard.php
│ ├── manage_bookings.php
│ ├── manage_users.php
│ └── manage_flights.php
├── bookings/
│ ├── book_flight.php
│ └── cancel_booking.php
├── images/
│ ├── flight.jpg
│ └── favicon.png
├── db_config.php
├── index.php
└── README.md

yaml
Copy
Edit

---

## Setup Instructions

### Prerequisites:
- XAMPP/WAMP installed with Apache & MySQL
- PHP 7.x or 8.x
- phpMyAdmin or any MySQL client

### Steps:

1. **Clone this repository** or download the ZIP
    ```bash
    git clone https://github.com/your-username/airline-reservation-system.git
    ```

2. **Move it to your web root** (e.g., `htdocs` for XAMPP)
    ```
    C:/xampp/htdocs/airline-reservation-system/
    ```

3. **Start Apache and MySQL** using XAMPP Control Panel.

4. **Create the Database**:
    - Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
    - Create a database named `airline_reservation`
    - Import the SQL file provided (`airline_reservation.sql`) if available

5. **Configure Database**:
    - Open `db_config.php` and update credentials if needed:
      ```php
      $conn = new mysqli('localhost', 'root', '', 'airline_reservation');
      ```

6. **Access the Application**:
    - [http://localhost/airline-reservation-system/index.php](http://localhost/airline-reservation-system/index.php)

---

## Admin Login

- **Username**: `admin`
- **Password**: `admin123`

(*You can change this in the database table `admins`*)

---

## Screenshots

<details>
<summary>Home Page</summary>
<img src="images/screenshot-home.png" width="600"/>
</details>

<details>
<summary>Admin Dashboard</summary>
<img src="images/screenshot-admin.png" width="600"/>
</details>

---

## Future Enhancements

- Flight CRUD operations
- Pagination for bookings
- Search & filter flights
- Email confirmation for bookings

---

## License

This project is open-source and available under the [MIT License](LICENSE).

---

## Acknowledgments

- Thanks to [OpenAI ChatGPT](https://chat.openai.com) for helping build this.
- Icons used from [Unicode Emoji](https://emojipedia.org)

---

> Made with by Muthukumaran M


---

# Biblios

Biblios is a library management system built using Symfony, a PHP framework. The application allows users to manage book collections, track loans, and manage user accounts.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## Features

- **User Management:** Admins can manage user accounts, roles, and permissions.
- **Book Management:** Users can add, edit, and delete book records.
- **Search Functionality:** Users can search for books by title, author, or ISBN.

## Getting Started

### Prerequisites

- PHP 8.1+
- Composer
- Symfony CLI
- PostgreSQL or any other supported database

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Sphynx6/Biblios.git
   cd Biblios
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Set up environment variables:**
   Copy the `.env` file and customize the necessary environment variables:
   ```bash
   cp .env .env.local
   ```

4. **Create the database:**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Load initial data (optional):**
   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. **Run the Symfony development server:**
   ```bash
   symfony server:start
   ```

### Configuration

- **Database Configuration:** Add the `DATABASE_URL` in your `.env.local` file to point to your database.
- **Mailer Configuration:** Set up your mailer settings if the application sends emails.

## Usage

- **Admin Panel:** Log in with an admin account to access the admin panel where you can manage books, users, and loans.
- **Book Search:** Use the search bar on the homepage to find books by title, author, or ISBN.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request for any changes you would like to make.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- This project was developed as part of the OpenClassrooms curriculum.
- Special thanks to the Symfony community for their extensive documentation and support.

---

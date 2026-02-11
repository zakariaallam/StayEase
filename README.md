StayEase 🏨
StayEase is a robust hotel management and reservation platform built with Laravel. It provides a seamless experience for guests to book rooms and for administrators to manage hospitality operations efficiently.

🚀 Key Features
Room Booking & Management: Real-time availability and easy reservation flow.

Secure Payments: Integrated with Stripe for safe credit card transactions.

Email Confirmations: Automated booking confirmations and notifications using Laravel Mailer.

Dockerized Environment: Fully containerized setup with Nginx and PHP-FPM for consistent deployment.

Admin Dashboard: Centralized control for managing rooms, users, and tracking bookings.

🛠️ Tech Stack
Framework: Laravel 11.x / 12.x

Web Server: Nginx

Database: MySQL

Containerization: Docker & Docker Compose

Payments: Stripe API

Mailing: Laravel Mailer (SMTP / Mailtrap)

Frontend: Blade, Tailwind CSS

📦 Installation & Setup
1. Clone the Repository
Bash
git clone https://github.com/zakariaallam/StayEase.git
cd StayEase
2. Environment Configuration
Copy the template and update your credentials:

Bash
cp .env.example .env
Key sections to update in .env:

Stripe: STRIPE_KEY, STRIPE_SECRET

Mail: MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD (for booking confirmations)

3. Docker Deployment
StayEase is configured to run via Docker. Ensure you have Docker and Docker Compose installed:

Bash
# Build and start the containers (Nginx, PHP, MySQL)
docker-compose up -d --build

# Install dependencies inside the container
docker-compose exec app composer install
docker-compose exec app npm install && npm run build

# Generate app key and migrate database
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
The application will be accessible at http://localhost.

📧 Mailer Setup
The system uses Laravel's Mailer to send booking confirmations. To test this locally, you can use Mailtrap or the built-in log driver:

Code snippet
MAIL_MAILER=smtp
MAIL_FROM_ADDRESS="no-reply@stayease.com"
MAIL_FROM_NAME="StayEase"
💳 Stripe Integration
To process payments, ensure your Stripe webhook is configured to handle checkout.session.completed events so that bookings are marked as paid automatically.

📊 Project Tracking
We use Jira to manage our development sprints and tasks.

Board: StayEase Jira Board (SPDRH)

📄 License
This project is licensed under the MIT License.

👥 Contributors
Zakaria Allam
Soufyane el omrani
Mohammed boussouir
Abdelrazzak aamaich

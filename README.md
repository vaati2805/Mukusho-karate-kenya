# Mukusho Kenya

Welcome to the **Mukusho Kenya** platform—a dual-portal web application that houses both **Mukusho Karate Kenya** and **Mukusho Films**.

## 🥋 Mukusho Karate Kenya
A premier martial arts organization based in Kenya (with clubs in Nyeri, Nanyuki, Murang'a, and Othaya). The club focuses on:
- Sport Karate and Traditional Shorin-Ryu
- Self-Defence classes
- Youth empowerment and discipline
- Competitive training for elite athletes

## 🎬 Mukusho Films
The cinema and production arm of Mukusho. Mukusho Films produces Kenyan drama series, short films, and martial arts content, including:
- **MAPESA Series** (Political Thriller airing on UTV Kenya)
- **KISASI** (Family Drama)
- **Pazia la Siri**
- Engaging self-defence tutorials and karate demonstrations

---

## 🏗️ Technology Stack
This platform is built with a modern PHP/Laravel stack for performance and easy content management:
- **Framework:** Laravel 12.x
- **Styling:** Tailwind CSS (with arbitrary values and custom animations)
- **Frontend Interactivity:** Alpine.js
- **Database:** MySQL / SQLite (for local development)

## 🚀 Key Features
- **Dual-Portal Landing Page:** A stunning split-screen interface allowing users to choose between the Karate site and the Films site.
- **Global Site Mode Toggle:** Easily toggle the entire site's routing mode from `routes/web.php` to immediately put one or both sites into an elegant "Under Maintenance" mode.
- **Dynamic Content Management:** CMS features leveraging Laravel components and `SiteContent` models.
- **Member Registration:** In-built portals for new members to sign up and view class schedules.

## ⚙️ Running Locally
To get the project up and running on your local machine:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/vaati2805/Mukusho-karate-kenya.git
   cd Mukusho-karate-kenya
   ```

2. **Install PHP Dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM Dependencies & Compile Assets:**
   ```bash
   npm install
   npm run build
   ```
   *(Use `npm run dev` if you are actively making front-end CSS/JS changes).*

4. **Environment Setup:**
   Duplicate the `.env.example` file and rename it to `.env`. Generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Setup:**
   Configure your database credentials in the `.env` file, then run migrations:
   ```bash
   php artisan migrate
   ```

6. **Serve the Application:**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` in your web browser.

---

## 🛠️ Routing Configuration (`routes/web.php`)
The root routing of the application is controlled by a single `$mode` variable inside `routes/web.php`, allowing administrators to instantly switch traffic flow:

- **Mode 1 (Full Portal):** Root loads the split-screen portal. Both Karate and Films pages are fully accessible.
- **Mode 2 (Karate Direct):** Bypasses the portal entirely. Root redirects to the Karate homepage. Films links show an "Under Maintenance" popup.
- **Mode 3 (Films Maintenance):** Root loads the portal. Selecting Karate enters the Dojo natively. Selecting Films triggers an "Under Maintenance" popup.

## 🤝 Contact
For technical concerns or to reach the instructors:
- **Email:** mukushofilms@gmail.com
- **Nyeri Dojo / Production House:** Located in Nyeri Central, Kenya.

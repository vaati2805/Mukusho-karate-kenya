# Website Development Proposal

## Mukusho Karate Kenya — Official Website

---

**Prepared by:** Daniel Vee  
**Prepared for:** Sensei Benard Kihachu — Mukusho Karate Kenya  
**Date:** March 8, 2026  
**Document Reference:** MKK-WEB-2026-001

---

## 1. Executive Summary

Dear Sensei Benard Kihachu,

I am pleased to present this proposal for the design, development, and delivery of a **fully custom, professional website** for **Mukusho Karate Kenya**. This website has been purpose-built from the ground up to represent the club's identity, serve its operational needs, and provide a powerful digital presence that attracts new students, engages existing members, and showcases the club's achievements nationally and internationally.

This is not a generic template — it is a **bespoke web application** with a full Content Management System (CMS), member registration portal, payment tracking, admin dashboard, multi-media gallery, and more — all tailored specifically to Mukusho Karate Kenya's operations.

---

## 2. Scope of Work Delivered

### 2.1 Public-Facing Website (17 sections)

| Feature | Description |
|---|---|
| **Homepage** | 1,500+ lines of hand-crafted, responsive design with Kenyan-themed branding (green, red, amber) |
| **Navigation** | Responsive navbar with desktop and mobile menu, smooth scroll, section anchoring |
| **Hero Section** | Full-width animated hero banner with call-to-action buttons |
| **About Section** | Club history, mission statement, and CMS-managed imagery |
| **Programs Section** | 4 program cards (Little Warriors, Teens & Adults, Elite Competition, Self-Defence) — all CMS-driven with dynamic pricing, age ranges, features, and icons |
| **Clubs / Locations** | CMS-managed affiliated club listings across Nyeri, Nanyuki, Murang'a, Othaya |
| **Instructors Section** | CMS-driven instructor profiles with uploaded photos, bios, social links, and tags |
| **Achievements Section** | CMS-managed champion showcase with uploaded media |
| **Values Section** | CMS-driven values display (Respect, Discipline, Focus, etc.) |
| **Why Choose Us** | 6-card feature grid highlighting expert coaching, family-friendly, competition success, personal growth, sport & self-defence, affordable membership |
| **Events & Competitions** | Smart date-based filtering into Upcoming vs Recent events, with multi-media mini slideshows |
| **Gallery / Media** | Full-screen Alpine.js slideshow with autoplay, navigation, thumbnails, video support — plus a static grid |
| **Training Schedule** | CMS-managed weekly schedule display |
| **Testimonials** | CMS-driven student testimonial cards |
| **FAQ Section** | Accordion-style CMS-managed FAQ |
| **Contact / Free Trial** | Contact details + free trial request form with database storage |
| **Footer** | Multi-column footer with quick links, contact info, social media links |

### 2.2 Member Registration System

| Feature | Description |
|---|---|
| **Registration Type Chooser** | Kid vs Adult registration path selection |
| **Kid Registration Form** | Full form with guardian details, school, emergency contacts, optional photo upload |
| **Adult Registration Form** | Full form with personal details, belt rank, emergency contacts, optional photo upload |
| **Success Page** | Post-registration confirmation with M-Pesa payment instructions |
| **Database Storage** | All registrations stored securely in MySQL with proper validation |

### 2.3 Payment Tracking System

| Feature | Description |
|---|---|
| **Monthly Payment Form** | Members can record monthly fee payments |
| **Payment Success Page** | Confirmation with transaction reference |
| **Payment Records** | All payments stored and linked to members |

### 2.4 Admin Dashboard & CMS

| Feature | Description |
|---|---|
| **Secure Login** | Admin authentication with email/password |
| **Role-Based Access Control (RBAC)** | 4 roles: Super Admin, Admin, Editor, Viewer — with granular permissions for members, payments, content, and users |
| **Content Management System** | Full CRUD for 11 CMS sections (48+ content items). Create, edit, archive, restore, delete content. Dynamic extra fields (key-value) for flexible data |
| **Multi-Media Upload** | Drag-and-drop image and video upload (multiple files). Individual media delete. Automatic thumbnail generation. Legacy compatibility |
| **User Management** | Create, edit, approve, reject, and delete admin users. Role and permission assignment |
| **Member Management** | View all registered members in the dashboard |
| **Payment Management** | View all payment records in the dashboard |
| **Data Exports** | Export members and payments to CSV, Excel (XLS), and PDF formats |
| **Free Trial Requests** | View and manage trial form submissions |

### 2.5 Technical Specifications

| Component | Technology |
|---|---|
| **Backend Framework** | Laravel 12.x (PHP 8.4) |
| **Frontend** | Tailwind CSS, Alpine.js |
| **Build Tool** | Vite 7.x |
| **Database** | MySQL |
| **Fonts** | Oswald (headings) + Inter (body) via Google Fonts |
| **File Storage** | Laravel Public Disk with symlink |
| **Authentication** | Laravel built-in auth with bcrypt hashing |
| **Responsive Design** | Mobile-first, tested on phones, tablets, and desktops |

### 2.6 Codebase Statistics

| Metric | Count |
|---|---|
| Total custom PHP files | 12 |
| Total Blade view templates | 17 |
| Total lines of custom code | 5,000+ |
| Database migrations | 7 |
| Eloquent models | 6 |
| Controllers | 5 |
| Named routes | 30+ |

---

## 3. Why This Investment is Worth It

### 3.1 Custom-Built, Not a Template

Generic website templates from Wix, WordPress themes, or Squarespace cost KSH 13,000–39,000/year and look like every other site. **This website is built from scratch** with:

- Kenyan-themed branding (KKF flag colors)
- Custom UI components designed specifically for a karate dojo
- A built-in CMS so you never need a developer to update content
- Purpose-built registration and payment systems for your exact workflow

### 3.2 Full Content Control

You control **every piece of content** on your website — programs, events, instructors, achievements, clubs, testimonials, FAQs, schedule — all from your admin panel. No monthly fees to a content editor. No waiting for someone else to make changes.

### 3.3 Professional Digital Presence

In 2026, a professional website is **not optional** for a sports club that:
- Attracts parents to enrol their children
- Recruits members from Nyeri, Nanyuki, Murang'a, and beyond
- Represents Kenya at national and international competitions
- Partners with organisations like PowerGirl Africa

A professional website builds **trust, credibility, and accessibility** that social media alone cannot provide.

### 3.4 Member Registration Pipeline

The built-in registration system means new students can sign up **24/7** from their phones. The free trial form captures leads. The admin dashboard gives you a clear view of all registrations and payments.

### 3.5 SEO & Discoverability

The website is built with proper HTML semantics, fast loading times, and structured content — making it discoverable on Google when people search for "karate classes Nyeri", "martial arts Kenya", or "kids karate near me".

### 3.6 Scalability

The architecture supports future additions:
- Online payment integration (M-Pesa STK Push, PayPal)
- Event registration and ticketing
- Student grading/belt progression tracking
- E-commerce (merchandise, equipment)
- Email/SMS notifications
- Multi-language support

---

## 4. Pricing

### 4.1 Website Development (One-Time Cost)

| Item | Description | Price (KSH) |
|---|---|---|
| Custom website design & development | Full-stack web application with 17 templates, 5 controllers, 6 models, 30+ routes | KSH 15,000 |
| Content Management System (CMS) | 11-section CMS with full CRUD, multi-media uploads, archiving | KSH 6,000 |
| Member registration system | Kid + Adult registration with validation, photo upload, database storage | KSH 4,500 |
| Payment tracking system | Monthly payment recording, member linkage, success flow | KSH 3,000 |
| Admin dashboard & RBAC | Secure login, 4-role system, user management, data exports (CSV/XLS/PDF) | KSH 5,000 |
| Multi-media gallery & slideshow | Drag-and-drop upload, Alpine.js slideshow, mini slideshows, video support | KSH 3,500 |
| Responsive design & optimization | Mobile-first design, cross-browser testing, performance optimization | KSH 3,000 |
| **TOTAL (Development)** | | **KSH 40,000** |

### 4.2 Deployment & Launch (One-Time Cost)

| Item | Description | Price (KSH) |
|---|---|---|
| Domain name registration (1 year) | e.g. `mukushokarate.co.ke` or `mukushokarate.com` | KSH 1,500–3,000 |
| Server setup & deployment | VPS configuration, SSL certificate, DNS setup, Laravel deployment | KSH 5,000 |
| Database migration & seeding | Production database setup with all 48+ content records | Included |
| Training session | 1-hour hands-on training for admin panel usage | Included |
| **TOTAL (Deployment)** | | **KSH 6,500–8,000** |

### 4.3 Grand Total (One-Time)

| | KSH |
|---|---|
| **Website Development** | **KSH 40,000** |
| **Deployment & Launch** | **KSH 6,500 – 8,000** |
| **GRAND TOTAL** | **KSH 46,500 – 48,000** |

> **Note:** The development cost of **KSH 40,000** covers all design, coding, and system building. Deployment costs (domain, hosting, server setup) are billed separately as third-party expenses.

---

## 5. Recurring Annual Costs (Post-Delivery)

After the website is built and delivered, the following costs are incurred **yearly** to keep it running:

| Item | Description | Annual (KSH) |
|---|---|---|
| **Domain renewal** | Renewing `mukushokarate.co.ke` or `.com` domain | KSH 1,500–2,500 |
| **Web hosting (VPS)** | Cloud server to run the website 24/7 (DigitalOcean, Hetzner, or similar) | KSH 7,200–15,000 |
| **SSL certificate** | HTTPS security (free with Let's Encrypt, or paid premium) | KSH 0–5,000 |
| **Maintenance & updates** | Security patches, Laravel updates, PHP updates, bug fixes | KSH 10,000–20,000 |
| **Backup service** | Automated daily/weekly database and file backups | KSH 0–3,000 |
| **Email hosting** (optional) | Professional email e.g. info@mukushokarate.co.ke | KSH 1,500–6,000 |
| **TOTAL (Annual)** | | **KSH 20,200–51,500** |

> **Note:** The minimum annual cost to keep the website live is approximately **KSH 8,700/year** — just domain + basic hosting + free SSL. The higher range includes premium support.

---

## 6. Optional Add-Ons (Future Enhancements)

These can be added at any time after launch:

| Feature | Description | Estimated Cost (KSH) |
|---|---|---|
| **M-Pesa Integration** | Direct STK Push payments for registration & monthly fees | KSH 15,000–25,000 |
| **SMS Notifications** | Automated SMS for registration confirmation, payment reminders, event alerts | KSH 8,000–12,000 |
| **Email Newsletters** | Automated email campaigns to members | KSH 8,000–12,000 |
| **Student Progress Tracker** | Belt grading history, attendance, skill progression | KSH 15,000–20,000 |
| **Online Store** | Sell uniforms, belts, equipment, merchandise | KSH 20,000–35,000 |
| **Event Registration** | Online sign-up for competitions, gradings, seminars | KSH 10,000–15,000 |
| **Multi-language** | Swahili + English toggle | KSH 8,000–12,000 |
| **Custom Mobile App** | Native Android/iOS companion app | KSH 100,000–200,000 |

---

## 7. Payment Terms

| Milestone | Payment | Percentage |
|---|---|---|
| **Project acceptance** (signing this proposal) | KSH 20,000 | 50% |
| **Beta delivery** (website demo ready for review) | KSH 15,000 | 37.5% |
| **Final delivery & deployment** | KSH 5,000 | 12.5% |
| **TOTAL** | **KSH 40,000** | **100%** |

> Payment via M-Pesa, bank transfer, or PayPal.

---

## 8. Timeline

| Phase | Duration | Deliverable |
|---|---|---|
| Week 1–2 | Design & Architecture | Wireframes, database design, initial setup |
| Week 3–5 | Core Development | Homepage, registration, CMS, admin dashboard |
| Week 6–7 | Features & Polish | Gallery, events, media uploads, exports, RBAC |
| Week 8 | Testing & Deployment | Bug fixes, server setup, domain, SSL, launch |
| Week 9–10 | Training & Support | Admin training, 2-week post-launch support |

**Total: 8–10 weeks from project acceptance to launch.**

---

## 9. What You Get (Deliverables)

1. ✅ Fully functional, deployed website at your chosen domain
2. ✅ Complete source code — **you own it**
3. ✅ Admin panel access with super admin credentials
4. ✅ Database with all seeded content ready to edit
5. ✅ 1 hour of hands-on admin training
6. ✅ Technical documentation for the CMS
7. ✅ 30 days of post-launch bug-fix support (free)
8. ✅ Source code on a Git repository for version control

---

## 10. Terms & Conditions

1. **Ownership:** Upon full payment, all source code, design assets, and database structures become the sole property of Mukusho Karate Kenya.
2. **Confidentiality:** All club data, member information, and business details shared during development will be kept strictly confidential.
3. **Support:** 30 days of free bug-fix support after launch. Extended maintenance available at rates listed in Section 5.
4. **Revisions:** Up to 3 rounds of revisions are included in the quoted price. Additional revisions billed at KSH 1,500/hour.
5. **Third-party costs:** Domain registration, hosting, and SSL costs are billed separately and paid directly by Mukusho Karate Kenya.
6. **Scope changes:** Any features not listed in Section 2 will be quoted separately as add-ons.

---

## 11. About the Developer

**Daniel Vee** is a full-stack web developer with expertise in:

- **Laravel** (PHP) — backend development, REST APIs, authentication, RBAC
- **Tailwind CSS & Alpine.js** — modern, responsive frontend development
- **MySQL** — database design, migrations, optimization
- **Server Administration** — Linux, Nginx, deployment, SSL, backups
- **UI/UX Design** — mobile-first, conversion-optimized layouts

This project demonstrates a deep commitment to understanding your club's mission, branding, and operational needs — resulting in a website that is not just functional, but a true digital home for Mukusho Karate Kenya.

---

## 12. Next Steps

1. **Review** this proposal
2. **Discuss** any questions, modifications, or additional features
3. **Accept** the proposal and sign the agreement
4. **Make** the first payment (50%)
5. **Launch** begins immediately

---

**Contact:**  
Daniel Vee  
📧 Email: [your-email@example.com]  
📱 Phone: [your-phone-number]

---

> *"Empowering every child with the greatness within them through confidence, discipline, and teamwork."*  
> — Mukusho Karate Kenya

---

**© 2026 Daniel Vee. All rights reserved.**

**Royal Dream Car - Backend Architecture Overview**

- **Auth:** Admin-only authentication using `admin` guard (session) with `users` provider. Admin routes: `/admin/login`, `/admin/dashboard`.

- **Key Models:**
- `User`, `Brand`, `CarModel`, `Car`, `CarImage`, `CarFeature`, `Testimonial`, `Service`, `ServiceRequest`, `Inquiry`, `ContactMessage`, `Slider`, `Team`, `Partner`, `Setting`, `SeoMeta`

- **Migrations:** Added migrations for brands, car_models, cars, car_images, car_features, pivot table `car_feature_map`, testimonials, services, service_requests, inquiries, contact_messages, sliders, teams, partners, settings, seo_meta, and updated users for roles + soft deletes.

- **Factories & Seeders:** Factories and seeders added to generate realistic sample data. Default super admin seeded with email `admin@royaldreamcar.com` and password `Admin@123456` (hashed).

- **Views:** Minimal admin login and dashboard views at `resources/views/admin/`.

- **ER Diagram:** `docs/ER_diagram.md` (mermaid)

Next steps you may want me to do:

- Wire Blade + Tailwind layouts for public site pages
- Add controllers and resource routes for Cars, Services, Contacts
- Add file storage link and media handling for car images

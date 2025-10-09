# Frontend Overview

This document captures the current state of the static frontend located in the `frontend/` folder, including structure, dependencies, notable issues, and recommended next steps. We’ll use this as a working reference for improvements and integration work.

## Structure at a glance

-   HTML pages:
    -   Public: `index.html`, `products.html`, `team.html`, `about.html`, `contact.html`, `orders.html`, `order-successful.html`, `admin-dashboard.html`, `admin-team.html`, `product-admin.html`
    -   Admin: `admin/` (`add-product.html`, `admin-login.html`, `product-admin.html`)
-   Assets: `assets/`
    -   CSS: `assets/css/` → `style.css`, `contact.css`, `admin.css`, `animate.css`, `bootstrap/` (mixins/utilities partials), `bootstrap.min.css`
    -   JS: `assets/js/` → `main.js`, `jquery.min.js`, `jquery.validate.min.js`, `bootstrap.min.js`, `popper.js`, `contact.js`, `tilt.jquery.js`
    -   Images: `assets/images/` → logos, banners, products, team photos, infrastructure images, etc.
-   Vendor bundles: `vendor/`
    -   CSS: `vendor/css/` → Full Bootstrap distributions (`bootstrap.css`, `bootstrap.min.css`, maps)
    -   JS: `vendor/js/` → Bootstrap bundle (with Popper), Bootstrap (without Popper), jQuery 3.6.0, Popper, Waypoints, CounterUp

Notes:

-   Multiple pages reference CDN resources: Google Fonts, FontAwesome, Ionicons, Swiper.
-   The frontend is currently standalone static markup and not wired into Laravel Blade templates.

## Libraries and dependencies

-   Bootstrap CSS/JS (local vendor copies; both minified and non-minified included on several pages)
-   jQuery (local `vendor/js/jquery-3.6.0.min.js`; some pages also include multiple versions via CDN)
-   Popper (local), included separately and via Bootstrap bundle
-   Swiper (CDN on `products.html` and `team.html`, versions not consistently pinned)
-   jQuery Validate (local `assets/js/jquery.validate.min.js`)
-   Waypoints + CounterUp (local vendor)
-   tilt.js (local `assets/js/tilt.jquery.js`) used via `data-tilt` attributes
-   Icon sets via CDNs: FontAwesome, Ionicons
-   Google Fonts (Josefin Sans, Montserrat)

## Behavior scripts

-   `assets/js/main.js`:
    -   Mobile menu open/close by toggling overlay class
    -   Header style change on scroll (>150px)
-   `assets/js/contact.js`:
    -   Validates `#contactForm` with jQuery Validate
    -   Submits form via AJAX to `php/sendEmail.php` (not present in repo; likely needs Laravel integration)
-   Inline scripts:
    -   Home page parallax and banner sizing logic
    -   Products page quantity counter and Swiper init
    -   Team page Swiper init

## Issues and risks identified

1. Duplicate and conflicting asset includes

    - Many pages include both `bootstrap.css` and `bootstrap.min.css` (redundant) and both `bootstrap.min.js` and `bootstrap.bundle.js` (bundle already includes Popper). Mixing minified and non-minified resources wastes bandwidth and risks conflicts.
    - jQuery is included multiple times and from different sources (CDN 1.11/3.5.1 and local 3.6.0) on some pages (e.g., `products.html`, `contact.html`). This can cause unpredictable behavior.

2. Broken/missing files referenced

    - `./vendor/js/aos.js` is referenced in `products.html` and `team.html` but is not present in `frontend/vendor/js/`. There’s no `data-aos` usage visible, so it’s probably vestigial.
    - `contact.html` references `js/jquery.min.js`, `js/popper.js`, `js/jquery.validate.min.js`, `js/contact.js` at the bottom, but the actual paths are under `assets/js/`. These script tags will 404.

3. Inconsistent Swiper usage

    - `products.html` pins Swiper 7 via `https://unpkg.com/swiper@7/...` while `team.html` pulls `https://unpkg.com/swiper/swiper-bundle.min.js` without a version. This can lead to version drift.

4. Contact form backend endpoint

    - `assets/js/contact.js` posts to `php/sendEmail.php`, which doesn’t exist in the frontend. In this Laravel project, the contact form should likely submit to a Laravel route/controller (e.g., `/contact` or `/api/contact`) with CSRF handling.

5. Performance and best practices

    - Scripts aren’t using `defer` and are sometimes placed before other dependent scripts, increasing render-blocking and potential race conditions.
    - Multiple large images are used as-is; no responsive `srcset`/`sizes` or compression strategy noted.
    - Fonts (Google Fonts) are preconnected, which is good, but no `display=swap` for all fonts nor preload of critical CSS.

6. Code/UX quality items

    - Social links are placeholders; various accessibility attributes (aria labels) could be improved.
    - Parallax and animations don’t include reduced-motion considerations.
    - Some alt attributes are empty or non-descriptive.

7. Duplication between `vendor/` and `assets/`

    - There’s a partial Bootstrap tree under `assets/css/bootstrap/` while full Bootstrap distributions exist under `vendor/css/`. Choose one approach to avoid confusion.

8. Potentially sensitive API key in `contact.html`
    - Google Maps embed uses an exposed API key. Ensure this key is restricted (HTTP referrers) or switch to a keyless embed where possible.

## Page-by-page quick notes

-   `index.html`
    -   Loads both `bootstrap.min.js`, `bootstrap.bundle.js`, and `popper.min.js` (redundant). Loads jQuery once via local vendor. Uses `assets/js/tilt.jquery.js` and inline parallax scripts.
-   `products.html`
    -   Duplicates jQuery includes (CDN and local). References `./vendor/js/aos.js` (missing). Includes both `bootstrap.min.js` and `bootstrap.bundle.js` and Popper. Swiper v7 is used and initialized.
-   `team.html`
    -   Similar duplication; references `./vendor/js/aos.js` (missing). Swiper script unpinned version.
-   `contact.html`
    -   Duplicated and incorrect script paths at the bottom (`js/...` instead of `assets/js/...`). Uses jQuery Validate; backend endpoint needs Laravel integration. Google Maps embed includes API key.

## Recommendations (actionable)

Short term fixes (safe, low-risk):

-   Standardize and minimize includes on each page:
    -   Use ONLY one jQuery: `vendor/js/jquery-3.6.0.min.js` (or a single pinned CDN). Load it first.
    -   Use ONLY `vendor/js/bootstrap.bundle.min.js` (prefer minified bundle; remove separate Popper and `bootstrap.min.js`). If `bundle.min.js` isn’t present, use `bootstrap.bundle.js` but keep it singular.
    -   Remove `./vendor/js/aos.js` includes or add AOS properly if needed.
    -   Fix `contact.html` script paths to `assets/js/jquery.validate.min.js` and `assets/js/contact.js`, and remove duplicate/legacy script tags.
    -   Add `defer` to non-critical scripts and move inline scripts after dependencies or wrap in `DOMContentLoaded`.
-   Unify Swiper version across pages. Prefer pinned version (e.g., v7 if compatible) on both CSS and JS.
-   Confirm `tilt.jquery.js` is required on pages that include it; otherwise drop to reduce payload.

Integration with Laravel (next phase):

-   Convert static pages into Blade templates under `resources/views` with a shared layout (header/footer) and partials.
-   Use Laravel’s asset pipeline (Mix/Vite) to bundle and version CSS/JS, eliminating manual vendor folders.
-   Replace contact form AJAX endpoint with a Laravel route (e.g., `POST /contact`) and add CSRF token handling. Implement validation and email sending server-side.

Performance and UX:

-   Optimize images and use responsive `srcset/sizes`. Consider WebP/AVIF where supported.
-   Add `loading="lazy"` to non-critical images.
-   Preload critical CSS or inline minimal critical styles. Ensure fonts use `display=swap`.
-   Respect reduced-motion via `@media (prefers-reduced-motion: reduce)` for parallax/animations.
-   Improve a11y: meaningful `alt` text, ARIA labels on controls (menu toggles, close buttons), and focus states.

Security/Config:

-   Restrict the Google Maps API key to trusted referrers or replace with keyless embed if feasible.
-   Audit admin pages; if they’re meant to be protected, do not serve them as static pages. Integrate with Laravel auth and authorization.

## Proposed cleanup checklist

-   [ ] Remove duplicate Bootstrap CSS/JS references and stick to minified bundle
-   [ ] Remove extra jQuery includes and standardize on a single source and version
-   [ ] Delete or add missing `vendor/js/aos.js` and remove unused AOS references
-   [ ] Fix `contact.html` script paths and wire the form to a Laravel endpoint
-   [ ] Pin Swiper to a single version across pages
-   [ ] Add `defer` to script tags and ensure dependency order
-   [ ] Optimize images and add `loading="lazy"`
-   [ ] Move to Blade templates and build with Mix/Vite (Laravel integration phase)

## Quick reference: current key files

-   Main CSS: `frontend/assets/css/style.css`
-   Contact form CSS: `frontend/assets/css/contact.css`
-   Main JS: `frontend/assets/js/main.js`
-   Contact form JS: `frontend/assets/js/contact.js`
-   Vendor Bootstrap: `frontend/vendor/css/*.css`, `frontend/vendor/js/*.js`

---

This document will be updated as we make changes. For any non-trivial changes, we’ll prefer consolidating improvements into this doc rather than creating many separate docs.

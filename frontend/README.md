# Frontend Router (Standalone)

A tiny Node HTTP server to provide clean routes for the static pages in `frontend/` without touching the Laravel project.

## What it does

-   Serves clean URLs (e.g., `/products`) mapped to their HTML files (e.g., `products.html`).
-   Keeps legacy `*.html` links working (`/products.html`).
-   Serves static assets under `/assets` and `/vendor` as-is.

## Routes

Clean routes supported (legacy `.html` also supported):

-   `/` → `index.html`
-   `/products` → `products.html`
-   `/team` → `team.html`
-   `/about` → `about.html`
-   `/contact` → `contact.html`
-   `/orders` → `orders.html`
-   `/order-successful` → `order-successful.html`
-   `/admin-dashboard` → `admin-dashboard.html`
-   `/admin-team` → `admin-team.html`
-   `/product-admin` → `product-admin.html`
-   `/admin/add-product` → `admin/add-product.html`
-   `/admin/admin-login` → `admin/admin-login.html`
-   `/admin/product-admin` → `admin/product-admin.html`

## Run locally

This server has no external dependencies.

-   Prerequisite: Node.js 16+ installed
-   From repo root (or `frontend/`), run:

```sh
# from repo root
cd frontend
node server.js
# or with a custom port
PORT=5173 node server.js
```

Then open http://localhost:3000 (or your chosen port).

## Notes

-   This does not modify or proxy the Laravel app; it only serves the static `frontend/` folder.
-   If you later move these pages into Blade templates and use Vite, you can remove this server.

## Team images

Place the provided photos under `frontend/assets/images/` with the following filenames to match `team.html`:

-   `team-dhiraj.jpg` → Dhiraj Kalwar (COO)
-   `team-nitesh.jpg` → Nitesh Gupta (CTO)
-   `team-aashish.jpg` → Aashish Kushwaha (CMO)
-   `team-bhumi.jpg` → Bhumi Kalwar (CFO)
-   `team-arun.jpg` → Arun Kumar Gupta (Managing Director)
-   `team-rahul.jpg` → Rahul Kalwar (Chairman and Founder)

You can use different extensions (e.g., `.png`) if you also update the `src` paths in `frontend/team.html` accordingly.

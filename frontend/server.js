/*
  Lightweight static router for the `frontend/` directory without touching the Laravel app.
  - Serves clean routes like /products as /products.html
  - Also serves legacy *.html URLs and all static assets under /assets and /vendor
*/

const http = require("http");
const fs = require("fs");
const path = require("path");
const url = require("url");

const root = __dirname; // frontend folder
const port = process.env.PORT || 3000;

// Map of clean routes to HTML files
const pageRoutes = {
    "/": "/index.html",
    "/index": "/index.html",
    "/index.html": "/index.html",
    "/products": "/products.html",
    "/products.html": "/products.html",
    "/team": "/team.html",
    "/team.html": "/team.html",
    "/about": "/about.html",
    "/about.html": "/about.html",
    "/contact": "/contact.html",
    "/contact.html": "/contact.html",
    "/orders": "/orders.html",
    "/orders.html": "/orders.html",
    "/order-successful": "/order-successful.html",
    "/order-successful.html": "/order-successful.html",
    "/admin-dashboard": "/admin-dashboard.html",
    "/admin-dashboard.html": "/admin-dashboard.html",
    "/admin-team": "/admin-team.html",
    "/admin-team.html": "/admin-team.html",
    "/product-admin": "/product-admin.html",
    "/product-admin.html": "/product-admin.html",
    // Admin subfolder pages
    "/admin/add-product": "/admin/add-product.html",
    "/admin/admin-login": "/admin/admin-login.html",
    "/admin/product-admin": "/admin/product-admin.html",
};

// Basic content-type map
const mimeTypes = {
    ".html": "text/html; charset=UTF-8",
    ".css": "text/css; charset=UTF-8",
    ".js": "application/javascript; charset=UTF-8",
    ".map": "application/json; charset=UTF-8",
    ".json": "application/json; charset=UTF-8",
    ".png": "image/png",
    ".jpg": "image/jpeg",
    ".jpeg": "image/jpeg",
    ".gif": "image/gif",
    ".svg": "image/svg+xml",
    ".ico": "image/x-icon",
    ".webp": "image/webp",
    ".woff": "font/woff",
    ".woff2": "font/woff2",
    ".ttf": "font/ttf",
    ".eot": "application/vnd.ms-fontobject",
};

function send404(res) {
    res.writeHead(404, { "Content-Type": "text/plain; charset=UTF-8" });
    res.end("404 Not Found");
}

function send500(res, err) {
    res.writeHead(500, { "Content-Type": "text/plain; charset=UTF-8" });
    res.end(
        "500 Internal Server Error\n" + (err && err.message ? err.message : "")
    );
}

function sendFile(res, filePath) {
    const ext = path.extname(filePath).toLowerCase();
    const contentType = mimeTypes[ext] || "application/octet-stream";

    fs.readFile(filePath, (err, data) => {
        if (err) {
            if (err.code === "ENOENT") return send404(res);
            return send500(res, err);
        }
        res.writeHead(200, { "Content-Type": contentType });
        res.end(data);
    });
}

function resolveSafe(p) {
    const safePath = path.normalize(p).replace(/^\/+/, "");
    const resolved = path.join(root, safePath);
    if (!resolved.startsWith(root)) {
        // Prevent path traversal
        return null;
    }
    return resolved;
}

const server = http.createServer((req, res) => {
    const parsed = url.parse(req.url);
    let pathname = parsed.pathname || "/";

    // If exact page route mapping exists, serve it
    if (pageRoutes[pathname]) {
        const target = resolveSafe(pageRoutes[pathname]);
        if (!target) return send404(res);
        return sendFile(res, target);
    }

    // Serve static assets from /assets and /vendor by path
    if (pathname.startsWith("/assets/") || pathname.startsWith("/vendor/")) {
        const target = resolveSafe(pathname);
        if (!target) return send404(res);
        return fs.stat(target, (err, stat) => {
            if (err || !stat.isFile()) return send404(res);
            sendFile(res, target);
        });
    }

    // Direct .html requests (legacy links) -> serve if exists
    if (pathname.endsWith(".html")) {
        const target = resolveSafe(pathname);
        if (!target) return send404(res);
        return fs.stat(target, (err, stat) => {
            if (err || !stat.isFile()) return send404(res);
            sendFile(res, target);
        });
    }

    // Try to resolve extensionless path by appending .html if a file exists
    const tryHtml = resolveSafe(pathname + ".html");
    if (tryHtml) {
        return fs.stat(tryHtml, (err, stat) => {
            if (!err && stat.isFile()) return sendFile(res, tryHtml);
            // Otherwise 404
            return send404(res);
        });
    }

    return send404(res);
});

server.listen(port, () => {
    console.log(`Frontend server running at http://localhost:${port}`);
    console.log("Serving from:", root);
});

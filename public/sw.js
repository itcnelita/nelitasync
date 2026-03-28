const VERSION = "v2026-03-14-01";
const CACHE_NAME = `nelita-sync-${VERSION}`;

const urlsToCache = [
    "/",
    "/offline.html",
    "/assets/img/icon-192.png",
    "/assets/img/icon-512.png",
];

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => cache.addAll(urlsToCache)),
    );
});

self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys
                    .filter((key) => key !== CACHE_NAME)
                    .map((key) => caches.delete(key)),
            );
        }),
    );
});

self.addEventListener("fetch", (event) => {
    event.respondWith(
        fetch(event.request).catch(() => caches.match("/offline.html")),
    );
});

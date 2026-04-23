/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            // Kita tambahkan kustomisasi agar shadow-orange muncul dengan baik
            boxShadow: {
                "lg-orange":
                    "0 10px 15px -3px rgba(249, 115, 22, 0.2), 0 4px 6px -4px rgba(249, 115, 22, 0.1)",
                "lg-blue":
                    "0 10px 15px -3px rgba(37, 99, 235, 0.2), 0 4px 6px -4px rgba(37, 99, 235, 0.1)",
            },
        },
    },
    plugins: [],
};

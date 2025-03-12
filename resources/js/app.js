import './bootstrap';
document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("darkModeToggle");
    const darkModeIcon = document.getElementById("darkModeIcon");

    // Check if dark mode is already enabled
    if (localStorage.getItem("darkMode") === "enabled") {
        document.documentElement.classList.add("dark");
        darkModeIcon.textContent = "☀️"; // Show Sun when dark mode is ON
    } else {
        darkModeIcon.textContent = "🌙"; // Show Moon when light mode is ON
    }

    // Toggle dark mode
    darkModeToggle.addEventListener("click", function () {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("darkMode", "disabled");
            darkModeIcon.textContent = "🌙"; // Switch to Moon
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("darkMode", "enabled");
            darkModeIcon.textContent = "☀️"; // Switch to Sun
        }
    });
});

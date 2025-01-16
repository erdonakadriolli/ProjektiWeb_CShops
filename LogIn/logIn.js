// login.js

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login-form");

    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault(); // Prevent the default form submission

        const email = document.querySelector("#email").value.trim();
        const password = document.querySelector("#password").value.trim();

        // Client-side validation
        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (!validatePassword(password)) {
            alert("Password must be at least 6 characters long.");
            return;
        }

        try {
            // Sending data to the server
            const response = await fetch("login.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email, password }),
            });

            const result = await response.json();

            if (result.success) {
                alert("Login successful!");
                // Redirect to another page or perform an action
                window.location.href = "mainpage.php";
            } else {
                alert(result.message || "Login failed. Please try again.");
            }
        } catch (error) {
            console.error("Error during login:", error);
            alert("An unexpected error occurred. Please try again later.");
        }
    });

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePassword(password) {
        return password.length >= 6;
    }
});

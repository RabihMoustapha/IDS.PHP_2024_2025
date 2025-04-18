const email = document.getElementById("email");
const password = document.getElementById("password");
const username = document.getElementById("username");

async function Create() {
    const userData = {
        username: username.value,
        email: email.value,
        password: password.value
    };

    try {
        const response = await fetch(`http://localhost/IDS/Backend/Profile/Create.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(userData)
        });

        if (response.ok) {
            const result = await response.json();
            alert("Signup successful!");
            window.location.href = "../Home.php";
        } else {
            alert("Signup failed. Please try again.");
        }
    } catch (error) {
        console.error("Error:", error);
    }
}

function isLoggedIn() {
    return localStorage.getItem("ProfileID") !== null;
}

if(!isLoggedIn()) {
    alert("You are not logged in. Redirecting to login page.");
    window.location.href = "../Login.php";
}
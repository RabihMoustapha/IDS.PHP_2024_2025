async function View() {
    const item = {
        id: localStorage.getItem("ProfileID")
    };

    try {
        const response = await fetch(`http://localhost/IDS/Backend/Profile/GetByID.php`, {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(item)
        });

        if (response.ok) {
            const profile = await response.json();
            document.getElementById("profile-name").textContent = profile.name;
            document.getElementById("profile-password").textContent = profile.password;
        } else {
            throw new Error("Failed to fetch profile details.");
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}

document.getElementById("edit-profile").addEventListener("click", function () {
    const location = prompt("Enter your update location: Name or Password");
    if (location.toLowerCase() === "name") {
        window.location.href = "Update/Name.php";
    } else if (location.toLowerCase() === "password") {
        window.location.href = "Update/Password.php";
    } else {
        alert("Invalid location");
    }
});

function isLoggedIn() {
    return localStorage.getItem("ProfileID") !== null;
}

if(!isLoggedIn()) {
    alert("You are not logged in. Redirecting to login page.");
    window.location.href = "../Login.php";
}

function Logout() {
    localStorage.removeItem("ProfileID");
    window.location.href = "../Login.php";
}
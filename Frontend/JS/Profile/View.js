document.addEventListener("DOMContentLoaded", async function () {
    const ProfileID = localStorage.getItem("ProfileID");
    if (!ProfileID) {
        alert("No profile ID found. Please log in.");
        window.location.href = "../Login.php";
        return;
    }

    const profileUrl = `https://localhost:7136/api/Profiles/GetProfileByID/${ProfileID}`;

    try {
        const response = await fetch(profileUrl);
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

    document.getElementById("edit-profile").addEventListener("click", function () {
        const location = prompt("Enter your update location: Name or Password");
        if (location === "Name") {
            window.location.href="Update/Name.php";
        } else if (location === "Password") {
            window.location.href="Update/Password.php";
        } else {
            alert("Invalid location");
        }
    });
});

function logout() {
    localStorage.removeItem("ProfileID");
    window.location.href = "../Login.php";
}
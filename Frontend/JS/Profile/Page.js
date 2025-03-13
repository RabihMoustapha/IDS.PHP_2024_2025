document.addEventListener("DOMContentLoaded", async function () {
    const profileID = localStorage.getItem("profileID");
    if (!profileID) {
        alert("No profile ID found. Please log in.");
        window.location.href = "../Login.html";
        return;
    }

    const profileUrl = `http://localhost/IDS/Backend/Profile/GetByID.php?ID=${profileID}`;

    try {
        const response = await fetch(profileUrl);
        if (response.ok) {
            const profile = await response.json();
            document.getElementById("profileName").textContent = profile.name;
            document.getElementById("profilePassword").textContent = profile.password;
        } else {
            throw new Error("Failed to fetch profile details.");
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
});

function Logout() {
    localStorage.removeItem("profileID");
    window.location.href = "../Login.html";
}
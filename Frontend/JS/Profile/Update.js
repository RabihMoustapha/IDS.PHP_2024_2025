const ProfileID = localStorage.getItem("ProfileID");
const profileURL = `http://localhost/Backend/Profile/GetByID.php`;

if (!ProfileID) {
    alert("No profile ID found. Please log in.");
    window.location.href = "../Login.php";
}

async function UpdateName() {
    const Name = document.getElementById("name").value;
    const request = {
        name: Name
    };

    try {
        const nameResponse = await fetch(`https://localhost:7136/api/Profiles/UpdateName?ID=${ProfileID}`, {
            method: "PUT",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(request)
        });

        if (!nameResponse.ok) {
            throw new Error("Failed to update name.");
        }

        alert("Profile name updated successfully!");
        window.location.href = "../View.php";
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}

async function UpdatePassword() {
    const Password = document.getElementById("password").value;
    try {
        const nameResponse = await fetch(`https://localhost:7136/api/Profiles/UpdatePassword?ID=${ProfileID}`, {
            method: "PUT",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ password: Password })
        });

        if (!nameResponse.ok) {
            throw new Error("Failed to update password.");
        }

        alert("Profile password updated successfully!");
        window.location.href = "../View.php";
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}
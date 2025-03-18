const profileURL = `http://localhost/Backend/Profile/GetByID.php`;

async function UpdateName() {
    const Name = document.getElementById("name").value;
    const request = {
        id: localStorage.getItem("ProfileID"),
        name: Name
    };

    try {
        const nameResponse = await fetch(`http://localhost:7136/api/Profiles/UpdateName.php`, {
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
    const request = {
        id: localStorage.getItem("ProfileID"),
        password: Password
    };
    try {
        const nameResponse = await fetch(`http://localhost/Backend/Profile/UpdatePassword.php`, {
            method: "PUT",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(request)
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
async function UpdateName() {
    const Name = document.getElementById("name").value;
    const request = {
        id: localStorage.getItem("ProfileID"),
        name: Name
    };

    try {
        const nameResponse = await fetch(`http://localhost/IDS/Backend/Profile/Update/Name.php`, {
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
        const nameResponse = await fetch(`http://localhost/IDS/Backend/Profile/Update/Password.php`, {
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
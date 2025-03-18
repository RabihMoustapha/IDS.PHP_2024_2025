function isLoggedIn() {
    if (!localStorage.getItem("profileID")) {
        window.location.href = "../Login.php";
    }
}

async function ShowProfileDetails() {
    const profileUrl = `http://localhost/IDS/Backend/Profile/GetByID.php`;

    const requestData = {
        id: profileID,
    };

    try {
        const response = await fetch(profileUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestData),
        });
        if (!response.ok) throw new Error("Failed to fetch profile details");
        const profile = await response.json();
        document.getElementById("profileName").textContent = profile.name;

    } catch (error) {
        console.error("Error:", error);
        alert("Error fetching profile details. Please try again.");
    }
}


function Logout() {
    localStorage.removeItem("profileID");
    window.location.href = "../Login.php";
}
function isLoggedIn() {
    if (!localStorage.getItem("profileID")) {
        window.location.href = "../Login.php";
    }
}

async function Create() {
    const apiUrl = `http://localhost/IDS/Backend/Post/Create.php`;
    const title = document.getElementById("postTitle");
    const description = document.getElementById("postDescription");

    const postData = {
        profileID: localStorage.getItem("profileID"),
        profileName: localStorage.getItem("profileName"),
        title: title.value,
        description: description.value,
    };

    try {
        const response = await fetch(apiUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(postData),
        });

        const data = await response.json();

        if (data.success) {
            alert("Post added successfully!");
        } else {
            alert("Failed to add post: " + (data.message || "Unknown error"));
        }
    } catch (error) {
        console.error("Error:", error);
        alert("An error occurred while adding the post.");
    }
}

async function ShowProfileDetails() {
    const profileUrl = `http://localhost/IDS/Backend/Profile/GetByID.php`;

    const requestData = {
        id: localStorage.getItem("profileID"),
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
        document.getElementById("profileName").innerHTML = profile.name;

    } catch (error) {
        console.error("Error:", error);
        alert("Error fetching profile details. Please try again.");
    }
}


function Logout() {
    localStorage.removeItem("profileID");
    window.location.href = "../Login.php";
}
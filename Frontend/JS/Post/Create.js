const title = document.getElementById("title");
const description = document.getElementById("description");
const post = "http://localhost/IDS/Backend/Post/Create.php";

function isLoggedIn() {
    if (!localStorage.getItem("profileID")) {
        window.location.href = "../Login.php";
    }
}

async function Create() {
    const requestData = {
        profileID: localStorage.getItem("profileID"),
        profileName: localStorage.getItem("profileName"),
        title: title.value,
        description: description.value,
    };

    try {
        const response = await fetch(post, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            }, body: JSON.stringify(requestData),
        });

        if (!response.ok) throw new Error("Login Failed");
        const data = await response.json();
        console.log(data);

        if (data.success && Array.isArray(data.item)) {
            alert("Data created");
            window.location.href = "../Home.php";
        } else {
            alert("Data creation failed: " + (data.message || "Invalid data structure"));
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during fetching.");
    }
}

function Logout() {
    localStorage.clear();
    window.location.href = "../Login.php";
}
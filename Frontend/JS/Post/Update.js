async function updatePost(endpoint, data) {
    try {
        const response = await fetch(`http://localhost:7136/api/Posts/${endpoint}?ID=${GetID()}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            window.location.href = "../View.php";
        } else {
            throw new Error(`Failed to update ${endpoint}.`);
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}

async function UpdateTitle() {
    const title = document.getElementById("title").value;
    await updatePost("UpdateTitle", { Title: title });
}

async function UpdateDescription() {
    const description = document.getElementById("description").value;
    await updatePost("UpdateDescription", { Description: description });
}

function isLoggedIn() {
    return localStorage.getItem("ProfileID") !== null;
}

if(!isLoggedIn()) {
    alert("You are not logged in. Redirecting to login page.");
    window.location.href = "../Login.php";
}

function GetID() {
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const id = params.get("id");
    return id;
}
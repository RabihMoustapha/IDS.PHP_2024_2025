const container = document.getElementById("posts-list");
const search = document.getElementById("search-bar");

function isLoggedIn() {
    return localStorage.getItem("ProfileID");
}

if (!isLoggedIn()) {
    window.location.href = "Profile/Login.html";
}

async function Search() {
    const item = {
        title: search.value
    };

    try {
        const response = await fetch("https://localhost:7136/api/Posts/Search", {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(item)
        });

        if (!response.ok) throw new Error("Login Failed");
        const data = await response.json();
        console.log(data);

        if (Array.isArray(data)) {
            container.innerHTML = "";
            data.forEach(element => {
                container.innerHTML += `
                    <div class="post-card">
                        <p class="profile-name">${element.profileName}</p>
                        <h2 class="post-title">${element.title}</h2>
                        <p class="post-description">${element.description}</p>
                    </div>
                `;
            });
        } else {
            alert("Data failed: Invalid data structure");
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during fetching.");
    }
}

async function Display() {
    try {
        const response = await fetch("https://localhost:7136/api/Posts", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) throw new Error("Login Failed");
        const data = await response.json();
        console.log(data);

        if (Array.isArray(data)) {
            container.innerHTML = "";
            data.forEach(element => {
                container.innerHTML += `
                    <div class="post-card">
                        <p class="profile-name">${element.profileName}</p>
                        <h2 class="post-title">${element.title}</h2>
                        <p class="post-description">${element.description}</p>
                    </div>
                `;
            });
        } else {
            alert("Data failed: Invalid data structure");
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during fetching.");
    }
}

function Logout() {
    localStorage.removeItem("ProfileID");
    localStorage.removeItem("ProfileName");
    window.location.href = "Profile/Login.html";
}
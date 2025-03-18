const container = document.getElementById("posts-list");

async function Search() {
    const search = document.getElementById("search-bar");
    const item = {
        title: search.value
    };

    try {
        const response = await fetch(`http://localhost/Backend/Post/Search.php`, {
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
        const response = await fetch(`http://localhost/Backend/Post/Get.php`, {
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
    localStorage.clear();
    window.location.href = "Profile/Login.php";
}
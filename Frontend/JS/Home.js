const container = document.getElementById("posts-list");

async function Search() {
    const search = document.getElementById("search-bar");
    const item = { title: search.value };

    try {
        const response = await fetch("http://localhost/IDS/Backend/Post/Search.php", {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(item)
        });

        if (!response.ok) throw new Error("Failed to fetch search results");

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
            alert("Error: Invalid response format.");
        }
    } catch (err) {
        console.error("Search Error:", err);
        alert("An error occurred while searching for posts.");
    }
}

async function Display() {
    try {
        const response = await fetch("http://localhost/IDS/Backend/Post/Get.php", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) throw new Error("Failed to fetch posts");

        const data = await response.json();
        console.log(data);

        if (data.success) {
            container.innerHTML = "";
            data.item.forEach(element => {
                container.innerHTML += `
                    <div class="post-card">
                        <p class="profile-name">${element.profileName}</p>
                        <h2 class="post-title">${element.title}</h2>
                        <p class="post-description">${element.description}</p>
                    </div>
                `;
            });
        } else {
            alert("Error: Invalid response format.");
        }
    } catch (err) {
        console.error("Display Error:", err);
        alert("An error occurred while fetching posts.");
    }
}

function Logout() {
    localStorage.clear();
    window.location.href = "Profile/Login.php";
}
const postsList = document.getElementById("posts-list");

async function View() {
    try {
        const response = await fetch(`http://localhost/IDS/Backend/Post/GetByID.php`);
        if (response.ok) {
            const posts = await response.json();
            posts.forEach(post => {
                const postItem = document.createElement("div");
                postItem.className = "post-item";
                postItem.innerHTML = `
                    <h3>${post.title}</h3>
                    <p>${post.description}</p>
                    <img src="uploads/${post.image}" alt="Post Image" style="max-width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
                    <a href="Update/Title.php?id=${post.id}"><img class="icons" src="title.png" alt="Edit Title"></a>
                    <a href="Update/Description.php?id=${post.id}"><img class="icons" src="description.png" alt="Edit Description"></a>
                    <a href="Delete.php?id=${post.id}"><img class="icons" src="delete.png" alt="Delete"></a>
                `;

                postsList.appendChild(postItem);
            });
        } else {
            throw new Error("Failed to fetch posts.");
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}

function Logout() {
    localStorage.removeItem("ProfileID");
    window.location.href = "../Profile/Login.php";
}
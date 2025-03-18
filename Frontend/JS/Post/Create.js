const title = document.getElementById("title");
const description = document.getElementById("description");

async function Create() {
    const post = {
        ProfileID: localStorage.getItem("ProfileID"),
        title: title.value,
        description: description.value,
        profileName: localStorage.getItem("ProfileName")
    };

    try {
        const response = await fetch("http://localhost:7136/api/Posts/Create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(post)
        });

        if (response.ok) {
            alert("Post created successfully!");
            window.location.href = "View.php";
        } else {
            throw new Error("Failed to create post.");
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}
async function Create() {
    const title = document.getElementById("title").value;
    const description = document.getElementById("description").value;
    const imageInput = document.getElementById("image");

    const formData = new FormData();
    formData.append("ProfileID", localStorage.getItem("ProfileID"));
    formData.append("title", title);
    formData.append("description", description);
    
    if (imageInput.files.length > 0) {
        formData.append("image", imageInput.files[0]);
    }
    
    formData.append("profileName", localStorage.getItem("ProfileName"));

    try {
        const response = await fetch(`http://localhost/IDS/Backend/Post/Create.php`, {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || "Failed to create post.");
        }

        alert("Post created successfully!");
        window.location.href = "View.php";

    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}
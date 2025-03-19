async function Create() {
    const title = document.getElementById("title").value;
    const description = document.getElementById("description").value;
    const imageInput = document.getElementById("image");

    const formData = new FormData();
    formData.append("ProfileID", localStorage.getItem("ProfileID"));
    formData.append("title", title);
    formData.append("description", description);
    formData.append("profileName", localStorage.getItem("ProfileName"));
    
    /* if (imageInput.files.length > 0) {
         formData.append("image", imageInput.files[0]);
     }*/

    try {
        const response = await fetch(`http://localhost/Backend/Post/Create.php`, {
            method: "POST",
            body: formData,
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
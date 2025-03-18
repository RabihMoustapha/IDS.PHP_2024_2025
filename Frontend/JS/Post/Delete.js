async function DeletePost() {
    const postId = GetID();

    try {
        const response = await fetch(`http://localhost:7136/api/Posts/Delete?ID=${postId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            }
        });

        if (response.ok) {
            alert("Post deleted successfully!");
            window.location.href = "View.php";
        } else {
            throw new Error("Failed to delete post.");
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}

function Cancel() {
    window.location.href = "View.php";
}

function GetID() {
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const id = params.get("id");
    return id;
}
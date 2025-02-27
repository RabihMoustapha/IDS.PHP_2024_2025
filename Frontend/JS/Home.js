const container = document.getElementById("container");
const post = "http://localhost/IDS/Backend/Post.php";

async function getData() {
    try {
        const response = await fetch(post, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) throw new Error("Login Failed");
        const data = await response.json();
        console.log(data);

        if (data.success && Array.isArray(data.item)) {
            container.innerHTML = "";

            data.item.forEach(element => {
                container.innerHTML += `
                    <div>
                        <p>${element.email}</p>
                        <img src="IMG/${element.img}" style="width: 40px; height: 40px">
                        <p>${element.title}</p>
                        <p>${element.description}</p>
                        <img src="IMG/delete.png" style="width: 40px; height: 40px; cursor: pointer" onclick="Delete(${element.id})">
                    </div>
                `;
            });
        } else {
            alert("Data failed: " + (data.message || "Invalid data structure"));
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during fetching.");
    }
}

async function Delete(id) {
    const requestData = {
        id: id,
    };
    try {
        const response = await fetch(post, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            }, body: JSON.stringify(requestData),
        });
        if (!response.ok) throw new Error("Login Failed");
        const data = await response.json();
        if (data.success) {
            alert("Deleted");
        } else {
            alert("Deleting error");
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during fetching.");
    }
}

function Logout() {
    localStorage.removeItem("userToken");
    window.location.href = "Login.php";
}
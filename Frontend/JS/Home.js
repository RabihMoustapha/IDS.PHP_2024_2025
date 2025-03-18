const container = document.getElementById("container");

function isLoggedIn() {
    if (!localStorage.getItem("profileID")) {
        window.location.href = "Login.php";
    }
}

async function Get() {
    try {
        const Get = "http://localhost/IDS/Backend/Post/Get.php";
        const response = await fetch(Get, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) throw new Error("Fetching data failed");
        const data = await response.json();
        console.log(data);

        if (data.success && Array.isArray(data.item)) {
            container.innerHTML += "";

            data.item.forEach(element => {
                container.innerHTML += `
                    <div>
                        <p>${element.profileName}</p>
                        <p>${element.title}</p>
                        <p>${element.description}</p>
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

async function Search() {
    const apiUrl = "http://localhost/IDS/Backend/Post/Search.php";
    const search = document.getElementById("searchQuery").value;
    const requestData = {
        search: search,
    };
    try {
        const response = await fetch(apiUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestData),
        });
        if (!response.ok) throw new Error("Searching failed");
        const data = await response.json();
        console.log(data);
        if (data.success && Array.isArray(data.item)) {
            container.innerHTML = "";
            data.item.forEach(element => {
                container.innerHTML += `
                    <div>
                        <p>${element.profileName}</p>
                        <p>${element.title}</p>
                        <p>${element.description}</p>
                    </div>
                `;
            });
        } else {
            alert("Data failed: " + (data.message || "Invalid data structure"));
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during searching.");
    }
}

async function Delete(id) {
    const requestData = {
        id: id,
    };
    try {
        const Delete = "http://localhost/IDS/Backend/Post/Delete.php";
        const response = await fetch(Delete, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            }, body: JSON.stringify(requestData),
        });
        if (!response.ok) throw new Error("Deleting failed");
        const data = await response.json();
        if (data.success) {
            alert("Deleted");
            getData();
        } else {
            alert("Deleting error");
        }
    } catch (err) {
        console.error("Data error:", err);
        alert("An error occurred during deletion.");
    }
}

function Logout() {
    localStorage.clear();
    window.location.href = "Login.php";
}
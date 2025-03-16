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

async function fetchSearchResults() {
    const apiUrl = "http://localhost/IDS/Backend/Post/Search.php";

    try {
        const response = await fetch(apiUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ "search": document.getElementById("searchQuery").value }),
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();
        console.log("Fetched Data:", data);

        if (data.success && Array.isArray(data.item)) {
            renderSearchResults(data.item);
        } else {
            throw new Error(data.message || "Invalid response structure");
        }
    } catch (error) {
        console.error("Error fetching search results:", error);
        alert("An error occurred while fetching data. Please try again.");
    }
}

function renderSearchResults(items) {
    const container = document.getElementById("container"); // Ensure this exists
    if (!container) {
        console.error("Container element not found.");
        return;
    }

    container.innerHTML = ""; // Clear existing content

    items.forEach(({ profileName, title, description }) => {
        const itemDiv = document.createElement("div");

        const namePara = document.createElement("p");
        namePara.textContent = profileName;

        const titlePara = document.createElement("p");
        titlePara.textContent = title;

        const descPara = document.createElement("p");
        descPara.textContent = description;

        itemDiv.appendChild(namePara);
        itemDiv.appendChild(titlePara);
        itemDiv.appendChild(descPara);

        container.appendChild(itemDiv);
    });
}

fetchSearchResults();

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
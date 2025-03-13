const email = document.getElementById("email");
const password = document.getElementById("password");
const profile = "http://localhost/IDS/Backend/Profile/Login.php";

async function Login() {
    const requestData = {
        email: email.value,
        password: password.value,
    };

    try {
        const response = await fetch(profile, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestData),
        });

        if (!response.ok) throw new Error("Login Failed");
        const data = await response.json();
        if (data.success) {
            localStorage.setItem("profileID", data.item.id);
            localStorage.setItem("profileName", data.item.name);
            window.location.href = "Home.php";
        } else {
            alert("Login failed: " + data.message);
            email.value = "";
            password.value = "";
        }
    } catch (err) {
        console.error("Login error:", err);
        alert("An error occurred during login.");
        email.value = "";
        password.value = "";
    }
}

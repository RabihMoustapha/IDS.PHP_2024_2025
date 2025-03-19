async function Login() {
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    const item = {
        email: email.value,
        password: password.value
    };

    try {
        const response = await fetch(`http://localhost/IDS/Backend/Profile/Login.php`, {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(item)
        });

        if (response.ok) {
            const result = await response.json();
            alert("Login successful!");
            localStorage.setItem("ProfileID", result.id);
            localStorage.setItem("ProfileName", result.name);
            window.location.href = "../home.php";
        } else {
            throw new Error("Login failed. Please try again.");
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error: " + error.message);
    }
}
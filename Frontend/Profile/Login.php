<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Knowledge Sharing Platform</title>
    <link type="text/css" rel="stylesheet" href="../CSS/Profile.css">
</head>

<body>
    <main>
        <section class="form-container">
            <h2>Login</h2>
            <form id="login-form" action="javascript:void(0);" method="post" onsubmit="Login()">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login">
            </form>
            <a href="Create.html">If you dont have an account! Create one</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Community Knowledge Sharing Platform</p>
        <nav>
            <ul>
                <li><a href="../About.html">About</a></li>
                <li><a href="../Contact.html">Contact</a></li>
            </ul>
        </nav>
    </footer>
    <script type="text/javascript" src="../JS/Profile/Login.js"></script>
</body>

</html>
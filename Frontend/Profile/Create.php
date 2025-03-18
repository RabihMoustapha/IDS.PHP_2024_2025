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
            <h2>Sign Up</h2>
            <form action="javascript:void(0)" method="post" onsubmit="Create()">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Submit">
            </form>
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
    <script type="text/javascript" src="../JS/Profile/Create.js"></script>
</body>

</html>
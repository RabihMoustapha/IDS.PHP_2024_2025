<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link type="text/css" rel="stylesheet" href="../../CSS/Profile.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../Home.php">Home</a></li>
                <li><a href="../Post/Create.php">Create Post</a></li>
                <li><a href="../Post/View.php">Your Posts</a></li>
                <li><a href="#" onclick="Logout()">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="profile-container">
            <h2>Update Profile</h2>
            <form action="javascript:void(0)" method="post" onsubmit="Update()">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Update">
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Community Knowledge Sharing Platform</p>
        <nav>
            <ul>
                <li><a href="../About.php">About</a></li>
                <li><a href="../Contact.php">Contact</a></li>
            </ul>
        </nav>
    </footer>
    <script type="text/javascript" src="../JS/Profile/Update.js"></script>
</body>

</html>
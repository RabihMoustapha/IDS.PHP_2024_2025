<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link type="text/css" rel="stylesheet" href="../CSS/Profile.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../Home.html">Home</a></li>
                <li><a href="../Post/Create.html">Create Post</a></li>
                <li><a href="../Post/View.html">Your Posts</a></li>
                <li><a href="#" onclick="Logout()">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="profile-container">
            <h2>Profile</h2>
            <div id="profile-details">
                <p><strong>Name:</strong> <span id="profile-name"></span></p>
                <p><strong>Password:</strong> <span id="profile-password"></span></p>
            </div>
            <button id="edit-profile">Edit Profile</button>
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
    <script type="text/javascript" src="../JS/Profile/View.js"></script>
</body>

</html>
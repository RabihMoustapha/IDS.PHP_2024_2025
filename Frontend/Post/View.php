<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts</title>
    <link rel="stylesheet" href="../CSS/Post.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../Home.php">Home</a></li>
                <li><a href="Create.php">Create Post</a></li>
                <li><a href="#" onclick="Logout()">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="post-container">
            <div id="posts-list"></div>
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
    <script src="../JS/Post/View.js"></script>

</body>

</html>
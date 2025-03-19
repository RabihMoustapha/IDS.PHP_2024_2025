<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link type="text/css" rel="stylesheet" href="../CSS/Post.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../Home.php">Home</a></li>
                <li><a href="View.php">Your Posts</a></li>
                <li><a href="#" onclick="Logout()">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="post-container">
            <h2>Create Post</h2>
            <form action="javascript:void(0)" method="post" onsubmit="Create()">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
                <label for="image" class="image-label">Upload Image</label>
                <input type="file" id="image" accept="image/*" class="image-input-label" required>
                <input type="submit" value="Create Post">
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
    <script type="text/javascript" src="../JS/Post/Create.js"></script>
</body>

</html>
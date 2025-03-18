<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Title</title>
    <link type="text/css" rel="stylesheet" href="../../CSS/Post.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../../Home.html">Home</a></li>
                <li><a href="../Create.html">Create Post</a></li>
                <li><a href="../View.html">Your Posts</a></li>
                <li><a href="#" onclick="Logout()">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="post-container">
            <form action="javascript:void(0)" method="post" onsubmit="UpdateDescription()">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
                <input type="submit" value="Update">
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
    <script type="text/javascript" src="../../JS/Post/Update.js"></script>
</body>

</html>
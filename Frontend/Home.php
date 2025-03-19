<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Community Knowledge Sharing Platform</title>
  <link rel="stylesheet" href="CSS/Home.css" />
</head>

<body onload="Display()">
  <header>
    <nav>
      <ul>
        <li><a href="Profile/View.php">Profile</a></li>
        <li><a href="Post/Create.php">Create Post</a></li>
        <li><a href="Post/View.php">Your Posts</a></li>
        <li><a href="#" onclick="Logout(); return false;">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <form class="search-posts" action="javascript:void(0);" method="post" onsubmit="Search(); return false;">
        <input id="search-bar" type="text" name="search" placeholder="Search posts..." required />
        <input type="submit" value="Search" />
      </form>
    </section>

    <section class="post-container">
      <div id="posts-list"></div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Community Knowledge Sharing Platform</p>
    <nav>
      <ul>
        <li><a href="About.php">About</a></li>
        <li><a href="Contact.php">Contact</a></li>
      </ul>
    </nav>
  </footer>

  <script src="JS/Home.js"></script>
</body>

</html>
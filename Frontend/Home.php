<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Community Knowledge Sharing Platform</title>
  <link type="text/css" rel="stylesheet" href="CSS/Home.css" />
</head>

<body onload="Display()">
  <header>
    <nav>
      <ul>
        <li><a href="Profile/View.html">Profile</a></li>
        <li><a href="Post/Create.html">Create Post</a></li>
        <li><a href="Post/View.html">Your Posts</a></li>
        <li><a href="#" onclick="Logout()">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <form class="search-posts" action="javascript:void(0)" method="post" onsubmit="Search()">
        <input id="search-bar" type="text"/>
        <input type="submit" value="Search" />
      </form>
    </section>
  </main>

  <main>
    <section class="post-container">
        <div id="posts-list"></div>
    </section>
</main>

  <footer>
    <p>&copy; 2025 Community Knowledge Sharing Platform</p>
    <nav>
      <ul>
        <li><a href="About.html">About</a></li>
        <li><a href="Contact.html">Contact</a></li>
      </ul>
    </nav>
  </footer>

  <script type="text/javascript" src="JS/Home.js"></script>
</body>

</html>
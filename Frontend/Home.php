<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="IMG/api.png">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="CSS/Home.css">
</head>

<body onload="Get()">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WebApi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Post/Create.php">
                                <img src="IMG/plus.png" alt="Create Post" class="img-fluid" style="width: 20px; height: 20px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Profile/Page.php">
                                <img src="IMG/profile.png" alt="Create Post" class="img-fluid" style="width: 20px; height: 20px;">
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex w-100 me-3" action="javascript:void(0)" method="post" onsubmit="Search()">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchQuery" id="searchQuery">
                        <button class="btn btn-outline-success" type="submit">
                            <img src="IMG/search.png" alt="Search" class="img-fluid" style="width: 20px; height: 20px;">
                        </button>
                    </form>
                    <button class="btn btn-outline-danger" onclick="Logout()">
                        <img src="IMG/logout.png" alt="Logout" class="img-fluid" style="width: 20px; height: 20px;">
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="text-center">
            <h1>Welcome to WebApi</h1>
            <p>Your gateway to seamless API interactions.</p>
        </div>
    </main>

    <div id="container" class="container mb-4"></div>

    <footer class="footer mt-4 bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2025 WebApi. All rights reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="tel:+961818140764" class="text-white">Phone</a></li>
                <li class="list-inline-item"><a href="mailto:mostapharabih59@gmail.com" class="text-white">Email</a></li>
                <li class="list-inline-item"><a href="https://github.com/RabihMoustapha" target="_blank" class="text-white">GitHub</a></li>
            </ul>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/Home.js"></script>
</body>

</html>
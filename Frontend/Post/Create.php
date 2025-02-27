<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="icon" type="image/x-icon" href="../IMG/api.png">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Post/Create.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Home.php">WebApi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <button class="btn btn-outline-danger" onclick="Logout()">
                                <img src="../IMG/logout.png" alt="Logout" class="../IMG-fluid" style="width: 20px; height: 20px;">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="form-floating">
            <form action="javascript:void(0)" method="post" onsubmit="Create()">
                <input type="text" class="form-control" placeholder="Title" name="title" required>
                <textarea class="form-control" placeholder="Content" name="content" rows="5" required></textarea>
                <button class="btn btn-outline-success" type="submit">SUBMIT</button>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 WebApi. All rights reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="tel:+961818140764">Phone</a></li>
                <li class="list-inline-item"><a href="mailto:mostapharabih59@gmail.com">Email</a></li>
                <li class="list-inline-item"><a href="https://github.com/RabihMoustapha" target="_blank">GitHub</a></li>
            </ul>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/Post/Create.js"></script>
</body>

</html>
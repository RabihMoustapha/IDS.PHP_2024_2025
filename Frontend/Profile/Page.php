<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="../IMG/api.png">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../CSS/Profile/Page.css">
</head>

<body>
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Home.php">WebApi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <button class="btn btn-outline-danger" onclick="Logout()">
                        <img src="../IMG/logout.png" alt="Logout" class="img-fluid" style="width: 20px; height: 20px;">
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <form action="javascript:void(0)" method="POST" onsubmit="ShowProfileDetails()" class="container mb-4">
        <div class="profile-container mb-4 text-center">
            <div class="profile-header">
                <img src="../IMG/profile.png" alt="Profile Picture">
                <h2 id="profileName"></h2>
            </div>
        </div>
        <form action="javascript:void(0)" method="POST" onsubmit="addPost()" class="container mb-4">
            <div class="form-group">
                <button class=" btn btn-primary mt-3">Add Post</button>
            </div>
        </form>
        </div>
    </form>

    <!-- JS -->
    <script type="text/javascript" src="../JS/Profile/Page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2025 WebApi. All rights reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="tel:+961818140764" class="text-white">Phone</a></li>
                <li class="list-inline-item"><a href="mailto:mostapharabih59@gmail.com" class="text-white">Email</a></li>
                <li class="list-inline-item"><a href="https://github.com/RabihMoustapha" target="_blank" class="text-white">GitHub</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>
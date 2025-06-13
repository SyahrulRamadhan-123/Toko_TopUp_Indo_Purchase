<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/navbar/pp.jpeg" alt="logo" width="30" height="30" class="rounded-circle me-2">
            Mass Gondrong
        </a>
        <div class="d-flex align-items-center">
            <span class="navbar-text me-3">
                <?= $_SESSION['username']; ?>
            </span>
            <a href="index.php?page=logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>
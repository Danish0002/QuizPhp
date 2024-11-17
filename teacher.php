<?php
include('./partials/header.php');
include('./conn/conn.php');
include('./partials/modal.php');
?>

<div class="main">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">Online Quiz System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./teacher.php" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./quiz.php">Quiz</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end mr-4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div id="pills-home" class="container mt-5">
        <h2 id="welcome-teacher" class="display-4">Welcome Teacher!</h2>
        <p class="lead">
            This is the teacher area where you can add quizzes and view results submitted by students.
        </p>
        <p>
            <a href="./quiz.php" class="btn btn-primary">Go to Quiz Management</a>
        </p>
    </div>

</div>

<?php include('./partials/footer.php'); ?>

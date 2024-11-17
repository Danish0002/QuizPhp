<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
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
                    <a class="nav-link" href="./student.php">Home <span class="sr-only">(current)</span></a>
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

    <!-- Main Content -->
    <div class="student-content">
        <h2 id="welcome-student" class="mt-4">Welcome, Student!</h2>
        <p>This is your dedicated area to take quizzes. Your results will be automatically sent to your teacher once submitted.</p>
        
        <div class="quiz-btn-container mt-4">
            <a href="./take-quiz.php" class="btn btn-primary take-quiz-btn" role="button" aria-label="Take Quiz">
                Take Quiz <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<?php include ('./partials/footer.php'); ?>

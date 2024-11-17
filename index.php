<?php
include ('./partials/header.php');
include ('./conn/conn.php');
?>

<div class="main">
    <div class="main-container">
        <h1 class="app-title">Online Quiz App</h1>
        <div class="border-line"></div>

        <div class="selection-container">
            <h3 class="user-type-title">Select User Type</h3>
            <div class="user-selection-button">
                <a href="student.php">
                    <button class="selection-button">Student</button>
                </a>

                <a href="teacher.php">
                    <button class="selection-button">Teacher</button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include ('./partials/footer.php'); ?>

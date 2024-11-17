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
                <li class="nav-item">
                    <a class="nav-link" href="./student.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./take-quiz.php">Take Quiz</a>
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

    <!-- Quiz Area -->
    <div class="take-quiz-area">
        <h3 class="mt-4">Multiple Choice!</h3>
        <small>Put the letter of the correct answer in the blank input provided.</small>
        <div class="questions mt-4">
            <?php
            // Fetch all quiz questions
            $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $index => $row) {
                $quizID = $row['tbl_quiz_id'];
                $quizQuestion = htmlspecialchars($row['quiz_question']);
                $options = [
                    'A' => htmlspecialchars($row['option_a']),
                    'B' => htmlspecialchars($row['option_b']),
                    'C' => htmlspecialchars($row['option_c']),
                    'D' => htmlspecialchars($row['option_d']),
                ];
                $correctAnswer = strtoupper($row['correct_answer']);
            ?>
            <div class="question">
                <p><?= $quizID ?>. <?= $quizQuestion ?></p>
                <ol class="choices">
                    <?php foreach ($options as $letter => $option) : ?>
                        <li><?= $letter ?>. <?= $option ?></li>
                    <?php endforeach; ?>
                </ol>
                <div class="answer-input">
                    <label for="answer-<?= $quizID ?>" class="sr-only">Answer:</label>
                    <input id="answer-<?= $quizID ?>" type="text" maxlength="1" class="answer-input-field" aria-label="Answer for question <?= $quizID ?>">
                </div>
            </div>
            <?php } ?>
        </div>
        <button type="button" class="btn btn-secondary mt-4" id="submitAnswer">
            Submit <i class="fa-sharp fa-solid fa-share"></i>
        </button>
    </div>

</div>

<?php
// Pass quiz data to JavaScript
echo '<script>';
echo 'var quizData = ' . json_encode($result) . ';';
echo '</script>';
?>

<script>
    document.getElementById("submitAnswer").addEventListener("click", function() {
        var questions = document.querySelectorAll(".question");
        var correctAnswers = 0;

        questions.forEach(function(question, index) {
            var answerInput = question.querySelector("input");
            if (answerInput) {
                var userAnswer = answerInput.value.toUpperCase();
                var correctAnswer = quizData[index].correct_answer;

                if (userAnswer === correctAnswer) {
                    correctAnswers++;
                    question.classList.add("correct");
                } else {
                    question.classList.add("incorrect");
                }
            }
        });

        // Show modal with results
        $("#resultModal").modal("show");
        $("#totalScore").val(correctAnswers);
    });
</script>

<?php include('./partials/footer.php'); ?>

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
                <li class="nav-item">
                    <a class="nav-link" href="./teacher.php">Home</a>
                </li>
                <li class="nav-item active">
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

    <!-- Quiz Content -->
    <div class="quiz-container container mt-4">
        <!-- Tabs for Questions and Results -->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-questions-tab" data-toggle="tab" data-target="#nav-questions" type="button" role="tab" aria-controls="nav-questions" aria-selected="true">Questions</button>
                <button class="nav-link" id="nav-results-tab" data-toggle="tab" data-target="#nav-results" type="button" role="tab" aria-controls="nav-results" aria-selected="false">Results</button>
            </div>
        </nav>

        <!-- Tab Contents -->
        <div class="tab-content mt-4" id="nav-tabContent">
            <!-- Questions Tab -->
            <div class="tab-pane fade show active" id="nav-questions" role="tabpanel" aria-labelledby="nav-questions-tab">
                <button type="button" class="btn btn-dark my-3" id="add-quiz-button" data-toggle="modal" data-target="#addQuestionModal">
                    Add Question
                </button>
                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Quiz ID</th>
                                <th scope="col">Question</th>
                                <th scope="col">Correct Answer</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
                            $stmt->execute();
                            $questions = $stmt->fetchAll();

                            foreach ($questions as $question) { 
                                $quizID = htmlspecialchars($question['tbl_quiz_id']);
                                $quizQuestion = htmlspecialchars($question['quiz_question']);
                                $correctAnswer = htmlspecialchars($question['correct_answer']);
                            ?>
                                <tr>
                                    <td><?= $quizID ?></td>
                                    <td><?= $quizQuestion ?></td>
                                    <td><?= $correctAnswer ?></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="updateQuestion(<?= $quizID ?>)">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteQuestion(<?= $quizID ?>)">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Results Tab -->
            <div class="tab-pane fade" id="nav-results" role="tabpanel" aria-labelledby="nav-results-tab">
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Result ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Year & Section</th>
                                <th scope="col">Quiz Score</th>
                                <th scope="col">Date Taken</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                            $stmt->execute();
                            $results = $stmt->fetchAll();

                            foreach ($results as $result) { 
                                $resultID = htmlspecialchars($result['tbl_result_id']);
                                $studentName = htmlspecialchars($result['quiz_taker']);
                                $yearSection = htmlspecialchars($result['year_section']);
                                $totalScore = htmlspecialchars($result['total_score']);
                                $dateTaken = htmlspecialchars($result['date_taken']);
                            ?>
                                <tr>
                                    <td><?= $resultID ?></td>
                                    <td><?= $studentName ?></td>
                                    <td><?= $yearSection ?></td>
                                    <td><?= $totalScore ?></td>
                                    <td><?= $dateTaken ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteResult(<?= $resultID ?>)">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('./partials/footer.php'); ?>

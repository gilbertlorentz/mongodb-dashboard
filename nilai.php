<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/421f6f321f.js" crossorigin="anonymous"></script>
</head>

<style>
    html,
    body,
    .intro {
        height: 100%;
    }

    table td,
    table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        text-align: center;
    }

    thead th {
        color: #fff;
    }

    .card {
        border-radius: .5rem;
    }

    .table-scroll {
        border-radius: .5rem;
    }

    .table-scroll table thead th {
        font-size: 1.15rem;
    }

    thead {
        top: 0;
        position: sticky;
    }
</style>

<?php
require_once 'autoload.php';

$conn = mysqli_connect("localhost", "root", "", "academic_data", 3306);

$client = new MongoDB\Client();
$departments = $client->academic_data->department;
$exams = $client->academic_data->exam;

$conditions1 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Test1.1"
];

// Projection
$projection = [
    "SCORE_DATA.student_id" => 1,
    "SCORE_DATA.scores.score1" => 1,
    "SCORE_DATA.scores.score2" => 1,
    "_id" => 0
];

$cursor1 = $exams->find($conditions1, ['projection' => $projection]);

$conditions2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Test2.1"
];

// Projection
$cursor2 = $exams->find($conditions2, ['projection' => $projection]);

$conditions3 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Mid Exam1"
];

$cursor3 = $exams->find($conditions3, ['projection' => $projection]);

$conditions4 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Final Exam1"
];

// Projection
$cursor4 = $exams->find($conditions4, ['projection' => $projection]);

$conditions5 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Test1.2"
];

$cursor5 = $exams->find($conditions5, ['projection' => $projection]);

$conditions6 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Test2.2"
];

$cursor6 = $exams->find($conditions6, ['projection' => $projection]);


$conditions7 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Mid Exam2"
];

$cursor7 = $exams->find($conditions7, ['projection' => $projection]);


$conditions8 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => "Final Exam2"
];

$cursor8 = $exams->find($conditions8, ['projection' => $projection]);

?>

<body>
    <button class="btn mx-3 mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 300px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="font-size: larger;">Grade Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <a class="nav-link" href="home.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Home</a>
            <a class="nav-link" aria-current="page" href="student.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="teacher.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
            <a class="nav-link" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Grade</a>
        </div>
    </div>

    <h1 class="text-center pt-1" style="font-family: fantasy; font-size:60px; color:#3e4772">GRADE DATA</h1>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingScience">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseScience" aria-expanded="false" aria-controls="flush-collapseScience">
                    Science Department
                </button>
            </h2>
            <div id="flush-collapseScience" class="accordion-collapse collapse" aria-labelledby="flush-headingScience" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Science Department's Grade 1 students' First Physics Test Grade (First Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor1 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Science Department's Grade 1 students' Second Physics Test Grade (First Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor2 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Science Department's Grade 1 students' Physics Midterm Test Grade (First Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor3 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    Science Department's Grade 1 students' Physics Final Test Grade (First Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor4 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    Science Department's Grade 1 students' First Physics Test Grade (Second Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor5 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                    Science Department's Grade 1 students' Second Physics Test Grade (Second Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor6 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                    Science Department's Grade 1 students' Physics Midterm Test Grade (Second Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor7 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                                    Science Department's Grade 1 students' Physics Final Test Grade (Second Semester)
                                </button>
                            </h2>
                            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <section class="intro">
                                        <div class="bg-image h-100">
                                            <div class="mask d-flex align-items-center h-100">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="card" id="card2">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px;">
                                                                        <table class="table table-striped mb-0">
                                                                            <thead style="background-color: #002d72;">
                                                                                <th scope="col">Student ID</th>
                                                                                <th scope="col">Full Name</th>
                                                                                <th scope="col">Score</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($cursor8 as $exam) {
                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                        $studentId = $scoreData['student_id'];
                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                        $fullName = $row['full_name'];
                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                        echo "<tr><td>"  . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td></tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
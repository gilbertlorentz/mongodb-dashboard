<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/421f6f321f.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css'>
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

    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Science
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="accordion" id="sub-accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sub-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapseOne" aria-expanded="true" aria-controls="sub-collapseOne">
                                    Grade 1
                                </button>
                            </h2>
                            <div id="sub-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="sub-headingOne" data-bs-parent="#sub-accordionExample">
                                <div class="accordion-body">
                                    <div class="accordion" id="nested-sub-accordionExample">
                                        <!-- Nested Nested Accordion Item #1 -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-sub-headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseOne" aria-expanded="true" aria-controls="nested-sub-collapseOne">
                                                    Physics
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapseOne" class="accordion-collapse collapse show" aria-labelledby="nested-sub-headingOne" data-bs-parent="#nested-sub-accordionExample">
                                                <div class="accordion-body">
                                                    <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                    Nested Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                <div class="accordion-body">
                                                                    <strong>This is the first nested accordion item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                        Nested Accordion Item #3
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the third nested accordion item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                        Nested Accordion Item #3
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the third nested accordion item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                        Nested Accordion Item #4
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the fourth nested accordion item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Nested Nested Accordion Item #2 -->
                                        <!-- Nested Accordion Item #2 -->
                                        <div class="accordion" id="nested-sub-accordionExample2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="nested-sub-headingTwo">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseTwo" aria-expanded="true" aria-controls="nested-sub-collapseTwo">
                                                        Biology
                                                    </button>
                                                </h2>
                                                <div id="nested-sub-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingTwo" data-bs-parent="#nested-sub-accordionExample">
                                                    <div class="accordion-body">
                                                        <!-- Nested Nested Accordion Item #1 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                        Nested Nested Accordion Item #1
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the first nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more nested nested accordion items as needed -->
                                                        </div>

                                                        <!-- Nested Nested Accordion Item #2 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                        Nested Nested Accordion Item #2
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the second nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more nested nested accordion items as needed -->
                                                        </div>

                                                        <!-- Nested Nested Accordion Item #3 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                        Nested Nested Accordion Item #3
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the third nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more nested nested accordion items as needed -->
                                                        </div>

                                                        <!-- Nested Nested Accordion Item #4 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                        Nested Nested Accordion Item #4
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the fourth nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more nested nested accordion items as needed -->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Nested Accordion Item #3 -->
                                        <div class="accordion" id="nested-sub-accordionExample3">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="nested-sub-headingThree">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseThree" aria-expanded="true" aria-controls="nested-sub-collapseThree">
                                                        Mathematics
                                                    </button>
                                                </h2>
                                                <div id="nested-sub-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingThree" data-bs-parent="#nested-sub-accordionExample">
                                                    <div class="accordion-body">
                                                        <!-- Nested Nested Accordion Item #1 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                        Nested Nested Accordion Item #1
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the first nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more nested nested accordion items as needed -->
                                                        </div>

                                                        <!-- Nested Nested Accordion Item #2 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                        Nested Nested Accordion Item #2
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the second nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more nested nested accordion items as needed -->
                                                        </div>

                                                        <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                        Nested Nested Accordion Item #3
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the third nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more content or nested nested accordion items as needed -->
                                                        </div>

                                                        <!-- Nested Nested Accordion Item #4 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                        Nested Nested Accordion Item #4
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the fourth nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Add more content or nested nested accordion items as needed -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-sub-headingFour">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseFour" aria-expanded="true" aria-controls="nested-sub-collapseFour">
                                                    Chemistry
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingFour" data-bs-parent="#nested-sub-accordionExample">
                                                <div class="accordion-body">
                                                    <!-- Nested Nested Accordion Item #1 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                    Nested Nested Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                <div class="accordion-body">
                                                                    <strong>This is the first nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more content or nested nested accordion items as needed -->
                                                    </div>

                                                    <!-- Nested Nested Accordion Item #2 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Nested Nested Accordion Item #2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                <div class="accordion-body">
                                                                    <strong>This is the second nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more content or nested nested accordion items as needed -->
                                                    </div>

                                                    <!-- Nested Nested Accordion Item #3 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                    Nested Nested Accordion Item #3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                <div class="accordion-body">
                                                                    <strong>This is the third nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                    Nested Nested Accordion Item #4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                <div class="accordion-body">
                                                                    <strong>This is the fourth nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="sub-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapseTwo" aria-expanded="false" aria-controls="sub-collapseTwo">
                                Grade 2
                            </button>
                        </h2>
                        <div id="sub-collapseTwo" class="accordion-collapse collapse" aria-labelledby="sub-headingTwo" data-bs-parent="#sub-accordionExample">
                            <div class="accordion-body">
                                <div class="accordion" id="nested-sub-accordionExample1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseOne" aria-expanded="true" aria-controls="nested-sub-collapseOne">
                                                Physics
                                            </button>
                                        </h2>
                                        <div id="nested-sub-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingOne" data-bs-parent="#nested-sub-accordionExample1">
                                            <div class="accordion-body">
                                                <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                Nested Nested Accordion Item #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                            <div class="accordion-body">
                                                                <strong>This is the first nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                Nested Nested Accordion Item #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                            <div class="accordion-body">
                                                                <strong>This is the second nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                Nested Nested Accordion Item #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                            <div class="accordion-body">
                                                                <strong>This is the third nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                Nested Nested Accordion Item #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                            <div class="accordion-body">
                                                                <strong>This is the fourth nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-headingTwo">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseTwo" aria-expanded="true" aria-controls="nested-sub-collapseTwo">
                                                Biology
                                            </button>
                                        </h2>
                                        <div id="nested-sub-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingTwo" data-bs-parent="#nested-sub-accordionExample1">
                                            <div class="accordion-body">
                                                <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                Nested Nested Accordion Item #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                            <div class="accordion-body">
                                                                <strong>This is the first nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                Nested Nested Accordion Item #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                            <div class="accordion-body">
                                                                <strong>This is the second nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                Nested Nested Accordion Item #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                            <div class="accordion-body">
                                                                <strong>This is the third nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                Nested Nested Accordion Item #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                            <div class="accordion-body">
                                                                <strong>This is the fourth nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-headingThree">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseThree" aria-expanded="true" aria-controls="nested-sub-collapseThree">
                                                Mathematics
                                            </button>
                                        </h2>
                                        <div id="nested-sub-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingThree" data-bs-parent="#nested-sub-accordionExample1">
                                            <div class="accordion-body">
                                                <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                Nested Accordion Item #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                            <div class="accordion-body">
                                                                <strong>This is the first nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add more nested accordion items as needed -->
                                                </div>

                                                <!-- Nested Accordion Item #2 -->
                                                <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                Nested Accordion Item #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                            <div class="accordion-body">
                                                                <strong>This is the second nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add more nested accordion items as needed -->
                                                </div>

                                                <!-- Nested Accordion Item #3 -->
                                                <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                Nested Accordion Item #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                            <div class="accordion-body">
                                                                <strong>This is the third nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add more nested accordion items as needed -->
                                                </div>

                                                <!-- Nested Accordion Item #4 -->
                                                <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                Nested Accordion Item #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse show" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                            <div class="accordion-body">
                                                                <strong>This is the fourth nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add more nested accordion items as needed -->
                                                </div>

                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <div class="accordion" id="nested-sub-accordionExample1">
                                                <div class="accordion-item">
                                                    <!-- Chemistry Accordion Header -->
                                                    <h2 class="accordion-header" id="nested-sub-headingFour">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseFour" aria-expanded="true" aria-controls="nested-sub-collapseFour">
                                                            Chemistry
                                                        </button>
                                                    </h2>

                                                    <!-- Chemistry Accordion Collapse Content -->
                                                    <div id="nested-sub-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingFour" data-bs-parent="#nested-sub-accordionExample1">
                                                        <div class="accordion-body">
                                                            <!-- Nested Accordion #1 -->
                                                            <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="true" aria-controls="nested-sub-nested-collapseOne">
                                                                            Nested Nested Accordion Item #1
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                        <div class="accordion-body">
                                                                            <strong>This is the first nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Add more nested accordion items as needed -->
                                                            </div>

                                                            <!-- Nested Accordion #2 -->
                                                            <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                            Nested Nested Accordion Item #2
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                        <div class="accordion-body">
                                                                            <strong>This is the second nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Add more nested accordion items as needed -->
                                                            </div>

                                                            <!-- Nested Accordion #3 -->
                                                            <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="true" aria-controls="nested-sub-nested-collapseThree">
                                                                            Nested Nested Accordion Item #3
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                        <div class="accordion-body">
                                                                            <strong>This is the third nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="true" aria-controls="nested-sub-nested-collapseFour">
                                                                            Nested Nested Accordion Item #4
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                        <div class="accordion-body">
                                                                            <strong>This is the fourth nested nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the hiding and showing via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- End Chemistry Accordion Collapse Content -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="sub-accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sub-headinggrade3">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapsegrade3" aria-expanded="true" aria-controls="sub-collapsegrade3">
                                    Grade 3
                                </button>
                            </h2>
                            <div id="sub-collapsegrade3" class="accordion-collapse collapse hide" aria-labelledby="sub-headinggrade3" data-bs-parent="#sub-accordionExample">
                                <div class="accordion-body">
                                    <div class="accordion" id="nested-sub-accordionExample">
                                        <!-- Nested Nested Accordion Item #1 -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-sub-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseOne" aria-expanded="false" aria-controls="nested-sub-collapseOne">
                                                    Physics
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-headingOne" data-bs-parent="#nested-sub-accordionExample">
                                                <div class="accordion-body">
                                                    <!-- Nested Accordion Item #1 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                    Nested Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion Item #1 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion Item #2 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Nested Accordion Item #2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion Item #2 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion Item #3 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="false" aria-controls="nested-sub-nested-collapseThree">
                                                                    Nested Accordion Item #3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion Item #3 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion Item #4 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="false" aria-controls="nested-sub-nested-collapseFour">
                                                                    Nested Accordion Item #4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion Item #4 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-sub-headingbio3">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapsebio3" aria-expanded="false" aria-controls="nested-sub-collapsebio3">
                                                    Biology
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapsebio3" class="accordion-collapse collapse" aria-labelledby="nested-sub-headingbio3" data-bs-parent="#nested-sub-accordionExample">
                                                <div class="accordion-body">
                                                    <!-- Nested Accordion Item #1 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                    Nested Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                <div class="accordion-body">
                                                                    <strong>This is the first nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <!-- Nested Accordion Item #2 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Nested Accordion Item #2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                <div class="accordion-body">
                                                                    <strong>This is the second nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <!-- Nested Accordion Item #3 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="false" aria-controls="nested-sub-nested-collapseThree">
                                                                    Nested Accordion Item #3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                <div class="accordion-body">
                                                                    <strong>This is the third nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <!-- Nested Accordion Item #4 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="false" aria-controls="nested-sub-nested-collapseFour">
                                                                    Nested Accordion Item #4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                <div class="accordion-body">
                                                                    <strong>This is the fourth nested item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="accordion" id="nested-sub-accordionExample">
                                            <!-- Mathematics Accordion Item -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="nested-sub-headingThree">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseThree" aria-expanded="true" aria-controls="nested-sub-collapseThree">
                                                        Mathematics
                                                    </button>
                                                </h2>
                                                <div id="nested-sub-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingThree" data-bs-parent="#nested-sub-accordionExample">
                                                    <div class="accordion-body">
                                                    </div>

                                                    <!-- Nested Accordions -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                        <!-- Nested Accordion Item #1 -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                    Nested Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
                                                                <div class="accordion-body">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <!-- Nested Accordion Item #2 -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Nested Accordion Item #2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
                                                                <div class="accordion-body">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                        <!-- Nested Accordion Item #3 -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="false" aria-controls="nested-sub-nested-collapseThree">
                                                                    Nested Accordion Item #3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
                                                                <div class="accordion-body">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <div class="accordion" id="nested-sub-nested-accordionExample4">
                                                        <!-- Nested Accordion Item #4 -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingFour">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseFour" aria-expanded="false" aria-controls="nested-sub-nested-collapseFour">
                                                                    Nested Accordion Item #4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseFour" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingFour" data-bs-parent="#nested-sub-nested-accordionExample4">
                                                                <div class="accordion-body">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Nested Nested Accordion Item #4 -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-sub-headingFour">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseFour" aria-expanded="true" aria-controls="nested-sub-collapseFour">
                                                    Chemistry
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapseFour" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingFour" data-bs-parent="#nested-sub-accordionExample">
                                                <div class="accordion-body">
                                                    <!-- Nested Accordion #1 -->
                                                    <div class="accordion" id="nested-sub-nested-accordion1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-heading1">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse1" aria-expanded="false" aria-controls="nested-sub-nested-collapse1">
                                                                    Nested Accordion #1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapse1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading1" data-bs-parent="#nested-sub-nested-accordion1">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion #1 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion #2 -->
                                                    <div class="accordion" id="nested-sub-nested-accordion2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-heading2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2" aria-expanded="false" aria-controls="nested-sub-nested-collapse2">
                                                                    Nested Accordion #2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapse2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2" data-bs-parent="#nested-sub-nested-accordion2">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion #2 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion #3 -->
                                                    <div class="accordion" id="nested-sub-nested-accordion3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-heading3">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse3" aria-expanded="false" aria-controls="nested-sub-nested-collapse3">
                                                                    Nested Accordion #3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapse3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading3" data-bs-parent="#nested-sub-nested-accordion3">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion #3 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion #4 -->
                                                    <div class="accordion" id="nested-sub-nested-accordion4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-heading4">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse4" aria-expanded="false" aria-controls="nested-sub-nested-collapse4">
                                                                    Nested Accordion #4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapse4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading4" data-bs-parent="#nested-sub-nested-accordion4">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion #4 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Repeat similar structure for additional nested nested items (3, 4, and 5) -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Social
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <!-- Nested Accordion #1 -->
                <div class="accordion" id="nested-sub-accordion1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="nested-sub-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapse1" aria-expanded="false" aria-controls="nested-sub-collapse1">
                                Grade 1
                            </button>
                        </h2>
                        <div id="nested-sub-collapse1" class="accordion-collapse collapse" aria-labelledby="nested-sub-heading1" data-bs-parent="#nested-sub-accordion1">
                            <div class="accordion-body">

                                <!-- Nested Accordion #1 -->
                                <div class="accordion" id="nested-sub-nested-accordion1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse1" aria-expanded="false" aria-controls="nested-sub-nested-collapse1">
                                                Economics
                                            </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading1" data-bs-parent="#nested-sub-nested-accordion1">
                                            <div class="accordion-body">

                                                <!-- Nested Accordion #1 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading1">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse1" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse1">
                                                                Nested Accordion #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading1" data-bs-parent="#nested-sub-nested-nested-accordion1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #1 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #2 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading2">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2">
                                                                Nested Accordion #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2" data-bs-parent="#nested-sub-nested-nested-accordion2">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #2 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #3 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading3">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse3" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse3">
                                                                Nested Accordion #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3" data-bs-parent="#nested-sub-nested-nested-accordion3">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #3 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #4 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading4">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse4" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse4">
                                                                Nested Accordion #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4" data-bs-parent="#nested-sub-nested-nested-accordion4">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #4 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Nested Accordion #2 -->
                                <div class="accordion" id="nested-sub-nested-accordion2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2" aria-expanded="false" aria-controls="nested-sub-nested-collapse2">
                                                Accounting
                                            </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2" data-bs-parent="#nested-sub-nested-accordion2">
                                            <div class="accordion-body">

                                                <!-- Nested Accordion #1 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion2-1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading2-1">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2-1" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2-1">
                                                                Nested Accordion #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse2-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2-1" data-bs-parent="#nested-sub-nested-nested-accordion2-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #1 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #2 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion2-2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading2-2">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2-2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2-2">
                                                                Nested Accordion #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse2-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2-2" data-bs-parent="#nested-sub-nested-nested-accordion2-2">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #2 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #3 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion2-3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading2-3">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2-3" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2-3">
                                                                Nested Accordion #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse2-3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2-3" data-bs-parent="#nested-sub-nested-nested-accordion2-3">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #3 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #4 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion2-4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading2-4">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2-4" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2-4">
                                                                Nested Accordion #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse2-4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2-4" data-bs-parent="#nested-sub-nested-nested-accordion2-4">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #4 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Nested Accordion #3 -->
                                <div class="accordion" id="nested-sub-nested-accordion3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse3" aria-expanded="false" aria-controls="nested-sub-nested-collapse3">
                                                Sociology
                                            </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading3" data-bs-parent="#nested-sub-nested-accordion3">
                                            <div class="accordion-body">

                                                <!-- Nested Accordion #1 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion3-1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading3-1">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse3-1" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse3-1">
                                                                Nested Accordion #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse3-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3-1" data-bs-parent="#nested-sub-nested-nested-accordion3-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #1 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #2 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion3-2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading3-2">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse3-2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse3-2">
                                                                Nested Accordion #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse3-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3-2" data-bs-parent="#nested-sub-nested-nested-accordion3-2">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #2 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #3 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion3-3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading3-3">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse3-3" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse3-3">
                                                                Nested Accordion #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse3-3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3-3" data-bs-parent="#nested-sub-nested-nested-accordion3-3">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #3 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #4 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion3-4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading3-4">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse3-4" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse3-4">
                                                                Nested Accordion #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse3-4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3-4" data-bs-parent="#nested-sub-nested-nested-accordion3-4">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #4 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion" id="nested-sub-nested-accordion4">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse4" aria-expanded="false" aria-controls="nested-sub-nested-collapse4">
                                                Geography
                                            </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading4" data-bs-parent="#nested-sub-nested-accordion4">
                                            <div class="accordion-body">

                                                <!-- Nested Accordion #1 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion4-1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading4-1">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse4-1" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse4-1">
                                                                Nested Accordion #1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse4-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4-1" data-bs-parent="#nested-sub-nested-nested-accordion4-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #1 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #2 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion4-2">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading4-2">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse4-2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse4-2">
                                                                Nested Accordion #2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse4-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4-2" data-bs-parent="#nested-sub-nested-nested-accordion4-2">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #2 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #3 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion4-3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading4-3">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse4-3" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse4-3">
                                                                Nested Accordion #3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse4-3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4-3" data-bs-parent="#nested-sub-nested-nested-accordion4-3">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #3 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nested Accordion #4 -->
                                                <div class="accordion" id="nested-sub-nested-nested-accordion4-4">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-nested-nested-heading4-4">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse4-4" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse4-4">
                                                                Nested Accordion #4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-nested-nested-collapse4-4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4-4" data-bs-parent="#nested-sub-nested-nested-accordion4-4">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #4 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                <!-- Nested Accordion #2 -->
                <div class="accordion" id="nested-sub-accordion2">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="nested-sub-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapse2" aria-expanded="false" aria-controls="nested-sub-collapse2">
                                Grade 2
                            </button>
                        </h2>
                        <div id="nested-sub-collapse2" class="accordion-collapse collapse" aria-labelledby="nested-sub-heading2" data-bs-parent="#nested-sub-accordion2">
                            <div class="accordion-body">

                                <!-- Nested Accordion #1 -->
                                <div class="accordion" id="nested-sub-nested-accordion2-1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading2-1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2-1" aria-expanded="false" aria-controls="nested-sub-nested-collapse2-1">
                                                Economics
                                            </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse2-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2-1" data-bs-parent="#nested-sub-nested-accordion2-1">
                                            <div class="accordion-body">
                                                <!-- Content for Economics Accordion -->
                                                <div class="accordion" id="nested-accordion-level-1">
                                                    <!-- Nested Accordion #1 -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-heading-level-1-1">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-1-1" aria-expanded="false" aria-controls="nested-collapse-level-1-1">
                                                                Nested Accordion 1
                                                            </button>
                                                        </h2>
                                                        <div id="nested-collapse-level-1-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-1-1" data-bs-parent="#nested-accordion-level-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #1 -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion #2 -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-heading-level-1-2">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-1-2" aria-expanded="false" aria-controls="nested-collapse-level-1-2">
                                                                Nested Accordion 2
                                                            </button>
                                                        </h2>
                                                        <div id="nested-collapse-level-1-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-1-2" data-bs-parent="#nested-accordion-level-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #2 -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion #3 -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-heading-level-1-3">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-1-3" aria-expanded="false" aria-controls="nested-collapse-level-1-3">
                                                                Nested Accordion 3
                                                            </button>
                                                        </h2>
                                                        <div id="nested-collapse-level-1-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-1-3" data-bs-parent="#nested-accordion-level-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #3 -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nested Accordion #4 -->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-heading-level-1-4">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-1-4" aria-expanded="false" aria-controls="nested-collapse-level-1-4">
                                                                Nested Accordion 4
                                                            </button>
                                                        </h2>
                                                        <div id="nested-collapse-level-1-4" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-1-4" data-bs-parent="#nested-accordion-level-1">
                                                            <div class="accordion-body">
                                                                <!-- Content for Nested Accordion #4 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Nested Accordion #2 -->
                                <div class="accordion" id="nested-sub-nested-accordion2-2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading2-2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2-2" aria-expanded="false" aria-controls="nested-sub-nested-collapse2-2">
                                                Accounting </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse2-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2-2" data-bs-parent="#nested-sub-nested-accordion2-2">
                                            <div class="accordion-body">
                                                <div class="accordion-body">
                                                    <!-- Content for Nested Accordion #2 -->
                                                    <div class="accordion" id="nested-accordion-level-3-1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-3-1">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-3-1" aria-expanded="false" aria-controls="nested-collapse-level-3-1">
                                                                    Nested Accordion 1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-3-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-3-1" data-bs-parent="#nested-accordion-level-3-1">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 1 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-3-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-3-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-3-2" aria-expanded="false" aria-controls="nested-collapse-level-3-2">
                                                                    Nested Accordion 2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-3-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-3-2" data-bs-parent="#nested-accordion-level-3-2">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 2 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-3-3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-3-3">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-3-3" aria-expanded="false" aria-controls="nested-collapse-level-3-3">
                                                                    Nested Accordion 3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-3-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-3-3" data-bs-parent="#nested-accordion-level-3-3">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 3 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-3-4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-3-4">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-3-4" aria-expanded="false" aria-controls="nested-collapse-level-3-4">
                                                                    Nested Accordion 4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-3-4" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-3-4" data-bs-parent="#nested-accordion-level-3-4">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 4 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nested Accordion #3 -->
                                <div class="accordion" id="nested-sub-nested-accordion2-3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading2-3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2-3" aria-expanded="false" aria-controls="nested-sub-nested-collapse2-3">
                                                Sociology </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse2-3" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2-3" data-bs-parent="#nested-sub-nested-accordion2-3">
                                            <div class="accordion-body">
                                                <div class="accordion-body">
                                                    <!-- Content for Nested Accordion #3 -->
                                                    <div class="accordion" id="nested-accordion-level-4-1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-1">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-1" aria-expanded="false" aria-controls="nested-collapse-level-4-1">
                                                                    Nested Accordion 1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-1" data-bs-parent="#nested-accordion-level-4-1">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 1 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-4-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-2" aria-expanded="false" aria-controls="nested-collapse-level-4-2">
                                                                    Nested Accordion 2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-2" data-bs-parent="#nested-accordion-level-4-2">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 2 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-4-3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-3">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-3" aria-expanded="false" aria-controls="nested-collapse-level-4-3">
                                                                    Nested Accordion 3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-3" data-bs-parent="#nested-accordion-level-4-3">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 3 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-4-4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-4">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-4" aria-expanded="false" aria-controls="nested-collapse-level-4-4">
                                                                    Nested Accordion 4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-4" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-4" data-bs-parent="#nested-accordion-level-4-4">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 4 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nested Accordion #4 -->
                                <div class="accordion" id="nested-sub-nested-accordion2-4">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="nested-sub-nested-heading2-4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2-4" aria-expanded="false" aria-controls="nested-sub-nested-collapse2-4">
                                                Geography </button>
                                        </h2>
                                        <div id="nested-sub-nested-collapse2-4" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2-4" data-bs-parent="#nested-sub-nested-accordion2-4">
                                            <div class="accordion-body">
                                                <div class="accordion-body">
                                                    <!-- Content for Nested Accordion #3 -->
                                                    <div class="accordion" id="nested-accordion-level-4-1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-1">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-1" aria-expanded="false" aria-controls="nested-collapse-level-4-1">
                                                                    Nested Accordion 1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-1" data-bs-parent="#nested-accordion-level-4-1">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 1 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-4-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-2" aria-expanded="false" aria-controls="nested-collapse-level-4-2">
                                                                    Nested Accordion 2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-2" data-bs-parent="#nested-accordion-level-4-2">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 2 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-4-3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-3">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-3" aria-expanded="false" aria-controls="nested-collapse-level-4-3">
                                                                    Nested Accordion 3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-3" data-bs-parent="#nested-accordion-level-4-3">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 3 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-level-4-4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-4-4">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-4" aria-expanded="false" aria-controls="nested-collapse-level-4-4">
                                                                    Nested Accordion 4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-4-4" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-4" data-bs-parent="#nested-accordion-level-4-4">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 4 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- Nested Accordion #3 -->
                <div class="accordion" id="nested-sub-accordion-social-grade3">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="nested-sub-heading-social-grade3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapse-social-grade3" aria-expanded="false" aria-controls="nested-sub-collapse-social-grade3">
                                Grade 3 </button>
                        </h2>
                        <div id="nested-sub-collapse-social-grade3" class="accordion-collapse collapse" aria-labelledby="nested-sub-heading-social-grade3" data-bs-parent="#nested-sub-accordion-social-grade3">
                            <div class="accordion-body">
                                <div class="accordion-body">
                                    <!-- Content for Nested Accordion #3 -->
                                    <div class="accordion" id="nested-accordion-eco">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-heading-eco">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-eco" aria-expanded="false" aria-controls="nested-collapse-eco">
                                                    Economics </button>
                                            </h2>
                                            <div id="nested-collapse-eco" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco" data-bs-parent="#nested-accordion-eco">
                                                <div class="accordion-body">
                                                    <div class="accordion-body">
                                                        <!-- Content for Nested Accordion 1 -->
                                                        <div class="accordion" id="nested-accordion-eco1">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-eco1">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-eco1" aria-expanded="false" aria-controls="nested-collapse-eco1">
                                                                        Nested Accordion 1
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-eco1" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco1" data-bs-parent="#nested-accordion-eco1">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 1 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-accordion-eco2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-eco2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-eco2" aria-expanded="false" aria-controls="nested-collapse-eco2">
                                                                        Nested Accordion 2
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-eco2" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco2" data-bs-parent="#nested-accordion-eco2">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 2 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-accordion-eco3">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-eco3">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-eco3" aria-expanded="false" aria-controls="nested-collapse-eco3">
                                                                        Nested Accordion 3
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-eco3" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco3" data-bs-parent="#nested-accordion-eco3">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 3 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-accordion-eco4">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-eco4">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-eco4" aria-expanded="false" aria-controls="nested-collapse-eco4">
                                                                        Nested Accordion 4
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-eco4" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco4" data-bs-parent="#nested-accordion-eco4">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 4 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion" id="nested-accordion-acc">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-heading-acc">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-acc" aria-expanded="false" aria-controls="nested-collapse-acc">
                                                    Accounting </button>
                                            </h2>
                                            <div id="nested-collapse-acc" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc" data-bs-parent="#nested-accordion-acc">
                                                <div class="accordion-body">
                                                    <div class="accordion-body">
                                                        <!-- Content for Nested Accordion 2 -->
                                                        <div class="accordion" id="nested-accordion-acc1">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-acc1">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-acc1" aria-expanded="false" aria-controls="nested-collapse-acc1">
                                                                        Nested Accordion 1
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-acc1" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc1" data-bs-parent="#nested-accordion-acc1">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 1 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-accordion-acc2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-acc2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-acc2" aria-expanded="false" aria-controls="nested-collapse-acc2">
                                                                        Nested Accordion 2
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-acc2" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc2" data-bs-parent="#nested-accordion-acc2">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 2 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-accordion-acc3">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-acc3">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-acc3" aria-expanded="false" aria-controls="nested-collapse-acc3">
                                                                        Nested Accordion 3
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-acc3" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc3" data-bs-parent="#nested-accordion-acc3">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 3 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="accordion" id="nested-accordion-acc4">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-acc4">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-acc4" aria-expanded="false" aria-controls="nested-collapse-acc4">
                                                                        Nested Accordion 4
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-acc4" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc4" data-bs-parent="#nested-accordion-acc4">
                                                                    <div class="accordion-body">
                                                                        <!-- Content for Nested Accordion 4 -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion" id="nested-accordion-level-4-3">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-heading-level-4-3">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-3" aria-expanded="false" aria-controls="nested-collapse-level-4-3">
                                                    Sociology </button>
                                            </h2>
                                            <div id="nested-collapse-level-4-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-3" data-bs-parent="#nested-accordion-level-4-3">
                                                <div class="accordion-body">
                                                    <!-- Content for Nested Accordion 3 -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion" id="nested-accordion-geo-3">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-heading-level-4-4">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-geo-3" aria-expanded="false" aria-controls="nested-collapse-geo-3">
                                                    Geography </button>
                                            </h2>
                                            <div id="nested-collapse-geo-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3" data-bs-parent="#nested-accordion-geo-3">
                                                <div class="accordion-body">
                                                    <div class="accordion" id="nested-accordion-geo-3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-geo-3-1">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-geo-3-1" aria-expanded="false" aria-controls="nested-collapse-geo-3-1">
                                                                    Nested Accordion 1
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-geo-3-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3-1" data-bs-parent="#nested-accordion-geo-3-1">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 1 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-geo-3-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-geo-3-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-geo-3-2" aria-expanded="false" aria-controls="nested-collapse-geo-3-2">
                                                                    Nested Accordion 2
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-geo-3-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3-2" data-bs-parent="#nested-accordion-geo-3-2">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 2 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-geo-3-3">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-geo-3-3">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-geo-3-3" aria-expanded="false" aria-controls="nested-collapse-geo-3-3">
                                                                    Nested Accordion 3
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-geo-3-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3-3" data-bs-parent="#nested-accordion-geo-3-3">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 3 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="nested-accordion-geo-3-4">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-geo-3-4">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-geo-3-4" aria-expanded="false" aria-controls="nested-collapse-geo-3-4">
                                                                    Nested Accordion 4
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-geo-3-4" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3-4" data-bs-parent="#nested-accordion-geo-3-4">
                                                                <div class="accordion-body">
                                                                    <!-- Content for Nested Accordion 4 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headinglang">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselang" aria-expanded="false" aria-controls="collapselang">
                Language
            </button>
        </h2>
        <div id="collapselang" class="accordion-collapse collapse" aria-labelledby="headinglang" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headinglang-1-1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselang-1-1" aria-expanded="false" aria-controls="collapselang-1-1">
                            Grade 1
                        </button>
                    </h2>
                    <div id="collapselang-1-1" class="accordion-collapse collapse" aria-labelledby="headinglang-1-1" data-bs-parent="#collapselang-1-1">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headinglang-1-2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselang-1-2" aria-expanded="false" aria-controls="collapselang-1-2">
                            Grade 2
                        </button>
                    </h2>
                    <div id="collapselang-1-2" class="accordion-collapse collapse" aria-labelledby="headinglang-1-2" data-bs-parent="#collapselang-1-2">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headinglang-1-3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselang-1-3" aria-expanded="false" aria-controls="collapselang-1-3">
                            Grade 3
                        </button>
                    </h2>
                    <div id="collapselang-1-3" class="accordion-collapse collapse" aria-labelledby="headinglang-1-3" data-bs-parent="#collapselang-1-3">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingmand">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand" aria-expanded="false" aria-controls="collapsemand">
                Mandatory
            </button>
        </h2>
        <div id="collapsemand" class="accordion-collapse collapse" aria-labelledby="headingmand" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            </div>
        </div>
    </div>
    </div>

    <!-- <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Science Department
            </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="panelsStayOpen-headingOne">
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
    </div> -->
</body>

</html>
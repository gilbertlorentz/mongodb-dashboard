<?php
require_once 'autoload.php';

$client = new MongoDB\Client();

$conn = mysqli_connect("localhost", "root", "", "academic_data", 3306);

if ($conn->connect_error) {
    echo "Error: could no connect. " . mysqli_connect_error();
}

$exam_data = $client->academic_data->exam;
$dept_data = $client->academic_data->department;

$studentID = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$sql = "SELECT * FROM student WHERE STUDENT_ID = " . $studentID;
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $name = $row['full_name'];
    $grade = $row['grade'];
    $department = $row['department_id'];
    $email = $row['email'];
}

if ($department == 1) {
    $department = "Science";
} elseif ($department == 2) {
    $department = "Social Science";
} else {
    $department = "Language";
}
$pipeline = [
    ['$unwind' => '$SCORE_DATA'],
    [
        '$match' => [
            'SCORE_DATA.student_id' => $studentID,
        ],
    ],
    [
        '$project' => [
            '_id' => 0,
            'subject' => '$SUBJECT',
            'exam' => '$EXAM_TYPE',
            'scores' => [
                '$add' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2'],
            ],
        ],
    ],
];

$scores = $exam_data->aggregate($pipeline);
$arr_nilai = [];

foreach ($scores as $score) {
    $arr_nilai[$score['subject']][$score['exam']] = $score['scores'];
}

$labels = ["Test1.1", "Test1.2", "Test2.1", "Test2.2", "Mid Exam1", "Mid Exam2", "Final Exam1", "Final Exam2"];

$mandSubject = ['Art', 'Civic', 'History', 'Indonesian'];

if ($department === "Science") {
    $subjectsArray = array_merge(['Biology', 'Chemistry', 'Physics', 'Mathematics'], $mandSubject);
} elseif ($department == "Social Science") {
    $subjectsArray = array_merge(['Accounting', 'Economics', 'Geography', 'Sociology'], $mandSubject);
} elseif ($department == "Language") {
    $subjectsArray = array_merge(['French', 'German', 'Korean', 'Mandarin'], $mandSubject);
}

foreach ($subjectsArray as $subject) {
    $arr_nilai[$subject] = array_column($arr_nilai[$subject], null, 'exam');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/421f6f321f.js" crossorigin="anonymous"></script>
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <button class="btn mx-3 mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fa-solid fa-bars"></i>
    </button>
    <button class="btn mx-3 mt-3" type="button">
        <a href="student.php">
            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
        </a>
    </button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 300px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="font-size: larger;">Academic Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="nav-link" href="home.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Home</a>
            <a class="nav-link" aria-current="page" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="teacher.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
        </div>
    </div>
    <div class="mx-4 mt-3" style="width: 10%;">
        <img src="asset/person_icon.png" class="rounded float-start img-fluid" alt="student-photo">
    </div>
    <div class="container" style="margin-top:2%; margin-left: 15%;">
        <h2 style="font-family: Arial, sans-serif; font-weight: bolder;"><?= $name ?></h2>
        <div class="row">
            <div class="col-auto">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <div class="col">
                <p style="font-family: sans-serif; color: grey;"><?= $email ?></p>
            </div>
        </div>
        <div class="d-flex gap-3">
            <p class="p-2" style="background-color:#455d74; color:aliceblue; border-radius:7px; font-size:small"><?= $department ?></p>
            <p class="p-2" style="background-color:#455d74; color:aliceblue; border-radius:7px; font-size:small">Grade <?= $grade ?></p>
        </div>
    </div>

    <div class="d-flex justify-content-end h-fit w-50 mt-5">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        const labels = ["Test 1.1", "Test 1.2", "Test 2.1", "Test 2.2", "Mid Exam 1", "Mid Exam 2", "Final Exam 1", "Final Exam 2"]

        const data = {
            labels: labels,
            datasets: [{
                label: '<?= $subjectsArray[0] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[0]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'RGB(255, 99, 132)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[1] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[1]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'RGB(54, 162, 235)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[2] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[2]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'rgb(255,205,86)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[3] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[3]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[4] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[4]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'rgb(255, 159, 64)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[5] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[5]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'rgb(153,102,255)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[6] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[6]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'rgb(255,77,166)',
                tension: 0.1
            }, {
                label: '<?= $subjectsArray[7] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai[$subjectsArray[7]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: 'rgb(100,100,100)',
                tension: 0.1
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                y: {
                    suggestedMin: 0,
                    suggestedMax: 100
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            boxWidth:30
                        }
                    },
                    title: {
                        display: true,
                        text: "Student's Score"
                    }
                }
            },
        };

        new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>
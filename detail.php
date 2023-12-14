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
    $department = "Social";
} else {
    $department = "Language";
}

$get_score = [
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

$get_avg = [
    ['$unwind' => '$SCORE_DATA'],
    [
        '$match' => [
            'SCORE_DATA.student_id' => $studentID
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
    [
        '$group' => [
            '_id' => null,
            'averageSumScore' => ['$avg' => '$scores'],
        ],
    ],
];

$get_rank =
    [
        [
            '$unwind' => '$SCORE_DATA',
        ],
        [
            '$match' => [
                'GRADE' => intval($grade),
                'DEPARTMENT' => $department,
            ],
        ],
        [
            '$project' => [
                '_id' => 0,
                'student_id' => '$SCORE_DATA.student_id',
                'scores' => [
                    '$add' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2'],
                ],
            ],
        ],
        [
            '$group' => [
                '_id' => '$student_id',
                'averageSumScore' => ['$avg' => '$scores'],
            ],
        ],
    ];

$data = iterator_to_array($exam_data->aggregate($get_rank));
usort($data, function ($a, $b) {
    return $b['averageSumScore'] <=> $a['averageSumScore'];
});

$rank = null;
foreach ($data as $index => $document) {
    if ($document['_id'] == $studentID) {
        $rank = $index + 1;
        break;
    }
}

$color = 'red';

if ($rank >= 1 && $rank <= 3) {
    $color = 'gold';
} elseif ($rank >= 4 && $rank <= 10) {
    $color = 'silver';
} elseif ($rank >= 11 && $rank <= 25) {
    $color = 'darkgreen';
} elseif ($rank >= 26 && $rank <= 50) {
    $color = 'green';
} elseif ($rank >= 51 && $rank <= 80) {
    $color = 'yellow';
} elseif ($rank >= 81 && $rank <= 100) {
    $color = 'orange';
}

$scores = $exam_data->aggregate($get_score);
$avg = $exam_data->aggregate($get_avg);
$result = iterator_to_array($avg);

$arr_nilai = [];
foreach ($scores as $score) {
    $arr_nilai[$score['subject']][$score['exam']] = $score['scores'];
}

$labels = ["Test1.1", "Test1.2", "Mid Exam1", "Final Exam1", "Test2.1", "Test2.2", "Mid Exam2", "Final Exam2"];

$mandSubject = ['Art', 'Civic', 'History', 'Indonesian'];

if ($department === "Science") {
    $subjectsArray = array_merge(['Biology', 'Chemistry', 'Physics', 'Mathematics'], $mandSubject);
} elseif ($department == "Social") {
    $subjectsArray = array_merge(['Accounting', 'Economics', 'Geography', 'Sociology'], $mandSubject);
} elseif ($department == "Language") {
    $subjectsArray = array_merge(['French', 'German', 'Korean', 'Mandarin'], $mandSubject);
}

$arr_nilai_sorted = [];

foreach ($arr_nilai as $subject => $scores) {
    $subject_data = [];

    foreach ($labels as $label) {
        $subject_data[] = $scores[$label];
    }

    $arr_nilai_sorted[$subject] = $subject_data;
}

$avgArray = [];
$avgPerSem = [];

foreach ($subjectsArray as $subject) {
    $avgPerSem['1st_semester'][] = array_sum(array_slice($arr_nilai[$subject], 0, 4)) / 4;
    $avgPerSem['2nd_semester'][] = array_sum(array_slice($arr_nilai[$subject], 4, 4)) / 4;
    array_push($avgArray, (array_sum($arr_nilai[$subject]) / 8));
}

function getTeacherNameBySubject($subjectName, $studentID, $dept_data, $conn)
{
    $get_teacher = [
        [
            '$match' => [
                'subjects.subject_name' => $subjectName,
                'subjects.teachers_list.students_taught.student_id' => intval($studentID),
            ],
        ],
        [
            '$unwind' => '$subjects',
        ],
        [
            '$match' => [
                'subjects.subject_name' => $subjectName,
                'subjects.teachers_list.students_taught.student_id' => intval($studentID),
            ],
        ],
        [
            '$unwind' => '$subjects.teachers_list',
        ],
        [
            '$unwind' => '$subjects.teachers_list.students_taught',
        ],
        [
            '$match' => [
                'subjects.teachers_list.students_taught.student_id' => intval($studentID),
            ],
        ],
        [
            '$project' => [
                '_id' => 0,
                'teacher_id' => '$subjects.teachers_list.teacher_id',
            ],
        ],
    ];

    $teacher = $dept_data->aggregate($get_teacher);
    $teacher = iterator_to_array($teacher);

    if (isset($teacher[0]['teacher_id'])) {
        $sql = "SELECT full_name FROM teacher WHERE teacher_id = " . $teacher[0]['teacher_id'];
        $teacherResult = $conn->query($sql);

        while ($row = $teacherResult->fetch_assoc()) {
            $teacher_name = $row['full_name'];
            return $teacher_name;
        }
    }
    return null;
}
$overall_lowest = $subjectsArray[array_search(min($avgArray), $avgArray)];
$first_lowest = $subjectsArray[array_search(min($avgPerSem['1st_semester']), $avgPerSem['1st_semester'])];
$second_lowest = $subjectsArray[array_search(min($avgPerSem['2nd_semester']), $avgPerSem['2nd_semester'])];
$overall_lowest_teach = getTeacherNameBySubject($overall_lowest, $studentID, $dept_data, $conn);
$first_lowest_teach = getTeacherNameBySubject($first_lowest, $studentID, $dept_data, $conn);
$second_lowest_teach = getTeacherNameBySubject($second_lowest, $studentID, $dept_data, $conn);
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .chartDiv {
            max-width: calc(50% - 10px);
            width: 34vw;
            height: 20vh;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .chartDiv h3,
        .chartDiv h6,
        .chartDiv p {
            text-align: center;
        }

        .carousel-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .carousel-button {
            color: black;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
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
            <a class="nav-link" href="nilai.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Grade</a>
        </div>
    </div>
    <div class="d-flex mb-3">
        <div class="mx-4 mt-4 p-2" style="width: 12%;">
            <img src="asset/person_icon.png" class="rounded float-start img-fluid" alt="student-photo">
        </div>
        <div class="container p-2" style="margin-top:2%;">
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

        <div class="carousel-container">
            <button class="carousel-button" onclick="plusDivs(-1)">&#10094;</button>

            <div id="chartDiv1" class="chartDiv" data-index="3">
                <h3 style="margin-top: 29px;" id="subjectTitle">
                    <?php echo $overall_lowest ?>
                </h3>
                <h6><?php echo $overall_lowest_teach ?></h6>
                <p class="widget-value" style="color:orangered; font-weight: bold;">Overall Lowest Score Subject</p>
            </div>

            <div id="chartDiv2" class="chartDiv" data-index="2">
                <h3 style="margin-top: 29px;" id="subjectTitle">
                    <?php echo $first_lowest ?>
                </h3>
                <h6><?php echo $first_lowest_teach ?></h6>
                <p class="widget-value" style="color:orangered; font-weight: bold;">1st Semester Lowest Score Subject</p>
            </div>

            <div id="chartDiv3" class="chartDiv" data-index="3">
                <h3 style="margin-top: 29px;" id="subjectTitle">
                    <?php echo $second_lowest ?>
                </h3>
                <h6><?php echo $second_lowest_teach ?></h6>
                <p class="widget-value" style="color:orangered; font-weight: bold;">2nd Semester Lowest Score Subject</p>
            </div>

            <button class="carousel-button" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <div class="d-flex align-items-center ms-auto p-1 mt-3 mr-4" style="margin-right: 10%;">
            <div class="d-flex flex-column align-items-center mr-4">
                <h1 class="mb-0" style="font-size: 5vw; color: <?= $color ?>; -webkit-text-stroke: 0.4px black;">#<?= $rank ?></h1>
                <p style="font-family: 'Courier New', Courier, monospace; letter-spacing: 3px;">RANK</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <div class="w-50">
            <canvas class="ms-4 me-4 h-100" id="scoreChart" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></canvas>
        </div>
        <div class="w-50" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="w-25 ms-4 me-4">
                <label for="exampleDataList" class="form-label">Semester</label>
                <select class="form-select" aria-label="Default select example" name="SemesterInput" onchange="updatePie(this); updateContent(this);">
                    <option selected value="3">All</option>
                    <option value="1">1st Semester</option>
                    <option value="2">2nd Semester</option>
                </select>
            </div>
            <canvas class="ms-4 me-4" id="myChart"></canvas>
        </div>
    </div>
    <script>
        let currentDiv = 1;

        function showDiv(n) {
            const divs = document.getElementsByClassName("chartDiv");
            currentDiv += n;

            if (currentDiv > divs.length) {
                currentDiv = 1;
            }

            if (currentDiv < 1) {
                currentDiv = divs.length;
            }

            for (let i = 0; i < divs.length; i++) {
                divs[i].style.display = "none";
            }

            const currentIndex = currentDiv - 1;
            divs[currentIndex].style.display = "block";
        }

        function plusDivs(n) {
            showDiv(n);
        }

        // Show the initial div
        showDiv(0);
    </script>
    <script>
        const exam_label = ["Test1.1", "Test1.2", "Mid Exam1", "Final Exam1", "Test2.1", "Test2.2", "Mid Exam2", "Final Exam2"];
        const colors = [
            'RGB(255, 99, 132)',
            'RGB(54, 162, 235)',
            'rgb(255,205,86)',
            'rgb(75, 192, 192)',
            'rgb(255, 159, 64)',
            'rgb(153,102,255)',
            'rgb(35,517,166)',
            'rgb(100,100,100)'
        ];

        let datasets = [];

        <?php for ($i = 0; $i < 8; $i++) : ?>
            datasets.push({
                label: '<?= $subjectsArray[$i] ?>',
                data: <?php echo 'new Array(' . implode(',', $arr_nilai_sorted[$subjectsArray[$i]]) . ')'; ?>,
                fill: false,
                pointStyle: 'circle',
                pointRadius: 7,
                pointHoverRadius: 10,
                borderColor: colors[<?= $i ?>],
                tension: 0.1
            });
        <?php endfor; ?>

        data_score = {
            labels: exam_label,
            datasets: datasets
        };

        const line_chart = {
            type: 'line',
            data: data_score,
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
                            boxWidth: 28
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
            document.getElementById('scoreChart'),
            line_chart
        );

        var ctx = document.getElementById("myChart");
        var average_overall = <?php echo round($result[0]['averageSumScore'], 2); ?>;

        const stackedText = {
            id: 'stackedText',
            afterDatasetsDraw(chart, args, options) {
                const {
                    ctx,
                    chartArea: {
                        left,
                        right,
                        top,
                        bottom,
                        width,
                        height
                    }
                } = chart;

                ctx.save();
                const fontHeight = 35;
                ctx.font = `bolder ${fontHeight}px Arial`;
                ctx.fillStyle = 'rgba(255,26,104,1)';
                ctx.textAlign = 'center';
                ctx.fillText(average_overall, width / 2, height / 11 + top);
                ctx.restore();

                ctx.font = 'bold 13px Arial';
                ctx.fillStyle = 'black';
                ctx.textAlign = 'center';
                ctx.fillText('Overall Average', width / 2, height / 14 + top + fontHeight);
            }
        };


        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($subjectsArray); ?>,
                datasets: [{
                    label: 'Average Score',
                    data: <?php echo json_encode($avgArray); ?>,
                    backgroundColor: colors,
                    borderWidth: 1
                }]
            },
            options: {
                y: {
                    suggestedMin: 0,
                    suggestedMax: 100
                },
                responsive: true,
            },
            plugins: [stackedText],
            title: {
                display: true,
                text: "Student's Score"
            }
        });

        function updatePie(option) {
            const selectedSemester = option.value;

            if (selectedSemester == 1) {
                myChart.data.datasets.forEach(dataset => {
                    dataset.data = <?php echo json_encode($avgPerSem['1st_semester']); ?>;
                });
                average_overall = <?php echo round((array_sum($avgPerSem['1st_semester']) / 8), 2) ?>;
            } else if (selectedSemester == 2) {
                myChart.data.datasets.forEach(dataset => {
                    dataset.data = <?php echo json_encode($avgPerSem['2nd_semester']); ?>;
                });
                average_overall = <?php echo round((array_sum($avgPerSem['2nd_semester']) / 8), 2) ?>;
            } else if (selectedSemester == 3) {
                myChart.data.datasets.forEach(dataset => {
                    dataset.data = <?php echo json_encode($avgArray); ?>;
                });
                average_overall = <?php echo round($result[0]['averageSumScore'], 2); ?>;
            }
            myChart.update();
        }
    </script>
</body>

</html>
<?php

$conn = new mysqli("localhost", "root", "", "academic_data", 3306);

if ($conn->connect_error) {
    echo "Error: could not connect. " . $conn->connect_error;
}

// Student per Dept
$grade1 = [];
$grade2 = [];
$grade3 = [];

for ($i = 0; $i < 3; $i++) {
    $countGrade1 = 0;
    $countGrade2 = 0;
    $countGrade3 = 0;

    for ($j = 1; $j < 4; $j++) {
        $sql = "SELECT COUNT(*) as count FROM student WHERE DEPARTMENT_ID = " . $i + 1 . " and grade = " . $j;
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            $count = $row['count'];

            if ($j == 1) {
                $countGrade1 = $count;
            } elseif ($j == 2) {
                $countGrade2 = $count;
            } elseif ($j == 3) {
                $countGrade3 = $count;
            }
        } else {
            // Handle the query error if needed
            echo "Error: " . $conn->error;
        }
    }

    $grade1[$i] = $countGrade1;
    $grade2[$i] = $countGrade2;
    $grade3[$i] = $countGrade3;
}



// Teachers per Dept
$teacher1 = [];
$teacher2 = [];
$teacher3 = [];

for ($i = 0; $i < 4; $i++) {
    $countTeacher1 = 0;
    $countTeacher2 = 0;
    $countTeacher3 = 0;

    for ($j = 1; $j < 4; $j++) {
        $degree = 'S' . $j; // Construct the degree value dynamically
        $sql = "SELECT COUNT(*) as count FROM teacher WHERE DEPARTMENT_ID = " . ($i + 1) . " and degree = '$degree'";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            $count = $row['count'];

            if ($j == 1) {
                $countTeacher1 = $count;
            } elseif ($j == 2) {
                $countTeacher2 = $count;
            } elseif ($j == 3) {
                $countTeacher3 = $count;
            }
        } else {
            // Handle the query error if needed
            echo "Error: " . $conn->error;
        }
    }

    $teacher1[$i] = $countTeacher1;
    $teacher2[$i] = $countTeacher2;
    $teacher3[$i] = $countTeacher3;
}


// Teachers Average Salary
$teacher_sal_avg1 = [];
$teacher_sal_avg2 = [];
$teacher_sal_avg3 = [];

for ($i = 0; $i < 4; $i++) {
    $countTeacher1 = 0;
    $countTeacher2 = 0;
    $countTeacher3 = 0;

    for ($j = 1; $j < 4; $j++) {
        $degree = 'S' . $j; // Construct the degree value dynamically
        $sql = "SELECT AVG(salary_per_mon) as salary FROM teacher WHERE DEPARTMENT_ID = " . ($i + 1) . " and degree = '$degree'";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            $avg = $row['salary'];

            if ($j == 1) {
                $countTeacher1 = $avg;
            } elseif ($j == 2) {
                $countTeacher2 = $avg;
            } elseif ($j == 3) {
                $countTeacher3 = $avg;
            }
        } else {
            // Handle the query error if needed
            echo "Error: " . $conn->error;
        }
    }

    $teacher_sal_avg1[$i] = $countTeacher1;
    $teacher_sal_avg2[$i] = $countTeacher2;
    $teacher_sal_avg3[$i] = $countTeacher3;
}





// Teachers Accepted per Year
$teacher_acc = [];

for ($i = 1; $i < 5; $i++) {
    $departmentData = []; // Array to hold data for each department

    $sql = "SELECT YEAR(STR_TO_DATE(hire_date, '%m/%d/%Y')) AS year, COUNT(teacher_id) AS count_teachers 
            FROM teacher 
            WHERE department_id = $i 
            GROUP BY year";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $year = $row['year'];
            $teacherCount = $row['count_teachers'];

            $departmentData[$year] = (string) $teacherCount; // Casting count to string explicitly
        }

        // Fill in the missing years with zero counts
        for ($year = 2008; $year <= 2022; $year++) {
            if (!isset($departmentData[$year])) {
                $departmentData[$year] = "0"; // Setting count as string "0"
            }
        }

        // Sort the array by keys (years)
        ksort($departmentData);
    } else {
        // Handle the query error if needed
        echo "Error: " . $conn->error;
    }

    $teacher_acc[$i] = $departmentData;
}
$teacher_acc_modified = [];

foreach ($teacher_acc as $departmentData) {
    $modifiedData = [];

    foreach ($departmentData as $year => $count) {
        $modifiedData[] = [(string)$year, (string)$count];
    }

    $teacher_acc_modified[] = $modifiedData;
}






// Total New Student vs Previous Year
$new_student = 0;
$prev_student = 0;

for ($i = 0; $i < 2; $i++) {
    if ($i == 0) {
        $sql = "SELECT COUNT(*) as student FROM student WHERE STUDENT_REG_YEAR = '2024'";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $count = $row['student'];

        $new_student = intval($count);
    } else {
        $sql = "SELECT COUNT(*) as student FROM student WHERE STUDENT_REG_YEAR = '2023'";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $count = $row['student'];

        $prev_student = intval($count);
    }
}




// Total Teachers
$total_teachers = 0;
$new_teachers = 0;
for ($i = 0; $i < 1; $i++) {
    $sql = "SELECT COUNT(*) as teachers FROM teacher";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $total_teachers = $row['teachers'];
}

for ($i = 0; $i < 1; $i++) {
    $sql = "SELECT COUNT(*) AS new_teachers FROM teacher WHERE SUBSTRING_INDEX(hire_date, '/', -1) = '2022'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $new_teachers = $row['new_teachers'];
    }
}

// var_dump($new_student);
// var_dump($prev_student);

// var_dump($teacher_acc_modified[0]);
// echo "<br><br>";
// var_dump($teacher_acc_modified[1]);
// echo "<br><br>";
// var_dump($teacher_acc_modified[2]);
// echo "<br><br>";
// var_dump($teacher_acc_modified[3]);
// echo "<br><br>";
// var_dump($teacher_acc_modified[0][0][1]);
// echo 'new Array(' . implode(',', $teacher_acc_modified[0][1]) . ')';
// echo "<br><br>";
// echo 'new Array(';
// for ($i = 0; $i < 15; $i++) {
//     echo '[' . implode(',', $teacher_acc_modified[0][$i]) . ']';
//     if ($i < 14) {
//         echo ',';
//     }
// }
// echo ')';
// echo "<br><br>";
// echo 'new Array(' . implode(',', $teacher_sal_avg1) . ')';
// print_r($grade1);
// $conn->close();
// var_dump($grade1);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/421f6f321f.js" crossorigin="anonymous"></script>

    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <script src="https://code.jscharting.com/latest/jscharting-widgets.js"></script>
    <script type="text/javascript" src="https://code.jscharting.com/latest/modules/types.js"></script>
    <script type="text/javascript" src="https://code.jscharting.com/latest/modules/toolbar.js"></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css);
    </style>
    <style>
        /* Common grid-container style */
        .grid-container {
            display: flex;
            flex-wrap: wrap;
            background-color: #f3f3f3;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
        }

        .chartDiv {
            flex: 1 1 calc(50% - 10px);
            max-width: calc(50% - 10px);
            height: 190px;
            margin: 5px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Specific chart divs */
        #TeachersAccDiv {
            display: flex;
            justify-content: center;
            margin: 50px 30px;
            /* border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: white; */
            padding: 0px;
            max-width: 900px;
            /* Adjust as needed */
            height: 510px;
            /* Adjust as needed */
        }

        #AverageScoreGradeDeptDiv {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin: 30px 20px 20px 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 10px;
            /* Increase the width */
            max-width: 1200px;
            /* Adjust this value as needed */
            height: 510px;
        }

        .frame_avg {
            background-color: #f3f3f3;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            /* Adjust the width as needed */
            margin: 30px 20px;
            /* Center horizontally */
        }


        /* #AverageScoreGradeDeptDiv {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px auto 10px 10px;
            max-width: 900px;
            border-radius: 8px;
            background-color: white;
            padding: 10px;
            margin-bottom: 0px;
            background-color: #f3f3f3;
            border: 1px solid #ddd;
        } */




        #widgetsWrapper,
        #AvgTeacherSalDiv,
        #StudentDeptDiv,
        #TeacherDeptDiv {
            display: flex;
            justify-content: center;
            margin: 30px;
        }

        #TeachersAccDiv {
            flex: 2;
            max-width: 900px;
            height: 300px;
        }

        #AverageScoreGradeDeptDiv {
            flex: 2;
            max-width: 890px;
            height: 400px;
        }

        #widgetsWrapper {
            flex: 2;
            max-width: 420px;
        }

        #AvgTeacherSalDiv {
            flex: 2;
            max-width: 600px;
            height: 800px;
            padding: 20px;
        }

        #StudentDeptDiv,
        #TeacherDeptDiv {
            flex: 1;
            max-width: 300px;
            height: 300px;
        }

        /* Container within the row */
        .col-lg-6 {
            display: flex;
            justify-content: center;
        }

        #mainContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0 auto;
            max-width: 1380px;
            /* Adjusted width to fit the screen better */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 10px 30px 0px 0px;
            margin-bottom: 20px;
            background-color: #f3f3f3;
        }


        .widget-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 200px;
            /* Adjust width as needed */
            margin: 30px 50px 30px 50px;
        }

        .widget-card h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .widget-value {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #673AB7;
            /* Change color as needed */
        }

        .prev-value {
            color: #888;
            font-size: 14px;
        }

        .no-padding {
            padding: 0;
        }

        .card-border {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        #AverageScoreGradeDeptDiv,
        #widgetsWrapper {
            height: 400px;
            /* Adjust the height value as per your requirement */
        }


        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* Adjust this based on your layout needs */
            background-color: #f3f3f3;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            /* Adjust margin-top as per your design */
        }

        .chartDiv {
            flex: 0 0 calc(50% - 10px);
            max-width: calc(50% - 10px);
            height: 180px;
            margin: 5px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .center-container {
            display: flex;
            justify-content: center;
            margin: 0 5px;
        }

        #filterContainer,
        #CorrDiv1Container {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
            margin: 10px;
            max-width: 200px;
        }


        #dataTable {
            max-width: 400px;
            /* Adjust the maximum width as needed */
            margin: 0 auto;
            /* Centers the table */
        }




        /* Media query for smaller screens */
        @media (max-width: 768px) {
            #mainContainer {
                flex-direction: column;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php
    require_once 'autoload.php';

    $client = new MongoDB\Client();
    $departments = $client->academic_data->department;
    $exams = $client->academic_data->exam;

    $department_name = $departments->distinct('department_name');

    // Average Student Score
    $pipeline1 = [
        [
            '$unwind' => '$SCORE_DATA'
        ],
        [
            '$project' => [
                '_id' => 0,
                'student_id' => '$SCORE_DATA.student_id',
                'scores' => [
                    '$add' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2']
                ]
            ]
        ],
        [
            '$group' => [
                '_id' => '$student_id',
                'totalScores' => ['$sum' => '$scores'],
                'count' => ['$sum' => 1]
            ]
        ],
        [
            '$group' => [
                '_id' => null,
                'totalStudents' => ['$sum' => 1],
                'totalScores' => ['$sum' => '$totalScores'],
                'totalCount' => ['$sum' => '$count']
            ]
        ],
        [
            '$project' => [
                '_id' => 0,
                'averageScore' => ['$divide' => ['$totalScores', '$totalCount']],
                'totalStudents' => 1
            ]
        ]
    ];
    $score_avg = $exams->aggregate($pipeline1);
    $averageScore = null;

    foreach ($score_avg as $document) {
        $averageScore = $document->averageScore;
    }


    // Average Teachers Rating
    $pipeline2 = [
        [
            '$unwind' => '$subjects' // Unwind the subjects array
        ],
        [
            '$unwind' => '$subjects.teachers_list' // Unwind the teachers_list array within subjects
        ],
        [
            '$unwind' => '$subjects.teachers_list.students_taught' // Unwind the students_taught array within teachers_list
        ],
        [
            '$group' => [
                '_id' => null,
                'totalAngketScores' => ['$sum' => ['$sum' => '$subjects.teachers_list.students_taught.angket_score']],
                'count' => ['$sum' => ['$size' => '$subjects.teachers_list.students_taught.angket_score']]
            ]
        ],
        [
            '$project' => [
                '_id' => 0,
                'averageAngketScore' => ['$divide' => ['$totalAngketScores', '$count']]
            ]
        ]
    ];

    $result = $departments->aggregate($pipeline2)->toArray();
    $rating_avg = $result[0]['averageAngketScore'];





    // Average Student Score by Grades
    $avg_grade1 = 0;
    $avg_grade2 = 0;
    $avg_grade3 = 0;
    $pipeline3 = [
        ['$unwind' => '$SCORE_DATA'],
        ['$group' => [
            '_id' => '$GRADE',
            'averageScore' => [
                '$avg' => [
                    '$sum' => ['$add' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2']]
                ]
            ]
        ]]
    ];

    $aggregation = $exams->aggregate($pipeline3)->toArray();

    foreach ($aggregation as $result) {
        switch ($result->_id) {
            case 1:
                $avg_grade1 = $result->averageScore;
                break;
            case 2:
                $avg_grade2 = $result->averageScore;
                break;
            case 3:
                $avg_grade3 = $result->averageScore;
                break;
            default:
                break;
        }
    }





    // Average Student Score by Grades and Departments
    $avg_grade1_science = 0;
    $avg_grade1_social = 0;
    $avg_grade1_language = 0;
    $avg_grade2_science = 0;
    $avg_grade2_social = 0;
    $avg_grade2_language = 0;
    $avg_grade3_science = 0;
    $avg_grade3_social = 0;
    $avg_grade3_language = 0;

    $pipeline4 = [
        ['$unwind' => '$SCORE_DATA'],
        [
            '$group' => [
                '_id' => [
                    'grade' => '$GRADE',
                    'department' => '$DEPARTMENT'
                ],
                'averageScore' => [
                    '$avg' => [
                        '$sum' => ['$add' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2']]
                    ]
                ]
            ]
        ]
    ];

    $aggregation = $exams->aggregate($pipeline4)->toArray();

    foreach ($aggregation as $result) {
        switch ($result->_id['grade']) {
            case 1:
                switch ($result->_id['department']) {
                    case 'Science':
                        $avg_grade1_science = $result->averageScore;
                        break;
                    case 'Social':
                        $avg_grade1_social = $result->averageScore;
                        break;
                    case 'Language':
                        $avg_grade1_language = $result->averageScore;
                        break;
                }
                break;
            case 2:
                switch ($result->_id['department']) {
                    case 'Science':
                        $avg_grade2_science = $result->averageScore;
                        break;
                    case 'Social':
                        $avg_grade2_social = $result->averageScore;
                        break;
                    case 'Language':
                        $avg_grade2_language = $result->averageScore;
                        break;
                }
                break;
            case 3:
                switch ($result->_id['department']) {
                    case 'Science':
                        $avg_grade3_science = $result->averageScore;
                        break;
                    case 'Social':
                        $avg_grade3_social = $result->averageScore;
                        break;
                    case 'Language':
                        $avg_grade3_language = $result->averageScore;
                        break;
                }
                break;
        }
    }






    // Average Score per Student
    $pipeline5 = [
        ['$unwind' => '$SCORE_DATA'],
        ['$project' => [
            '_id' => 0,
            'student_id' => '$SCORE_DATA.student_id',
            'averageScore' => ['$avg' => ['$sum' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2']]]
        ]],
        ['$group' => [
            '_id' => '$student_id',
            'averageScore' => ['$avg' => '$averageScore']
        ]],
        ['$project' => [
            '_id' => 0,
            'x' => '$_id',
            'y' => '$averageScore'
        ]]
    ];

    $result = $exams->aggregate($pipeline5)->toArray();

    $avgStudentScore = [];

    foreach ($result as $doc) {
        $avgStudentScore[] = [
            'x' => $doc['x'],
            'y' => $doc['y']
        ];
    }

    // Sort based on the student_id
    usort($avgStudentScore, function ($a, $b) {
        return $a['x'] - $b['x'];
    });
    // var_dump($avgStudentScore[3]["x"]);












    // Average Score Rating for Teachers who Teach Them per Student
    $pipeline6 = [
        ['$unwind' => '$subjects'],
        ['$unwind' => '$subjects.teachers_list'],
        ['$unwind' => '$subjects.teachers_list.students_taught'],
        [
            '$group' => [
                '_id' => [
                    'student_id' => '$subjects.teachers_list.students_taught.student_id',
                    'teacher_id' => '$subjects.teachers_list.teacher_id'
                ],
                'totalAngketScores' => ['$sum' => ['$sum' => '$subjects.teachers_list.students_taught.angket_score']],
                'count' => ['$sum' => ['$size' => '$subjects.teachers_list.students_taught.angket_score']]
            ]
        ],
        [
            '$group' => [
                '_id' => '$_id.student_id',
                'averageAngketScore' => ['$avg' => ['$divide' => ['$totalAngketScores', '$count']]]
            ]
        ],
        [
            '$project' => [
                '_id' => 0,
                'x' => '$_id',
                'y' => '$averageAngketScore'
            ]
        ]
    ];

    $result = $departments->aggregate($pipeline6)->toArray(); // Execute the aggregation query and convert the result to an array

    $avgTeacherRating = [];

    foreach ($result as $doc) {
        $avgTeacherRating[] = [
            'x' => $doc['x'],
            'y' => $doc['y']
        ];
    }

    usort($avgTeacherRating, function ($a, $b) {
        return $a['x'] - $b['x'];
    });






    $series_1 = [];

    for ($i = 0; $i < count($avgStudentScore); $i++) {
        $xValue = number_format((float)$avgStudentScore[$i]['y'], 2); // Format x-value
        $yValue = number_format((float)$avgTeacherRating[$i]['y'], 2); // Format y-value

        $series_1[] = "{x:$yValue,y:$xValue}";
    }

    $corr_stud_teach = "[" . implode(",", $series_1) . "]";
    // echo $corr_stud_teach;


    // var_dump($series_1);
    // echo json_encode(array_column(array_column($series_1, 'points'), 0));





    // $pipeline7 = [
    //     ['$unwind' => '$SCORE_DATA'],
    //     ['$project' => [
    //         '_id' => 0,
    //         'student_id' => '$SCORE_DATA.student_id',
    //         'averageScore' => ['$avg' => ['$sum' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2']]]
    //     ]],
    //     ['$group' => [
    //         '_id' => '$student_id',
    //         'averageScore' => ['$avg' => '$averageScore']
    //     ]],
    //     ['$project' => [
    //         '_id' => 0,
    //         'x' => '$_id',
    //         'y' => '$averageScore'
    //     ]]
    // ];

    // $result = $exams->aggregate($pipeline7)->toArray();

    // $topStudentAvg = [];

    // foreach ($result as $doc) {
    //     $topStudentAvg[] = [
    //         'x' => $doc['x'],
    //         'y' => $doc['y']
    //     ];
    // }

    // // Sort based on the student_id
    // usort($topStudentAvg, function ($a, $b) {
    //     return $b['y'] <=> $a['y'];
    // });
    // $top3student = array_slice($topStudentAvg, 0, 3);


    // var_dump($top3student);






    // Define the initial pipeline stages
    $pipeline7 = [
        ['$unwind' => '$SCORE_DATA'],
        ['$project' => [
            '_id' => 0,
            'student_id' => '$SCORE_DATA.student_id',
            'averageScore' => ['$avg' => ['$sum' => ['$SCORE_DATA.scores.score1', '$SCORE_DATA.scores.score2']]]
        ]],
        ['$group' => [
            '_id' => '$student_id',
            'averageScore' => ['$avg' => '$averageScore']
        ]],
        ['$project' => [
            '_id' => 0,
            'x' => '$_id',
            'y' => '$averageScore'
        ]]
    ];

    // Execute the MongoDB aggregation query using the updated pipeline
    $result = $exams->aggregate($pipeline7)->toArray();


    $topStudentAvg = [];

    foreach ($result as $doc) {
        $topStudentAvg[] = [
            'x' => $doc['x'],
            'y' => $doc['y']
        ];
    }

    // Sort based on the student_id
    usort($topStudentAvg, function ($a, $b) {
        return $b['y'] <=> $a['y'];
    });
    $top3student = array_slice($topStudentAvg, 0, 3);


    ?>


    <button class="btn mx-3 mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 300px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="font-size: larger;">Academic Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="nav-link" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Home</a>
            <a class="nav-link" aria-current="page" href="student.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="teacher.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
            <a class="nav-link" href="nilai.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Grade</a>
        </div>
    </div>

    <h1 class="text-center pt-1" style="font-family: fantasy; font-size:60px; color:brown">DASHBOARD</h1>

    <div class="col-lg-12 center-container" style="display: flex; margin: 0px 5px 10px 5px;">

        <div id="AverageScoreGradeDeptDiv" class="card-border" style="padding-right: 50px; margin-right: 40px;"></div>

        <div id="widgetsWrapper" class="grid-container">
            <div id="chartDiv1" class="chartDiv">
                <h3 style="margin-top: 20px;">Total New Students</h3>
                <p class="widget-value" style="color: #E4C100;"><?php echo $new_student; ?></p>
                <p class="prev-value">Previous: <?php echo $prev_student; ?></p>
                <?php
                // Calculate percentage increase or decrease
                $percentage_change = (($new_student - $prev_student) / $prev_student) * 100;
                // Determine the color based on the change
                $color = $percentage_change < 0 ? 'red' : 'green';
                ?>

                <p class="percentage-change" style="color: <?php echo $color; ?>; font-size: smaller;">
                    <?php echo sprintf('(%.2f%%)', $percentage_change); ?>
                </p>

            </div>
            <div id="chartDiv2" class="chartDiv">
                <h3>Total Teachers</h3>
                <p class="widget-value"><?php echo $total_teachers; ?></p>

                <p class="prev-value">New Teachers: <?php echo $new_teachers; ?></p>
            </div>
            <div id="chartDiv3" class="chartDiv"></div>
            <div id="chartDiv4" class="chartDiv"></div>
        </div>
    </div>



    <div class="col-lg-12 justify-content-center" id="mainContainer">
        <div class="col-lg-6 card-border"> <!-- Added margin-bottom -->
            <form method="POST">
                <div class="mb-3">
                    <label for="gradeFilter">Filter by Grade:</label>
                    <select id="gradeFilter" name="gradeFilter" class="form-control">
                        <option value="all">All Grades</option>
                        <option value="grade1">Grade 1</option>
                        <option value="grade2">Grade 2</option>
                        <option value="grade3">Grade 3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="departmentFilter">Filter by Department:</label>
                    <select id="departmentFilter" name="departmentFilter" class="form-control">
                        <option value="all">All Departments</option>
                        <option value="science">Science</option>
                        <option value="social">Social</option>
                        <option value="language">Language</option>
                    </select>
                </div>
            </form>
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top3student as $student) : ?>
                        <tr>
                            <td><?= $student['x'] ?></td>
                            <td><?= number_format($student['y'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <script>
            $(document).ready(function() {
                $('#gradeFilter, #departmentFilter').change(function() {
                    const grade = $('#gradeFilter').val();
                    const department = $('#departmentFilter').val();

                    $('#dataTable tbody tr').hide();

                    if (grade === 'all' && department === 'all') {
                        $('#dataTable tbody tr').show();
                    } else {
                        $(`#dataTable tbody tr${grade !== 'all' ? `[data-grade="${grade}"]` : ''}${department !== 'all' ? `[data-department="${department}"]` : ''}`).show();
                    }
                });
            });
            </script>
        </div>


        <div class="col-lg-6 card-border">
            <div id="CorrDiv1"></div>
        </div>
    </div>








    <div class="col-lg-12 justify-content-center" id="mainContainer">
        <div class="col-lg-6" style="padding-top: 20px;">
            <!-- Average Teachers Salary -->
            <div id="AvgTeacherSalDiv" class="card-border"></div>
        </div>
        <div class="col-lg-6 row" style="margin-top: 10px;">
            <div class="col-lg-12"><!-- per Dept -->
                <div class="row card-border">
                    <div class="col-lg-6 no-padding"><!-- First Column for Students per Dept -->
                        <div id="StudentDeptDiv"></div>
                    </div>
                    <div class="col-lg-6 no-padding"><!-- Second Column for Teachers per Dept -->
                        <div id="TeacherDeptDiv"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 no-padding card-border" style="margin-top: 30px;"><!-- Teachers per Dept -->
                <div id="TeachersAccDiv"></div>
            </div>
        </div>
    </div>









    <script>
        var chart1 = JSC.chart('StudentDeptDiv', {
            debug: true,
            type: 'vertical column',
            palette: 'fiveColor10',
            yAxis: {
                scale_type: 'stacked',
                label_text: 'Students'
            },
            defaultPoint_outline_color: 'darkenMore',
            title_label: {
                text: 'Students per Department',
                style: {
                    fontFamily: 'Verdana',
                    color: 'black',
                    fontWeight: 200,
                    fontSize: 14
                }
            },
            xAxis: {
                label_text: 'Department',
                categories: ['SCIENCE', 'SOCIAL', 'LANGUAGE']
            },
            series: [

                {
                    name: 'Grade 1',
                    id: 's1',
                    points: <?php echo 'new Array(' . implode(',', $grade1) . ')'; ?>
                },
                {
                    name: 'Grade 2',
                    points: <?php echo 'new Array(' . implode(',', $grade2) . ')'; ?>
                },
                {
                    name: 'Grade 3',
                    points: <?php echo 'new Array(' . implode(',', $grade3) . ')'; ?>
                },
            ]
        });


        var chart2 = JSC.chart('TeacherDeptDiv', {
            debug: true,
            type: 'vertical column',
            palette: 'fiveColor10',
            yAxis: {
                scale_type: 'stacked',
                label_text: 'Teachers'
            },
            defaultPoint_outline_color: 'darkenMore',
            title_label: {
                text: 'Teachers per Department',
                style: {
                    fontFamily: 'Verdana',
                    color: 'black',
                    fontWeight: 200,
                    fontSize: 14
                }
            },
            xAxis: {
                label_text: 'Department',
                categories: ['SCIENCE', 'SOCIAL', 'LANGUAGE', 'MANDATORY']
            },
            series: [{
                    name: 'S1',
                    id: 's1',
                    points: <?php echo 'new Array(' . implode(',', $teacher1) . ')'; ?>
                },
                {
                    name: 'S2',
                    points: <?php echo 'new Array(' . implode(',', $teacher2) . ')'; ?>
                },
                {
                    name: 'S3',
                    points: <?php echo 'new Array(' . implode(',', $teacher3) . ')'; ?>
                },
            ]
        });


        var chart3 = JSC.chart('AvgTeacherSalDiv', {
            debug: true,
            type: 'horizontalColumn',
            palette: 'fiveColor10',
            title_label: {
                text: 'Average Teachers Salary',
                style: {
                    fontFamily: 'Verdana',
                    color: 'black',
                    fontWeight: 200,
                    fontSize: 20
                }
            },
            yAxis: {
                label_text: 'Salary'
            },
            xAxis: {
                label_text: 'Department',
                categories: ['SCIENCE', 'SOCIAL', 'LANGUAGE', 'MANDATORY']
            },
            series: [{
                    name: 'S1',
                    id: 's1',
                    points: <?php echo 'new Array(' . implode(',', $teacher_sal_avg1) . ')'; ?>
                },
                {
                    name: 'S2',
                    points: <?php echo 'new Array(' . implode(',', $teacher_sal_avg2) . ')'; ?>
                },
                {
                    name: 'S3',
                    points: <?php echo 'new Array(' . implode(',', $teacher_sal_avg3) . ')'; ?>
                }
            ]
        });


        var chart4 = JSC.chart('TeachersAccDiv', {
            debug: true,
            type: 'area spline',
            legend_position: 'bottom right',
            palette: 'fiveColor19',
            title_label: {
                text: 'Total Teachers Hired per Year',
                style: {
                    fontFamily: 'Verdana',
                    color: 'black',
                    fontWeight: 200,
                    fontSize: 20
                }
            },
            yAxis: {
                label_text: 'Teachers',
                // formatString: 'c',
                scale_type: 'stacked'
            },
            xAxis: {
                scale_type: 'time',
                crosshair: {
                    enabled: true,
                    label_text: '{%value:yyyy}'
                }
            },
            defaultSeries: {
                shape: {
                    opacity: 0.4,
                    /* Dynamic gradient that will work with any color series */
                    fill: ['lighten', 'darken', 90]
                },
                defaultPoint_marker: {
                    fill: 'white',
                    type: 'circle',
                    outline: {
                        width: 2
                    }
                }
            },

            series: [{
                    name: 'SCIENCE',
                    points: <?php echo '[';
                            for ($i = 0; $i < 15; $i++) {
                                echo "{ x: '" . $teacher_acc_modified[0][$i][0] . "', y: " . $teacher_acc_modified[0][$i][1] . " }";
                                if ($i < 14) {
                                    echo ', ';
                                }
                            }
                            echo ']';
                            ?>
                },
                {
                    name: 'SOCIAL',
                    points: <?php echo '[';
                            for ($i = 0; $i < 15; $i++) {
                                echo "{ x: '" . $teacher_acc_modified[1][$i][0] . "', y: " . $teacher_acc_modified[1][$i][1] . " }";
                                if ($i < 14) {
                                    echo ', ';
                                }
                            }
                            echo ']';
                            ?>
                },
                {
                    name: 'LANGUAGE',
                    points: <?php echo '[';
                            for ($i = 0; $i < 15; $i++) {
                                echo "{ x: '" . $teacher_acc_modified[2][$i][0] . "', y: " . $teacher_acc_modified[2][$i][1] . " }";
                                if ($i < 14) {
                                    echo ', ';
                                }
                            }
                            echo ']';
                            ?>
                },
                {
                    name: 'MANDATORY',
                    points: <?php echo '[';
                            for ($i = 0; $i < 15; $i++) {
                                echo "{ x: '" . $teacher_acc_modified[3][$i][0] . "', y: " . $teacher_acc_modified[3][$i][1] . " }";
                                if ($i < 14) {
                                    echo ', ';
                                }
                            }
                            echo ']';
                            ?>
                }
            ]
        });


        var chart = JSC.chart('AverageScoreGradeDeptDiv', {
            debug: true,
            defaultSeries: {
                type: 'pieDonut',
                shape_center: '50%,50%'
            },
            title: {
                label: {
                    text: 'Students Average Score by Grades and Departments',
                    style_fontSize: 22
                },
                position: 'center'
            },
            defaultPoint: {
                tooltip: '<b>%name</b><br>Average Score: <b>%value/100</b>'
            },
            legend: {
                template: '%value %icon %name',
                position: 'right'
            },
            series: [{
                    name: 'Grades',
                    points: [{
                            x: 'Grade 1',
                            y: <?php echo number_format((float)$avg_grade1, 2); ?>,
                            legendEntry: {
                                sortOrder: 1
                            }
                        },
                        {
                            x: 'Grade 2',
                            y: <?php echo number_format((float)$avg_grade2, 2); ?>,
                            legendEntry: {
                                sortOrder: 3,
                                lineAbove: true
                            }
                        },
                        {
                            x: 'Grade 3',
                            y: <?php echo number_format((float)$avg_grade3, 2); ?>,
                            legendEntry: {
                                sortOrder: 5,
                                lineAbove: true
                            }
                        }
                    ],
                    shape: {
                        innerSize: '5%',
                        size: '40%'
                    },
                    defaultPoint_label: {
                        text: '<b>%name</b>',
                        placement: 'inside'
                    },
                    palette: ['#66bb6a', '#ffca28', '#ef5350']
                },
                {
                    name: 'Departments',
                    points: [{
                            x: 'SCIENCE',
                            y: <?php echo number_format((float)$avg_grade1_science, 2); ?>,
                            legendEntry_sortOrder: 2,
                            attributes_year: '2016'
                        },
                        {
                            x: 'SOCIAL',
                            y: <?php echo number_format((float)$avg_grade1_social, 2); ?>,
                            legendEntry_sortOrder: 2,
                            attributes_year: '2016'
                        },
                        {
                            x: 'LANGUAGE',
                            y: <?php echo number_format((float)$avg_grade1_language, 2); ?>,
                            legendEntry_sortOrder: 2,
                            attributes_year: '2016'
                        },
                        {
                            x: 'SCIENCE',
                            y: <?php echo number_format((float)$avg_grade2_science, 2); ?>,
                            legendEntry_sortOrder: 4,
                            attributes_year: '2017'
                        },
                        {
                            x: 'SOCIAL',
                            y: <?php echo number_format((float)$avg_grade2_social, 2); ?>,
                            legendEntry_sortOrder: 4,
                            attributes_year: '2017'
                        },
                        {
                            x: 'LANGUAGE',
                            y: <?php echo number_format((float)$avg_grade2_language, 2); ?>,
                            legendEntry_sortOrder: 4,
                            attributes_year: '2017'
                        },
                        {
                            x: 'SCIENCE',
                            y: <?php echo number_format((float)$avg_grade3_science, 2); ?>,
                            legendEntry_sortOrder: 6,
                            attributes_year: '2018'
                        },
                        {
                            x: 'SOCIAL',
                            y: <?php echo number_format((float)$avg_grade3_social, 2); ?>,
                            legendEntry_sortOrder: 6,
                            attributes_year: '2018'
                        },
                        {
                            x: 'LANGUAGE',
                            y: <?php echo number_format((float)$avg_grade3_language, 2); ?>,
                            legendEntry_sortOrder: 6,
                            attributes_year: '2018'
                        }
                    ],
                    defaultPoint_tooltip: '<b>%name</b><br>Average Score: <b>%value/100</b>',
                    shape: {
                        innerSize: '55%',
                        size: '80%'
                    },
                    palette: JSC.colorToPalette(
                        '#66bb6a', {
                            lightness: 0.4
                        },
                        3,
                        0
                    ).concat(
                        JSC.colorToPalette(
                            '#ffca28', {
                                lightness: 0.4
                            },
                            3,
                            0
                        ),
                        JSC.colorToPalette(
                            '#ef5350', {
                                lightness: 0.4
                            },
                            3,
                            0
                        )
                    )
                }
            ]
        });


        var widget3 = new JSCWidgets.Circular(
            'chartDiv3', {
                title: '  Average Students Score',
                label: 'Score',
                color: '#E4C100',
                value: 0,
                icon: 'material/social/school',
                max: 100,
                valueText: '%value<span style="font-size:9.5px;">/{%max}</span>',
                // labelText: '{%max-%value} GB <br>Remaining',
                barWidth: 5
            },
            function(widget) {
                // Update the chart when the rendering thread is free.
                setTimeout(function() {
                    widget.options({
                        value: <?php echo number_format((float)$averageScore, 2); ?>
                    }, {
                        animation: {
                            duration: 2000
                        }
                    });
                }, 1);
            }
        );

        var widget4 = new JSCWidgets.Circular('chartDiv4', {
                title: 'Average Teachers Rating',
                label: 'Rating',
                icon: 'linearicons/smile',
                value: 0,
                max: 5,
                color: '#673AB7',
                valueText: '%value<span style="font-size:9.5px;">/{%max}</span>',
                labelPosition: 'inside',
                barWidth: 5,
                barRounded: true
            },
            function(widget) {
                // Update the chart when the rendering thread is free.
                setTimeout(function() {
                    widget.options({
                        value: <?php echo number_format((float) $rating_avg, 2); ?>
                    }, {
                        animation: {
                            duration: 2000
                        }
                    });
                }, 1);
            });









        // Corellation between students score and teachers rating
        var chart123 = JSC.chart('CorrDiv1', {
            type: 'marker',
            title_label_text: 'Correlation between Students Score and Average Teachers Rating',
            title_label_style: {
                fontFamily: 'Verdana',
                color: 'black',
                fontWeight: 200,
                fontSize: 16
            },
            legend: {
                visible: true
            },
            defaultPoint: {
                tooltip: '%xAxisLabel: <b>%xValue</b><br>%yAxisLabel: <b>%yValue</b>',
                opacity: 0.5,
                marker: {
                    type: 'circle',
                    outline_width: 0
                }
            },
            palette: {
                pointValue: function(p) {
                    return p.options('y');
                },
                colors: [
                    '#3e26a8', '#4538d7', '#484ff2', '#4367fd', '#2f80fa', '#2797eb',
                    '#1caadf', '#00b9c7', '#29c3aa', '#48cb86', '#81cc59', '#bbc42f',
                    '#eaba30', '#fec735', '#f5e128', '#f9fb15'
                ]
            },
            yAxis: {
                label_text: 'Students Score',
                alternateGridFill: 'none',
                scale: {
                    range: [63, 78],
                    interval: 4
                },
                line: {
                    width: 7,
                    color: 'smartPalette',
                    breaks_gap: 0.03
                },
                crosshair: {
                    enabled: true
                }
            },
            xAxis: {
                label_text: "Average Teachers Rating",
                scale: {
                    range: [1, 5],
                    interval: 1
                },
                defaultTick: {
                    label_text: '{%value}'
                }
            },
            chart_area: {
                margin_left: 60,
                margin_right: 20,
                margin_top: 20,
                margin_bottom: 60
            },
            series: [{
                points: <?php echo $corr_stud_teach; ?>
            }],
            toolbar_visible: false
        });
    </script>
</body>


</html>
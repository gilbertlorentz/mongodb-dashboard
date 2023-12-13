<?php

$conn = mysqli_connect("localhost", "root", "", "academic_data", 3306);

if ($conn->connect_error) {
    echo "Error: could no connect. " . mysqli_connect_error();
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

for($i = 0; $i < 1; $i++){
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
        }

        /* Style for individual chart divs */
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
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 0px;
            max-width: 900px;
            /* Adjust as needed */
            height: 510px;
            /* Adjust as needed */
        }

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
            height: 400px;
        }

        #widgetsWrapper {
            flex: 2;
            max-width: 440px;
        }

        #AvgTeacherSalDiv {
            flex: 2;
            max-width: 700px;
            height: 830px;
        }

        #StudentDeptDiv,
        #TeacherDeptDiv {
            flex: 1;
            max-width: 700px;
            height: 400px;
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
            padding: 20px;
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

    <div class="col-lg-12 justify-content-center" style="display: flex;">
        <div id="TeachersAccDiv"></div>
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
    </div>

    <div class="col-lg-12 justify-content-center" id="mainContainer">
        <div class="col-lg-6">
            <!-- Average Teachers Salary -->
            <div id="AvgTeacherSalDiv"></div>
        </div>
        <div class="col-lg-6 row">
            <div class="col-lg-12"><!-- Students per Dept -->
                <div id="StudentDeptDiv"></div>
            </div>
            <div class="col-lg-12"><!-- Teachers per Dept -->
                <div id="TeacherDeptDiv"></div>
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
                    fontSize: 20
                }
            },
            xAxis: {
                label_text: 'Department',
                categories: ['IPA', 'IPS', 'BAHASA']
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
                    fontSize: 20
                }
            },
            xAxis: {
                label_text: 'Department',
                categories: ['IPA', 'IPS', 'BAHASA', 'MANDATORY']
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
                categories: ['IPA', 'IPS', 'BAHASA', 'MANDATORY']
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
                    name: 'IPA',
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
                    name: 'IPS',
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






        // var widget2 = new JSCWidgets.Circular(
        //     'chartDiv2', {
        //         label: 'Signal Strength',
        //         value: 0.31,
        //         icon: 'material/notification/wifi',
        //         max: 1,
        //         color: '#E65100',
        //         valueFormat: 'p',
        //         valueText: '%value',
        //         barWidth: 2,
        //         barBackgroundWidth: 10,
        //         barBackgroundColor: 'rgba(255,121,52,0.2)'
        //     },
        //     function(widget) {
        //         // Update the chart when the rendering thread is free.
        //         setTimeout(function() {
        //             widget.options({
        //                 value: 0.75
        //             }, {
        //                 animation: {
        //                     duration: 1000
        //                 }
        //             });
        //         }, 1);
        //     }
        // );

        var widget3 = new JSCWidgets.Circular(
            'chartDiv3', {
                title: '  Average Students Score',
                label: 'Score',
                color: '#E4C100',
                value: 0,
                icon: 'material/social/school',
                max: 100,
                valueText: '%value',
                // labelText: '{%max-%value} GB <br>Remaining',
                barWidth: 5
            },
            function(widget) {
                // Update the chart when the rendering thread is free.
                setTimeout(function() {
                    widget.options({
                        value: <?php echo number_format((float) $averageScore, 2); ?>
                    }, {
                        animation: {
                            duration: 2000
                        }
                    });
                }, 1);
            }
        );

        var widget4 = new JSCWidgets.Circular('chartDiv4', {
            label: 'Progress',
            value: 85,
            max: 100,
            color: '#1bb045',
            valueText: '%value%',
            labelPosition: 'top',
            barWidth: 5,
            barRounded: false
        });

        // var chart5 = JSC.chart('CardDiv1', {
        //     debug: true,
        //     type: 'vertical column',
        //     palette: 'fiveColor10',
        //     yAxis: {
        //         scale_type: 'stacked',
        //         label_text: 'Teachers'
        //     },
        //     defaultPoint_outline_color: 'darkenMore',
        //     title_label: {
        //         // text: 'Average Teacher Salary',
        //         style: {
        //             fontFamily: 'Verdana',
        //             color: 'black',
        //             fontWeight: 200,
        //             fontSize: 20
        //         }
        //     },
        //     xAxis: {
        //         label_text: 'Department',
        //         categories: ['IPA', 'IPS', 'BAHASA', 'MANDATORY']
        //     },
        //     series: [{
        //             name: 'S1',
        //             id: 's1',
        //             points: <?php echo 'new Array(' . implode(',', $teacher1) . ')'; ?>
        //         },
        //         {
        //             name: 'S2',
        //             points: <?php echo 'new Array(' . implode(',', $teacher2) . ')'; ?>
        //         },
        //         {
        //             name: 'S3',
        //             points: <?php echo 'new Array(' . implode(',', $teacher3) . ')'; ?>
        //         },
        //     ]
        // });
    </script>

    <!-- Link to Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>


</html>
<?php
require_once 'autoload.php';

$conn = mysqli_connect("localhost", "root", "", "academic_data", 3306);

$client = new MongoDB\Client();
$departments = $client->academic_data->department;

$pipeline = [
    [
        '$unwind' => '$subjects',
    ],
    [
        '$unwind' => '$subjects.teachers_list',
    ],
    [
        '$unwind' => '$subjects.teachers_list.students_taught',
    ],
    [
        '$project' => [
            'teacher_id' => '$subjects.teachers_list.teacher_id',
            'scores' => '$subjects.teachers_list.students_taught.angket_score',
        ],
    ],
    [
        '$unwind' => '$scores',
    ],
    [
        '$group' => [
            '_id' => '$teacher_id',
            'averageRating' => ['$avg' => '$scores'],
        ],
    ],
    [
        '$sort' => ['averageRating' => -1],
    ],
    [
        '$limit' => 5,
    ],
    [
        '$project' => [
            '_id' => 1,
            'averageRating' => 1,
        ],
    ],
];

$pipeline2 = [
    [
        '$unwind' => '$subjects',
    ],
    [
        '$unwind' => '$subjects.teachers_list',
    ],
    [
        '$unwind' => '$subjects.teachers_list.students_taught',
    ],
    [
        '$project' => [
            'teacher_id' => '$subjects.teachers_list.teacher_id',
            'scores' => '$subjects.teachers_list.students_taught.angket_score',
        ],
    ],
    [
        '$unwind' => '$scores',
    ],
    [
        '$group' => [
            '_id' => '$teacher_id',
            'averageRating' => ['$avg' => '$scores'],
        ],
    ],
    [
        '$sort' => ['averageRating' => 1], // Change to ascending order
    ],
    [
        '$limit' => 5,
    ],
    [
        '$project' => [
            '_id' => 1,
            'averageRating' => 1,
        ],
    ],
];

$pipeline3 = [
    [
        '$unwind' => '$subjects',
    ],
    [
        '$unwind' => '$subjects.teachers_list',
    ],
    [
        '$unwind' => '$subjects.teachers_list.students_taught',
    ],
    [
        '$project' => [
            'teacher_id' => '$subjects.teachers_list.teacher_id',
            'scores' => '$subjects.teachers_list.students_taught.angket_score',
        ],
    ],
    [
        '$unwind' => '$scores',
    ],
    [
        '$group' => [
            '_id' => '$teacher_id',
            'averageRating' => ['$avg' => '$scores'],
        ],
    ],
    [
        '$project' => [
            '_id' => 1,
            'averageRating' => 1,
        ],
    ],
];



$result = $departments->aggregate($pipeline);
$result2 = $departments->aggregate($pipeline2);
$result3 = $departments->aggregate($pipeline3);



?>
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

<body>
    <button class="btn mx-3 mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 300px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="font-size: larger;">Academic Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="nav-link" href="home.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Home</a>
            <a class="nav-link" aria-current="page" href="student.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
            <a class="nav-link" aria-current="page" href="nilai.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Grade</a>
        </div>
    </div>

    <h1 class="text-center pt-1" style="font-family: fantasy; font-size:60px; color:#d65e5e">TEACHER DATA</h1>

    <div class="container justify-content-center">
        <form class="row" style="align-items: center;" action="" method="post">
            <div class="col w-100">
                <label for="degree" class="form-label" id="labelDegree">Degree</label>
                <select style="width:100%" id="degree" class="form-select" aria-label="Default select example" name="degree">
                    <option value="">Select All</option>
                    <option>S1</option>
                    <option>S2</option>
                    <option>S3</option>
                </select>
            </div>
            <div class="col">
                <div class="col">
                    <label for="department" class="form-label" id="labelDepartment">Department</label>
                    <select class="form-select" id="department" aria-label="Default select example" name="department">
                        <option value="">Select All</option>
                        <option>Science</option>
                        <option>Social</option>
                        <option>Language</option>
                        <option>Mandatory</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="d-flex" style="margin-top: 30px;">
                    <div class="align-items-left">
                        <button type="submit" class="btn" style="background-color:#2875d4; color:white; font:x-large" id="filter">Filter</button>
                    </div>
                    <div class="align-items-right" style="margin-left: 100px;">
                        <button type="submit" class="btn" id="table" style="background-color:#6fd675; color:white; font:x-large">View Table</button>
                    </div>
                    <div class="align-items-right" style="margin-left: 18px;">
                        <button type="submit" class="btn" id="report" style="background-color:#6fd675; color:white; font:x-large">View Reporting</button>
                    </div>

                </div>
            </div>
    </div>

    </form>
    </div>



    <section class="intro">
        <div class="bg-image h-100">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card" id="card2" style="display: none; margin: 20px 0;">
                                <div class="card-body p-0">
                                    <h3 style="text-align: center; margin-bottom: 20px;">Top 5 Teachers with the Highest Rating</h3>
                                    <div class="table-responsive table-scroll" id="rankTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 200px; display: none;">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #002d72;">
                                                <th scope="col">Rank</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Rating</th>
                                            </thead>
                                            <?php
                                            $rowNumber = 1;
                                            foreach ($result as $document) {
                                                echo '<tr>';
                                                echo "<td>" . $rowNumber . "</td>"; // Display the row number
                                                echo '<td>' . $document['_id'] . '</td>';
                                                $teacherId = $document['_id']; // Assuming 'teacher_id' is the field storing teacher ID in your documents
                                                $sql = "SELECT full_name FROM teacher WHERE teacher_id = '$teacherId'";
                                                $teacherResult = mysqli_query($conn, $sql);
                                                $teacherRow = mysqli_fetch_assoc($teacherResult);
                                                $teacherFullName = $teacherRow['full_name'];

                                                echo '<td>' . $teacherFullName . '</td>';
                                                echo '<td>' . $document['averageRating'] . '</td>';
                                                echo '</tr>';

                                                $rowNumber += 1;

                                                if ($rowNumber > 10) {
                                                    break;
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="card3" style="display: none; margin: 20px 0;">
                                <div class="card-body p-0">
                                    <h3 style="text-align: center; margin-bottom: 20px;">Top 5 Teachers with the Lowest Rating</h3>
                                    <div class="table-responsive table-scroll" id="lowestTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 200px; display: none;">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #002d72;">
                                                <th scope="col">Rank</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Rating</th>
                                            </thead>
                                            <?php
                                            $rowNumber = 1;
                                            foreach ($result2 as $document) {
                                                echo '<tr>';
                                                echo "<td>" . $rowNumber . "</td>"; // Display the row number
                                                echo '<td>' . $document['_id'] . '</td>';
                                                $teacherId = $document['_id']; // Assuming 'teacher_id' is the field storing teacher ID in your documents
                                                $sql = "SELECT full_name FROM teacher WHERE teacher_id = '$teacherId'";
                                                $teacherResult = mysqli_query($conn, $sql);
                                                $teacherRow = mysqli_fetch_assoc($teacherResult);
                                                $teacherFullName = $teacherRow['full_name'];

                                                echo '<td>' . $teacherFullName . '</td>';
                                                echo '<td>' . $document['averageRating'] . '</td>';
                                                echo '</tr>';

                                                $rowNumber += 1;

                                                if ($rowNumber > 10) {
                                                    break;
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="card1">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" id="bigTable" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px; visibility:visible">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #002d72;">
                                                <tr>
                                                    <th scope="col">Num</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Degree</th>
                                                    <th scope="col">Hire Date</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Salary (month)</th>
                                                    <th scope="col">Rating</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (!empty($_POST['degree'])) {
                                                        if ($_POST['degree'] == 'S1') {
                                                            $degree = 'S1';
                                                        } elseif ($_POST['degree'] == 'S2') {
                                                            $degree = 'S2';
                                                        } elseif ($_POST['degree'] == 'S3') {
                                                            $degree = 'S3';
                                                        }
                                                    }
                                                    if (!empty($_POST['department'])) {
                                                        if ($_POST['department'] == 'Science') {
                                                            $department = 1;
                                                        } elseif ($_POST['department'] == 'Social') {
                                                            $department = 2;
                                                        } elseif ($_POST['department'] == 'Language') {
                                                            $department = 3;
                                                        } elseif ($_POST['department'] == 'Mandatory') {
                                                            $department = 4;
                                                        }
                                                    }
                                                }


                                                if (!empty($degree) && !empty($department)) {
                                                    $sql = "SELECT * FROM teacher WHERE degree = ? AND department_id = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("ss", $degree, $department);
                                                } elseif (!empty($degree)) {
                                                    $sql = "SELECT * FROM teacher WHERE degree = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("s", $degree);
                                                } elseif (!empty($department)) {
                                                    $sql = "SELECT * FROM teacher WHERE department_id = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("s", $department);
                                                } else {
                                                    $sql = "SELECT * FROM teacher";
                                                    $stmt = $conn->prepare($sql);
                                                }

                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $stmt->close();

                                                $rowCount = 1;
                                                $result3Array = iterator_to_array($result3);

                                                // Assuming $result is the result from the SQL query and $result3Array is the MongoDB ratings result
                                                while ($row = $result->fetch_assoc()) {
                                                    $rowCount++;
                                                ?>
                                                    <tr>
                                                        <td><?= $rowCount ?></td>
                                                        <td><?= $row['teacher_id'] ?></td>
                                                        <td><?= $row['full_name'] ?></td>
                                                        <td><?= $row['degree'] ?></td>
                                                        <td><?= $row['hire_date'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['department_id'] == 1) {
                                                                echo "Science";
                                                            } elseif ($row['department_id'] == 2) {
                                                                echo "Social";
                                                            } elseif ($row['department_id'] == 3) {
                                                                echo "Language";
                                                            } elseif ($row['department_id'] == 4) {
                                                                echo "Mandatory";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $row['salary_per_mon'] ?></td>
                                                        <td>
                                                            <?php
                                                            // Assuming $row['_id'] corresponds to teacher_id and $row3['averageRating'] to the rating
                                                            $mongoTeacherRating = findMongoRatingById($result3Array, $row['teacher_id']);
                                                            echo isset($mongoTeacherRating['averageRating']) ? $mongoTeacherRating['averageRating'] : 'N/A';
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }

                                                function findMongoRatingById($result3Array, $teacherId)
                                                {
                                                    foreach ($result3Array as $row3) {
                                                        if ($row3['_id'] == $teacherId) {
                                                            return $row3;
                                                        }
                                                    }
                                                    return null;
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
        </div>
    </section>
    <script>
        document.getElementById('report').onclick = function() {
            event.preventDefault()
            document.getElementById('card1').style.display = 'none';
            document.getElementById('bigTable').style.display = 'none';
            document.getElementById('labelDegree').style.visibility = 'hidden';
            document.getElementById('department').style.visibility = 'hidden';
            document.getElementById('degree').style.visibility = 'hidden';
            document.getElementById('filter').style.visibility = 'hidden';
            document.getElementById('labelDepartment').style.visibility = 'hidden';
            document.getElementById('card2').style.display = 'flex';
            document.getElementById('card3').style.display = 'flex';
            document.getElementById('rankTable').style.display = 'flex';
            document.getElementById('lowestTable').style.display = 'flex';

        }
        document.getElementById('table').onclick = function() {
            document.getElementById('card2').style.display = 'flex';
            document.getElementById('bigTable').style.display = 'flex';
        }
    </script>
</body>


</html>
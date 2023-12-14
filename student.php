<?php

require_once 'autoload.php';

$client = new MongoDB\Client();
$exam_data = $client->academic_data->exam;

$conn = mysqli_connect("localhost", "root", "", "academic_data", 3306);

if ($conn->connect_error) {
    echo "Error: could no connect. " . mysqli_connect_error();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/421f6f321f.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>

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
            <a class="nav-link" aria-current="page" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="teacher.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
            <a class="nav-link" href="nilai.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Grade</a>
        </div>
    </div>
    <h1 class="text-center pt-1" style="font-family: fantasy; font-size:60px; color:green">STUDENT DATA</h1>
    <div class="container d-flex justify-content-center">
        <form class="row" action="" method="post">
            <div class="col-sm">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" aria-label="Default select example" name="JurusanInput">
                    <option value="">All</option>
                    <option>Science</option>
                    <option>Social Science</option>
                    <option>Language</option>
                </select>
            </div>
            <div class="col-sm">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" aria-label="Default select example" name="KelasInput">
                    <option value="">All</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="mt-3">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</i></th>
                    <th scope="col">RANK</i></th>
                    <th scope="col">Student ID</i></th>
                    <th scope="col">Full Name</i></th>
                    <th scope="col">Batch</i></th>
                    <th scope="col">Email</i></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!empty($_POST['JurusanInput'])) {
                        if ($_POST['JurusanInput'] == 'Science') {
                            $jurusan = 1;
                        } elseif ($_POST['JurusanInput'] == 'Social Science') {
                            $jurusan = 2;
                        } elseif ($_POST['JurusanInput'] == 'Language') {
                            $jurusan = 3;
                        }
                    }
                    if (!empty($_POST['KelasInput'])) {
                        $kelas = $_POST['KelasInput'];
                    }
                }

                if (!empty($kelas) && !empty($jurusan)) {
                    $sql = "SELECT * FROM student WHERE department_id = " . $jurusan . " and grade = " . $kelas;
                } elseif (!empty($kelas)) {
                    $sql = "SELECT * FROM student WHERE grade = " . $kelas;
                } elseif (!empty($jurusan)) {
                    $sql = "SELECT * FROM student WHERE department_id = " . $jurusan;
                } else {
                    $sql = "SELECT * FROM student";
                }

                // $sql = "SELECT * FROM student WHERE student_id <170";
                $rowCount = 0;

                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $rowCount++;
                    if ($row['department_id'] == 1) {
                        $jurusan_monggo = 'Science';
                    } elseif ($row['department_id'] == 2) {
                        $jurusan_monggo = 'Social';
                    } elseif ($row['department_id'] == 3) {
                        $jurusan_monggo = 'Language';
                    }
                    $get_rank =
                        [
                            [
                                '$unwind' => '$SCORE_DATA',
                            ],
                            [
                                '$match' => [
                                    'GRADE' => intval($row['grade']),
                                    'DEPARTMENT' => $jurusan_monggo,
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
                        if ($document['_id'] == $row['student_id']) {
                            $rank = $index + 1;
                            break;
                        }
                    }
                ?>
                    <tr>
                        <td><?= $rowCount ?></td>
                        <td><?= $rank ?></td>
                        <td><?= $row['visual_only'] ?></td>
                        <td><?= $row['full_name'] ?></td>
                        <td><?= $row['student_reg_year'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="redirectToDetailPage(<?= $row['student_id'] ?>)">Detail</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
<!-- Script JS -->
<script src="./js/script.js"></script>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("sortable")[0];
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function redirectToDetailPage(studentID) {
        var encodedStudentID = encodeURIComponent(studentID);

        window.location.href = 'detail.php?student_id=' + encodedStudentID;
    }
</script>

</html>
<?php

$conn = mysqli_connect("localhost", "root", "", "academic_data", 3306);

if ($conn->connect_error) {
    echo "Error: could no connect. " . mysqli_connect_error();
}

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
// print_r($grade1);
// $conn->close();
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
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
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
            <a class="nav-link" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Home</a>
            <a class="nav-link" aria-current="page" href="student.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="teacher.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
        </div>
    </div>

    <h1 class="text-center pt-1" style="font-family: fantasy; font-size:60px; color:brown">DASHBOARD</h1>
    <div id="chartDiv" style="max-width: 740px;height: 400px;margin: 0px auto">
    </div>
    <script>
        var chart = JSC.chart('chartDiv', {
            debug: true,
            type: 'vertical column',
            palette: 'fiveColor7',
            yAxis: {
                scale_type: 'stacked',
                label_text: 'Students'
            },
            defaultPoint_outline_color: 'darkenMore',
            title_label_text: 'Student Data',
            xAxis: {
                label_text: 'Department',
                categories: ['IPA', 'IPS', 'BAHASA']
            },
            series: [{
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
    </script>
</body>


</html>
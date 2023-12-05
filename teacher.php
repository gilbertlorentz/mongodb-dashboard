<?php

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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/421f6f321f.js" crossorigin="anonymous"></script>
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
            <a class="nav-link" aria-current="page" href="student.php" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Student</a>
            <a class="nav-link" href="#" style="border-bottom: 1px solid #ccc; padding: 8px 0; font-size:large;">Teacher</a>
        </div>
    </div>

    <h1 class="text-center pt-1" style="font-family: fantasy; font-size:60px; color:RED">TEACHER DATA</h1>

</body>


</html>
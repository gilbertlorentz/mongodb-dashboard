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

$conditionsphys1 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

// Projection
$projection = [
    "SCORE_DATA.student_id" => 1,
    "SCORE_DATA.scores.score1" => 1,
    "SCORE_DATA.scores.score2" => 1,
    "EXAM_TYPE" => 1, // Include the "EXAM_TYPE" field
    "_id" => 0
];

$cursorphys1 = $exams->find($conditionsphys1, ['projection' => $projection]);

$conditionsphys1Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],

];

$cursorphys1Sem2 = $exams->find($conditionsphys1Sem2, ['projection' => $projection]);

$conditionsbio1 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Biology",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorbio1 = $exams->find($conditionsbio1, ['projection' => $projection]);

$conditionsbio1Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Biology",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],

];

$cursorbio1Sem2 = $exams->find($conditionsbio1Sem2, ['projection' => $projection]);

$conditionsmath1 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Mathematics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursormath1 = $exams->find($conditionsmath1, ['projection' => $projection]);

$conditionsmath1Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Mathematics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursormath1Sem2 = $exams->find($conditionsmath1Sem2, ['projection' => $projection]);

$conditionschem1 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Chemistry",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorchem1 = $exams->find($conditionschem1, ['projection' => $projection]);

$conditionschem1Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 1,
    "SUBJECT" => "Chemistry",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorchem1Sem2 = $exams->find($conditionschem1Sem2, ['projection' => $projection]);


$conditionsphys2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => ['$in' => ["Test2.1", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorphys2 = $exams->find($conditionsphys2, ['projection' => $projection]);

$conditionsphys2Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => ['$in' => ["Test2.2", "Test2.3", "Mid Exam3", "Final Exam3"]],
];

$cursorphys2Sem2 = $exams->find($conditionsphys2Sem2, ['projection' => $projection]);

$conditionsbio2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Biology",
    "EXAM_TYPE" => ['$in' => ["Test2.1", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorbio2 = $exams->find($conditionsbio2, ['projection' => $projection]);

$conditionsbio2Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Biology",
    "EXAM_TYPE" => ['$in' => ["Test2.2", "Test2.3", "Mid Exam3", "Final Exam3"]],
];

$cursorbio2Sem2 = $exams->find($conditionsbio2Sem2, ['projection' => $projection]);

$conditionsmath2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Mathematics",
    "EXAM_TYPE" => ['$in' => ["Test2.1", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursormath2 = $exams->find($conditionsmath2, ['projection' => $projection]);

$conditionsmath2Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Mathematics",
    "EXAM_TYPE" => ['$in' => ["Test2.2", "Test2.3", "Mid Exam3", "Final Exam3"]],
];

$cursormath2Sem2 = $exams->find($conditionsmath2Sem2, ['projection' => $projection]);

$conditionschem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Chemistry",
    "EXAM_TYPE" => ['$in' => ["Test2.1", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorchem2 = $exams->find($conditionschem2, ['projection' => $projection]);

$conditionschem2Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 2,
    "SUBJECT" => "Chemistry",
    "EXAM_TYPE" => ['$in' => ["Test2.2", "Test2.3", "Mid Exam3", "Final Exam3"]],
];

$cursorchem2Sem2 = $exams->find($conditionschem2Sem2, ['projection' => $projection]);

$conditionsphys3 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorphys3 = $exams->find($conditionsphys3, ['projection' => $projection]);

$conditionsphys3Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Physics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorphys3Sem2 = $exams->find($conditionsphys3Sem2, ['projection' => $projection]);

$conditionsbio3 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Biology",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorbio3 = $exams->find($conditionsbio3, ['projection' => $projection]);

$conditionsbio3Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Biology",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorbio3Sem2 = $exams->find($conditionsbio3Sem2, ['projection' => $projection]);

$conditionsmath3 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Mathematics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursormath3 = $exams->find($conditionsmath3, ['projection' => $projection]);

$conditionsmath3Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Mathematics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursormath3Sem2 = $exams->find($conditionsmath3Sem2, ['projection' => $projection]);

$conditionschem3 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Chemistry",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorchem3 = $exams->find($conditionschem3, ['projection' => $projection]);

$conditionschem3Sem2 = [
    "DEPARTMENT" => "Science",
    "GRADE" => 3,
    "SUBJECT" => "Chemistry",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorchem3Sem2 = $exams->find($conditionschem3Sem2, ['projection' => $projection]);

$conditionseco1 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Economics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursoreco1 = $exams->find($conditionseco1, ['projection' => $projection]);

$conditionseco1Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Economics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursoreco1Sem2 = $exams->find($conditionseco1Sem2, ['projection' => $projection]);


$conditionsacc1 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Accounting",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursoracc1 = $exams->find($conditionsacc1, ['projection' => $projection]);

$conditionsacc1Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Accounting",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursoracc1Sem2 = $exams->find($conditionsacc1Sem2, ['projection' => $projection]);

$conditionsoc1 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Sociology", // Change SUBJECT to "Sociology"
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorsoc1 = $exams->find($conditionsoc1, ['projection' => $projection]);

$conditionsoc1Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Sociology", // Change SUBJECT to "Sociology"
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorsoc1Sem2 = $exams->find($conditionsoc1Sem2, ['projection' => $projection]);

$conditiongeo1 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Geography", // Change SUBJECT to "Geography"
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorgeo1 = $exams->find($conditiongeo1, ['projection' => $projection]);

$conditiongeo1Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 1,
    "SUBJECT" => "Geography", // Change SUBJECT to "Geography"
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorgeo1Sem2 = $exams->find($conditiongeo1Sem2, ['projection' => $projection]);

// Grade 2 - Economics
$conditionseco2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Economics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursoreco2 = $exams->find($conditionseco2, ['projection' => $projection]);

$conditionseco2Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Economics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursoreco2Sem2 = $exams->find($conditionseco2Sem2, ['projection' => $projection]);


// Grade 2 - Accounting
$conditionsacc2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Accounting",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursoracc2 = $exams->find($conditionsacc2, ['projection' => $projection]);

$conditionsacc2Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Accounting",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursoracc2Sem2 = $exams->find($conditionsacc2Sem2, ['projection' => $projection]);


// Grade 2 - Sociology
$conditionsoc2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Sociology",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorsoc2 = $exams->find($conditionsoc2, ['projection' => $projection]);

$conditionsoc2Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Sociology",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorsoc2Sem2 = $exams->find($conditionsoc2Sem2, ['projection' => $projection]);


$conditiongeo2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Geography",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorgeo2 = $exams->find($conditiongeo2, ['projection' => $projection]);

$conditiongeo2Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 2,
    "SUBJECT" => "Geography",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorgeo2Sem2 = $exams->find($conditiongeo2Sem2, ['projection' => $projection]);

$conditionseco3 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Economics",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursoreco3 = $exams->find($conditionseco3, ['projection' => $projection]);

$conditionseco3Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Economics",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursoreco3Sem2 = $exams->find($conditionseco3Sem2, ['projection' => $projection]);


$conditionsacc3 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Accounting",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursoracc3 = $exams->find($conditionsacc3, ['projection' => $projection]);

$conditionsacc3Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Accounting",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursoracc3Sem2 = $exams->find($conditionsacc3Sem2, ['projection' => $projection]);


// Grade 3 - Sociology
$conditionsoc3 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Sociology",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorsoc3 = $exams->find($conditionsoc3, ['projection' => $projection]);

$conditionsoc3Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Sociology",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorsoc3Sem2 = $exams->find($conditionsoc3Sem2, ['projection' => $projection]);


// Grade 3 - Geography
$conditiongeo3 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Geography",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorgeo3 = $exams->find($conditiongeo3, ['projection' => $projection]);

$conditiongeo3Sem2 = [
    "DEPARTMENT" => "Social",
    "GRADE" => 3,
    "SUBJECT" => "Geography",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorgeo3Sem2 = $exams->find($conditiongeo3Sem2, ['projection' => $projection]);

$conditionskor1 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "Korean", // Change SUBJECT to "Korean"
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorkor1 = $exams->find($conditionskor1, ['projection' => $projection]);

$conditionskor1Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "Korean", // Change SUBJECT to "Korean"
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorkor1Sem2 = $exams->find($conditionskor1Sem2, ['projection' => $projection]);


$conditionsman1 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "Mandarin",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorman1 = $exams->find($conditionsman1, ['projection' => $projection]);

$conditionsman1Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "Mandarin",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorman1Sem2 = $exams->find($conditionsman1Sem2, ['projection' => $projection]);


$conditionsfre1 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "French",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorfre1 = $exams->find($conditionsfre1, ['projection' => $projection]);

$conditionsfre1Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "French",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorfre1Sem2 = $exams->find($conditionsfre1Sem2, ['projection' => $projection]);



$conditionsger1 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "German",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorger1 = $exams->find($conditionsger1, ['projection' => $projection]);

$conditionsger1Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 1,
    "SUBJECT" => "German",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorger1Sem2 = $exams->find($conditionsger1Sem2, ['projection' => $projection]);

$conditionskor2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "Korean", // Change SUBJECT to "Korean"
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorkor2 = $exams->find($conditionskor2, ['projection' => $projection]);

$conditionskor2Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "Korean", // Change SUBJECT to "Korean"
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorkor2Sem2 = $exams->find($conditionskor2Sem2, ['projection' => $projection]);


// Grade 2 - Mandarin (formerly Accounting)
$conditionsman2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "Mandarin",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorman2 = $exams->find($conditionsman2, ['projection' => $projection]);

$conditionsman2Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "Mandarin",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorman2Sem2 = $exams->find($conditionsman2Sem2, ['projection' => $projection]);


$conditionsfre2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "French",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorfre2 = $exams->find($conditionsfre2, ['projection' => $projection]);

$conditionsfre2Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "French",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorfre2Sem2 = $exams->find($conditionsfre2Sem2, ['projection' => $projection]);


$conditionsger2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "German",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorger2 = $exams->find($conditionsger2, ['projection' => $projection]);

$conditionsger2Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 2,
    "SUBJECT" => "German",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorger2Sem2 = $exams->find($conditionsger2Sem2, ['projection' => $projection]);

// Grade 3 - Korean (formerly Economics)
$conditionskor3 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "Korean",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorkor3 = $exams->find($conditionskor3, ['projection' => $projection]);

$conditionskor3Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "Korean",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorkor3Sem2 = $exams->find($conditionskor3Sem2, ['projection' => $projection]);


$conditionsman3 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "Mandarin",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorman3 = $exams->find($conditionsman3, ['projection' => $projection]);

$conditionsman3Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "Mandarin",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorman3Sem2 = $exams->find($conditionsman3Sem2, ['projection' => $projection]);


$conditionsfre3 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "French",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorfre3 = $exams->find($conditionsfre3, ['projection' => $projection]);

$conditionsfre3Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "French",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorfre3Sem2 = $exams->find($conditionsfre3Sem2, ['projection' => $projection]);


$conditionsger3 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "German",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorger3 = $exams->find($conditionsger3, ['projection' => $projection]);

$conditionsger3Sem2 = [
    "DEPARTMENT" => "Language",
    "GRADE" => 3,
    "SUBJECT" => "German",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorger3Sem2 = $exams->find($conditionsger3Sem2, ['projection' => $projection]);

$conditionsart1 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "Art",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorart1 = $exams->find($conditionsart1, ['projection' => $projection]);

$conditionsart1Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "Art",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorart1Sem2 = $exams->find($conditionsart1Sem2, ['projection' => $projection]);


$conditionsind1 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "Indonesian",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorind1 = $exams->find($conditionsind1, ['projection' => $projection]);

$conditionsind1Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "Indonesian",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorind1Sem2 = $exams->find($conditionsind1Sem2, ['projection' => $projection]);


$conditionshist1 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "History",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorhist1 = $exams->find($conditionshist1, ['projection' => $projection]);

$conditionshist1Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "History",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorhist1Sem2 = $exams->find($conditionshist1Sem2, ['projection' => $projection]);


$conditionsciv1 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "Civic",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorciv1 = $exams->find($conditionsciv1, ['projection' => $projection]);

$conditionsciv1Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 1,
    "SUBJECT" => "Civic",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorciv1Sem2 = $exams->find($conditionsciv1Sem2, ['projection' => $projection]);


$conditionsart2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "Art",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorart2 = $exams->find($conditionsart2, ['projection' => $projection]);

$conditionsart2Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "Art",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorart2Sem2 = $exams->find($conditionsart2Sem2, ['projection' => $projection]);



$conditionsind2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "Indonesian",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorind2 = $exams->find($conditionsind2, ['projection' => $projection]);

$conditionsind2Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "Indonesian",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorind2Sem2 = $exams->find($conditionsind2Sem2, ['projection' => $projection]);


$conditionshist2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "History",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorhist2 = $exams->find($conditionshist2, ['projection' => $projection]);

$conditionshist2Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "History",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorhist2Sem2 = $exams->find($conditionshist2Sem2, ['projection' => $projection]);


$conditionsciv2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "Civic",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorciv2 = $exams->find($conditionsciv2, ['projection' => $projection]);

$conditionsciv2Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 2,
    "SUBJECT" => "Civic",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorciv2Sem2 = $exams->find($conditionsciv2Sem2, ['projection' => $projection]);

$conditionsart3 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "Art",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorart3 = $exams->find($conditionsart3, ['projection' => $projection]);

$conditionsart3Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "Art",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorart3Sem2 = $exams->find($conditionsart3Sem2, ['projection' => $projection]);


$conditionsind3 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "Indonesian",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorind3 = $exams->find($conditionsind3, ['projection' => $projection]);

$conditionsind3Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "Indonesian",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorind3Sem2 = $exams->find($conditionsind3Sem2, ['projection' => $projection]);


$conditionshist3 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "History",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorhist3 = $exams->find($conditionshist3, ['projection' => $projection]);

$conditionshist3Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "History",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorhist3Sem2 = $exams->find($conditionshist3Sem2, ['projection' => $projection]);


$conditionsciv3 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "Civic",
    "EXAM_TYPE" => ['$in' => ["Test1.1", "Test2.1", "Mid Exam1", "Final Exam1"]],
];

$cursorciv3 = $exams->find($conditionsciv3, ['projection' => $projection]);

$conditionsciv3Sem2 = [
    "DEPARTMENT" => "Mandatory",
    "GRADE" => 3,
    "SUBJECT" => "Civic",
    "EXAM_TYPE" => ['$in' => ["Test1.2", "Test2.2", "Mid Exam2", "Final Exam2"]],
];

$cursorciv3Sem2 = $exams->find($conditionsciv3Sem2, ['projection' => $projection]);




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
            <h2 class="accordion-header" id="headingsains">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesains" aria-expanded="true" aria-controls="collapsesains">
                    Science
                </button>
            </h2>
            <div id="collapsesains" class="accordion-collapse collapse hide" aria-labelledby="headingsains" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="accordion" id="sub-accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sub-headingsains-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapsesains-1" aria-expanded="true" aria-controls="sub-collapsesains-1">
                                    Grade 1
                                </button>
                            </h2>
                            <div id="sub-collapsesains-1" class="accordion-collapse collapse hide" aria-labelledby="sub-headingsains-1" data-bs-parent="#sub-accordionExample">
                                <div class="accordion-body">
                                    <div class="accordion" id="nested-sub-accordionExample">
                                        <!-- Nested Nested Accordion Item #1 -->
                                        <div class="accordion science-phys-1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="nested-sub-heading-phys-1">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapse-phys-1" aria-expanded="false" aria-controls="nested-sub-collapse-phys-1">
                                                        Physics
                                                    </button>
                                                </h2>
                                                <div id="nested-sub-collapse-phys-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-heading-phys-1" data-bs-parent="#nested-sub-accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="accordion science-phys-1" id="nested-sub-nested-accordionExample1">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-heading-phys-1">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse-phys-1-1" aria-expanded="false" aria-controls="nested-sub-nested-collapse-phys-1-1">
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapse-phys-1-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading-phys-1-1" data-bs-parent="#nested-sub-accordion-phys-1-1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorphys1 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                            <div class="accordion science-phys-1" id="nested-sub-nested-accordionExample2">
                                                                <div class="accordion" id="nested-sub-nested-accordionExample3">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nested-sub-nested-headingThree">
                                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseThree" aria-expanded="false" aria-controls="nested-sub-nested-collapseThree">
                                                                                Second Semester
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nested-sub-nested-collapseThree" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingThree" data-bs-parent="#nested-sub-nested-accordionExample3">
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
                                                                                                                        <thead style="background-color: #fff;">
                                                                                                                            <th scope="col">Student ID</th>
                                                                                                                            <th scope="col">Full Name</th>
                                                                                                                            <th scope="col">Score</th>
                                                                                                                            <th scope="col">Exam</th>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <?php
                                                                                                                            foreach ($cursorphys1Sem2 as $exam) {
                                                                                                                                foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                    $studentId = $scoreData['student_id'];
                                                                                                                                    $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    $fullName = $row['full_name'];
                                                                                                                                    $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                    $examtype = $exam['EXAM_TYPE'];

                                                                                                                                    echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                            </div>



                                            <!-- Nested Nested Accordion Item #2 -->
                                            <!-- Nested Accordion Item #2 -->
                                            <div class="accordion" id="nested-sub-accordionExample2">
                                                <div class="accordion science-bio-1">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="nested-sub-headingTwo">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseTwo" aria-expanded="false" aria-controls="nested-sub-collapseTwo">
                                                                Biology
                                                            </button>
                                                        </h2>
                                                        <div id="nested-sub-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-headingTwo" data-bs-parent="#nested-sub-accordionExample">
                                                            <div class="accordion-body">
                                                                <!-- Nested Nested Accordion Item #1 -->
                                                                <div class="accordion science-bio-1" id="nested-sub-nested-accordionExample1">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                                First Semester
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                        <thead style="background-color: #fff;">
                                                                                                                            <th scope="col">Student ID</th>
                                                                                                                            <th scope="col">Full Name</th>
                                                                                                                            <th scope="col">Score</th>
                                                                                                                            <th scope="col">Exam</th>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <?php
                                                                                                                            foreach ($cursorbio1 as $exam) {
                                                                                                                                foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                    $studentId = $scoreData['student_id'];
                                                                                                                                    $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    $fullName = $row['full_name'];
                                                                                                                                    $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                    $examtype = $exam['EXAM_TYPE'];

                                                                                                                                    echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                                                <!-- Nested Nested Accordion Item #2 -->
                                                                <div class="accordion science-bio-1" id="nested-sub-nested-accordionExample2">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                                Second Semester
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                        <thead style="background-color: #fff;">
                                                                                                                            <th scope="col">Student ID</th>
                                                                                                                            <th scope="col">Full Name</th>
                                                                                                                            <th scope="col">Score</th>
                                                                                                                            <th scope="col">Exam</th>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <?php
                                                                                                                            foreach ($cursorbio1Sem2 as $exam) {
                                                                                                                                foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                    $studentId = $scoreData['student_id'];
                                                                                                                                    $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    $fullName = $row['full_name'];
                                                                                                                                    $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                    $examtype = $exam['EXAM_TYPE'];

                                                                                                                                    echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                            First Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursormath1 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                <!-- Add more nested nested accordion items as needed -->
                                                            </div>

                                                            <!-- Nested Nested Accordion Item #2 -->
                                                            <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                            Second Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursormath1Sem2 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorchem1 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                            <!-- Add more content or nested nested accordion items as needed -->
                                                        </div>

                                                        <!-- Nested Nested Accordion Item #2 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="true" aria-controls="nested-sub-nested-collapseTwo">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorchem1Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorphys2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorphys2Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="nested-sub-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseTwo" aria-expanded="false" aria-controls="nested-sub-collapseTwo">
                                                    Biology
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-headingTwo" data-bs-parent="#nested-sub-accordionExample1">
                                                <div class="accordion-body">
                                                    <!-- Nested Nested Accordion Item #1 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                        <thead style="background-color: #fff;">
                                                                                                            <th scope="col">Student ID</th>
                                                                                                            <th scope="col">Full Name</th>
                                                                                                            <th scope="col">Score</th>
                                                                                                            <th scope="col">Exam</th>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <?php
                                                                                                            foreach ($cursorbio2 as $exam) {
                                                                                                                foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                    $studentId = $scoreData['student_id'];
                                                                                                                    $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                    $fullName = $row['full_name'];
                                                                                                                    $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                    $examtype = $exam['EXAM_TYPE'];

                                                                                                                    echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                    <!-- Nested Nested Accordion Item #2 -->
                                                    <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorbio2Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                        <div class="accordion-item science-math-2">
                                            <h2 class="accordion-header" id="nested-sub-headingThree">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseThree" aria-expanded="false" aria-controls="nested-sub-collapseThree">
                                                    Mathematics
                                                </button>
                                            </h2>
                                            <div id="nested-sub-collapseThree" class="accordion-collapse collapse" aria-labelledby="nested-sub-headingThree" data-bs-parent="#nested-sub-accordionExample1">
                                                <div class="accordion-body">
                                                    <!-- Nested Accordion Item #1 -->
                                                    <div class="accordion science-math-2" id="nested-sub-nested-accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursormath2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                        <!-- Add more nested accordion items as needed -->
                                                    </div>

                                                    <!-- Nested Accordion Item #2 -->
                                                    <div class="accordion science-math-2" id="nested-sub-nested-accordionExample2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursormath2Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                            <div class="accordion-item science-math-2">
                                                <div class="accordion science-math-2" id="nested-sub-accordionExample1">
                                                    <div class="accordion-item">
                                                        <!-- Chemistry Accordion Header -->
                                                        <h2 class="accordion-header" id="nested-sub-headingFour">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseFour" aria-expanded="false" aria-controls="nested-sub-collapseFour">
                                                                Chemistry
                                                            </button>
                                                        </h2>

                                                        <!-- Chemistry Accordion Collapse Content -->
                                                        <div id="nested-sub-collapseFour" class="accordion-collapse collapse" aria-labelledby="nested-sub-headingFour" data-bs-parent="#nested-sub-accordionExample1">
                                                            <div class="accordion-body">
                                                                <!-- Nested Accordion #1 -->
                                                                <div class="accordion science-math-2" id="nested-sub-nested-accordionExample1">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                                First Semester
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                        <thead style="background-color: #fff;">
                                                                                                                            <th scope="col">Student ID</th>
                                                                                                                            <th scope="col">Full Name</th>
                                                                                                                            <th scope="col">Score</th>
                                                                                                                            <th scope="col">Exam</th>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <?php
                                                                                                                            foreach ($cursorchem2 as $exam) {
                                                                                                                                foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                    $studentId = $scoreData['student_id'];
                                                                                                                                    $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    $fullName = $row['full_name'];
                                                                                                                                    $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                    $examtype = $exam['EXAM_TYPE'];

                                                                                                                                    echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                    <!-- Add more nested accordion items as needed -->
                                                                </div>

                                                                <!-- Nested Accordion #2 -->
                                                                <div class="accordion science-math-2" id="nested-sub-nested-accordionExample2">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                                Second Semester
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                        <thead style="background-color: #fff;">
                                                                                                                            <th scope="col">Student ID</th>
                                                                                                                            <th scope="col">Full Name</th>
                                                                                                                            <th scope="col">Score</th>
                                                                                                                            <th scope="col">Exam</th>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <?php
                                                                                                                            foreach ($cursorchem2Sem2 as $exam) {
                                                                                                                                foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                    $studentId = $scoreData['student_id'];
                                                                                                                                    $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    $fullName = $row['full_name'];
                                                                                                                                    $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                    $examtype = $exam['EXAM_TYPE'];

                                                                                                                                    echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorphys3 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <!-- Nested Accordion Item #2 -->
                                                        <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorphys3Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorbio3 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <div class="accordion" id="nested-sub-nested-accordionExample2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorbio3Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                            <div class="accordion" id="nested-sub-accordionExample">
                                                <!-- Mathematics Accordion Item -->
                                                <div class="accordion-item science-math-3">
                                                    <h2 class="accordion-header" id="nested-sub-headingThree">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapseThree" aria-expanded="true" aria-controls="nested-sub-collapseThree">
                                                            Mathematics
                                                        </button>
                                                    </h2>
                                                    <div id="nested-sub-collapseThree" class="accordion-collapse collapse hide" aria-labelledby="nested-sub-headingThree" data-bs-parent="#nested-sub-accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="accordion science-math-3" id="nested-sub-nested-accordionExample1">
                                                                <!-- Nested Accordion Item #1 -->
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingOne">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseOne" aria-expanded="false" aria-controls="nested-sub-nested-collapseOne">
                                                                            First Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseOne" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingOne" data-bs-parent="#nested-sub-nested-accordionExample1">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursormath3 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                                <!-- Add more nested accordion items as needed -->
                                                            </div>

                                                            <div class="accordion science-math-3" id="nested-sub-nested-accordionExample2">
                                                                <!-- Nested Accordion Item #2 -->
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-sub-nested-headingTwo">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapseTwo" aria-expanded="false" aria-controls="nested-sub-nested-collapseTwo">
                                                                            Second Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-sub-nested-collapseTwo" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-headingTwo" data-bs-parent="#nested-sub-nested-accordionExample2">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursormath3Sem2 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapse1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading1" data-bs-parent="#nested-sub-nested-accordion1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorchem3 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <!-- Nested Accordion #2 -->
                                                        <div class="accordion" id="nested-sub-nested-accordion2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-nested-heading2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-collapse2" aria-expanded="false" aria-controls="nested-sub-nested-collapse2">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-nested-collapse2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-heading2" data-bs-parent="#nested-sub-nested-accordion2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorchem3Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading1" data-bs-parent="#nested-sub-nested-nested-accordion1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursoreco1 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                    <!-- Nested Accordion #2 -->
                                                    <div class="accordion" id="nested-sub-nested-nested-accordion2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-nested-heading2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2" data-bs-parent="#nested-sub-nested-nested-accordion2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursoreco1Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse2-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2-1" data-bs-parent="#nested-sub-nested-nested-accordion2-1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursoracc1 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                    <!-- Nested Accordion #2 -->
                                                    <div class="accordion" id="nested-sub-nested-nested-accordion2-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-nested-heading2-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse2-2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse2-2">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse2-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading2-2" data-bs-parent="#nested-sub-nested-nested-accordion2-2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursoracc1Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse3-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3-1" data-bs-parent="#nested-sub-nested-nested-accordion3-1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorsoc1 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                    <!-- Nested Accordion #2 -->
                                                    <div class="accordion" id="nested-sub-nested-nested-accordion3-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-nested-heading3-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse3-2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse3-2">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse3-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading3-2" data-bs-parent="#nested-sub-nested-nested-accordion3-2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorsoc1Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse4-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4-1" data-bs-parent="#nested-sub-nested-nested-accordion4-1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorgeo1 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                    <!-- Nested Accordion #2 -->
                                                    <div class="accordion" id="nested-sub-nested-nested-accordion4-2">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-sub-nested-nested-heading4-2">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-nested-nested-collapse4-2" aria-expanded="false" aria-controls="nested-sub-nested-nested-collapse4-2">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-sub-nested-nested-collapse4-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-nested-nested-heading4-2" data-bs-parent="#nested-sub-nested-nested-accordion4-2">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursorgeo1Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                    First Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-1-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-1-1" data-bs-parent="#nested-accordion-level-1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursoreco2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <!-- Nested Accordion #2 -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="nested-heading-level-1-2">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-1-2" aria-expanded="false" aria-controls="nested-collapse-level-1-2">
                                                                    Second Semester
                                                                </button>
                                                            </h2>
                                                            <div id="nested-collapse-level-1-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-1-2" data-bs-parent="#nested-accordion-level-1">
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
                                                                                                            <thead style="background-color: #fff;">
                                                                                                                <th scope="col">Student ID</th>
                                                                                                                <th scope="col">Full Name</th>
                                                                                                                <th scope="col">Score</th>
                                                                                                                <th scope="col">Exam</th>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                foreach ($cursoreco2Sem2 as $exam) {
                                                                                                                    foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                        $studentId = $scoreData['student_id'];
                                                                                                                        $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                        $fullName = $row['full_name'];
                                                                                                                        $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                        $examtype = $exam['EXAM_TYPE'];

                                                                                                                        echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-level-3-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-3-1" data-bs-parent="#nested-accordion-level-3-1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursoracc2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <div class="accordion" id="nested-accordion-level-3-2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-level-3-2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-3-2" aria-expanded="false" aria-controls="nested-collapse-level-3-2">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-level-3-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-3-2" data-bs-parent="#nested-accordion-level-3-2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursoracc2Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-level-4-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-1" data-bs-parent="#nested-accordion-level-4-1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorsoc2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <div class="accordion" id="nested-accordion-level-4-2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-level-4-2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-2" aria-expanded="false" aria-controls="nested-collapse-level-4-2">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-level-4-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-2" data-bs-parent="#nested-accordion-level-4-2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorsoc2Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-level-4-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-1" data-bs-parent="#nested-accordion-level-4-1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorgeo2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <div class="accordion" id="nested-accordion-level-4-2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-level-4-2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-2" aria-expanded="false" aria-controls="nested-collapse-level-4-2">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-level-4-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-2" data-bs-parent="#nested-accordion-level-4-2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorgeo2Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                            First Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-collapse-eco1" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco1" data-bs-parent="#nested-accordion-eco1">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursoreco3 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                            <div class="accordion" id="nested-accordion-eco2">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-heading-eco2">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-eco2" aria-expanded="false" aria-controls="nested-collapse-eco2">
                                                                            Second Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-collapse-eco2" class="accordion-collapse collapse" aria-labelledby="nested-heading-eco2" data-bs-parent="#nested-accordion-eco2">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursoreco3Sem2 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                            First Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-collapse-acc1" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc1" data-bs-parent="#nested-accordion-acc1">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursoracc3 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                            <div class="accordion" id="nested-accordion-acc2">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="nested-heading-acc2">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-acc2" aria-expanded="false" aria-controls="nested-collapse-acc2">
                                                                            Second Semester
                                                                        </button>
                                                                    </h2>
                                                                    <div id="nested-collapse-acc2" class="accordion-collapse collapse" aria-labelledby="nested-heading-acc2" data-bs-parent="#nested-accordion-acc2">
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
                                                                                                                    <thead style="background-color: #fff;">
                                                                                                                        <th scope="col">Student ID</th>
                                                                                                                        <th scope="col">Full Name</th>
                                                                                                                        <th scope="col">Score</th>
                                                                                                                        <th scope="col">Exam</th>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <?php
                                                                                                                        foreach ($cursoracc3Sem2 as $exam) {
                                                                                                                            foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                                $studentId = $scoreData['student_id'];
                                                                                                                                $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                $fullName = $row['full_name'];
                                                                                                                                $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                                $examtype = $exam['EXAM_TYPE'];

                                                                                                                                echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                        </div>

                                        <div class="accordion" id="nested-accordion-level-4-3">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="nested-heading-level-4-3">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-level-4-3" aria-expanded="false" aria-controls="nested-collapse-level-4-3">
                                                        Sociology
                                                    </button>
                                                </h2>
                                                <div id="nested-collapse-level-4-3" class="accordion-collapse collapse" aria-labelledby="nested-heading-level-4-3" data-bs-parent="#nested-accordion-level-4-3">
                                                    <div class="accordion-body">
                                                        <!-- Content for Nested Accordion 3 -->


                                                        <div class="accordion" id="nested-sub-accordion-level-4-3-1">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-heading-level-4-3-1">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapse-level-4-3-1" aria-expanded="false" aria-controls="nested-sub-collapse-level-4-3-1">
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-collapse-level-4-3-1" class="accordion-collapse collapse" aria-labelledby="nested-sub-heading-level-4-3-1" data-bs-parent="#nested-sub-accordion-level-4-3-1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorsoc3 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                                        <div class="accordion" id="nested-sub-accordion-level-4-3-2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-sub-heading-level-4-3-2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-sub-collapse-level-4-3-2" aria-expanded="false" aria-controls="nested-sub-collapse-level-4-3-2">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-sub-collapse-level-4-3-2" class="accordion-collapse collapse" aria-labelledby="nested-sub-heading-level-4-3-2" data-bs-parent="#nested-sub-accordion-level-4-3-2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorsoc3Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                                        First Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-geo-3-1" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3-1" data-bs-parent="#nested-accordion-geo-3-1">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorgeo3 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                                        <div class="accordion" id="nested-accordion-geo-3-2">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="nested-heading-geo-3-2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nested-collapse-geo-3-2" aria-expanded="false" aria-controls="nested-collapse-geo-3-2">
                                                                        Second Semester
                                                                    </button>
                                                                </h2>
                                                                <div id="nested-collapse-geo-3-2" class="accordion-collapse collapse" aria-labelledby="nested-heading-geo-3-2" data-bs-parent="#nested-accordion-geo-3-2">
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
                                                                                                                <thead style="background-color: #fff;">
                                                                                                                    <th scope="col">Student ID</th>
                                                                                                                    <th scope="col">Full Name</th>
                                                                                                                    <th scope="col">Score</th>
                                                                                                                    <th scope="col">Exam</th>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <?php
                                                                                                                    foreach ($cursorgeo3Sem2 as $exam) {
                                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            $fullName = $row['full_name'];
                                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1-1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-1" aria-expanded="false" aria-controls="collapse1-1">
                                            Korean
                                        </button>
                                    </h2>
                                    <div id="collapse1-1" class="accordion-collapse collapse" aria-labelledby="heading1-1" data-bs-parent="#collapselang-1-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading1-1-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-1-1" aria-expanded="false" aria-controls="collapse1-1-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-1-1" class="accordion-collapse collapse" aria-labelledby="heading1-1-1" data-bs-parent="#collapse1-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorkor1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading1-1-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-1-2" aria-expanded="false" aria-controls="collapse1-1-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-1-2" class="accordion-collapse collapse" aria-labelledby="heading1-1-2" data-bs-parent="#collapse1-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorkor1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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



                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-2" aria-expanded="false" aria-controls="collapse1-2">
                                            Mandarin
                                        </button>
                                    </h2>
                                    <div id="collapse1-2" class="accordion-collapse collapse" aria-labelledby="heading1-2" data-bs-parent="#collapselang-1-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading1-2-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-2-1" aria-expanded="false" aria-controls="collapse1-2-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-2-1" class="accordion-collapse collapse" aria-labelledby="heading1-2-1" data-bs-parent="#collapse1-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorman1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading1-2-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-2-2" aria-expanded="false" aria-controls="collapse1-2-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-2-2" class="accordion-collapse collapse" aria-labelledby="heading1-2-2" data-bs-parent="#collapse1-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorman1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <!-- Third Nested Accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-3" aria-expanded="false" aria-controls="collapse1-3">
                                            French
                                        </button>
                                    </h2>
                                    <div id="collapse1-3" class="accordion-collapse collapse" aria-labelledby="heading1-3" data-bs-parent="#collapselang-1-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading1-3-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-3-1" aria-expanded="false" aria-controls="collapse1-3-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-3-1" class="accordion-collapse collapse" aria-labelledby="heading1-3-1" data-bs-parent="#collapse1-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorfre1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading1-3-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-3-2" aria-expanded="false" aria-controls="collapse1-3-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-3-2" class="accordion-collapse collapse" aria-labelledby="heading1-3-2" data-bs-parent="#collapse1-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorfre1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <!-- Fourth Nested Accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-4" aria-expanded="false" aria-controls="collapse1-4">
                                            German
                                        </button>
                                    </h2>
                                    <div id="collapse1-4" class="accordion-collapse collapse" aria-labelledby="heading1-4" data-bs-parent="#collapselang-1-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading1-4-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-4-1" aria-expanded="false" aria-controls="collapse1-4-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-4-1" class="accordion-collapse collapse" aria-labelledby="heading1-4-1" data-bs-parent="#collapse1-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorger1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading1-4-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-4-2" aria-expanded="false" aria-controls="collapse1-4-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse1-4-2" class="accordion-collapse collapse" aria-labelledby="heading1-4-2" data-bs-parent="#collapse1-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorger1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headinglang-1-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselang-1-2" aria-expanded="false" aria-controls="collapselang-1-2">
                                Grade 2
                            </button>
                        </h2>
                        <div id="collapselang-1-2" class="accordion-collapse collapse" aria-labelledby="headinglang-1-2" data-bs-parent="#collapselang-1-2">
                            <div class="accordion-body">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2-1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
                                            Korean
                                        </button>
                                    </h2>
                                    <div id="collapse2-1" class="accordion-collapse collapse" aria-labelledby="heading2-1" data-bs-parent="#collapselang-1-2">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading2-1-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-1-1" aria-expanded="false" aria-controls="collapse2-1-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-1-1" class="accordion-collapse collapse" aria-labelledby="heading2-1-1" data-bs-parent="#collapse2-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorkor2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading2-1-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-1-2" aria-expanded="false" aria-controls="collapse2-1-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-1-2" class="accordion-collapse collapse" aria-labelledby="heading2-1-2" data-bs-parent="#collapse2-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorkor2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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



                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
                                            Mandarin
                                        </button>
                                    </h2>
                                    <div id="collapse2-2" class="accordion-collapse collapse" aria-labelledby="heading2-2" data-bs-parent="#collapselang-1-2">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading2-2-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-2-1" aria-expanded="false" aria-controls="collapse2-2-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-2-1" class="accordion-collapse collapse" aria-labelledby="heading2-2-1" data-bs-parent="#collapse2-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorman2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading2-2-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-2-2" aria-expanded="false" aria-controls="collapse2-2-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-2-2" class="accordion-collapse collapse" aria-labelledby="heading2-2-2" data-bs-parent="#collapse2-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorman2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <!-- Third Nested Accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
                                            French
                                        </button>
                                    </h2>
                                    <div id="collapse2-3" class="accordion-collapse collapse" aria-labelledby="heading2-3" data-bs-parent="#collapselang-1-2">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading2-3-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-3-1" aria-expanded="false" aria-controls="collapse2-3-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-3-1" class="accordion-collapse collapse" aria-labelledby="heading2-3-1" data-bs-parent="#collapse2-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorfre2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading2-3-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-3-2" aria-expanded="false" aria-controls="collapse2-3-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-3-2" class="accordion-collapse collapse" aria-labelledby="heading2-3-2" data-bs-parent="#collapse2-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorfre2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <!-- Fourth Nested Accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-4" aria-expanded="false" aria-controls="collapse2-4">
                                            German
                                        </button>
                                    </h2>
                                    <div id="collapse2-4" class="accordion-collapse collapse" aria-labelledby="heading2-4" data-bs-parent="#collapselang-1-2">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading2-4-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-4-1" aria-expanded="false" aria-controls="collapse2-4-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-4-1" class="accordion-collapse collapse" aria-labelledby="heading2-4-1" data-bs-parent="#collapse2-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorger2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading2-4-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-4-2" aria-expanded="false" aria-controls="collapse2-4-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse2-4-2" class="accordion-collapse collapse" aria-labelledby="heading2-4-2" data-bs-parent="#collapse2-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorger2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headinglang-1-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselang-1-3" aria-expanded="false" aria-controls="collapselang-1-3">
                                Grade 3
                            </button>
                        </h2>
                        <div id="collapselang-1-3" class="accordion-collapse collapse" aria-labelledby="headinglang-1-3" data-bs-parent="#collapselang-1-3">
                            <div class="accordion-body">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3-1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-1" aria-expanded="false" aria-controls="collapse3-1">
                                            Korean
                                        </button>
                                    </h2>
                                    <div id="collapse3-1" class="accordion-collapse collapse" aria-labelledby="heading3-1" data-bs-parent="#collapselang-1-3">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading3-1-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-1-1" aria-expanded="false" aria-controls="collapse3-1-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-1-1" class="accordion-collapse collapse" aria-labelledby="heading3-1-1" data-bs-parent="#collapse3-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorkor3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading3-1-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-1-2" aria-expanded="false" aria-controls="collapse3-1-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-1-2" class="accordion-collapse collapse" aria-labelledby="heading3-1-2" data-bs-parent="#collapse3-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorkor3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
                                            Mandarin
                                        </button>
                                    </h2>
                                    <div id="collapse3-2" class="accordion-collapse collapse" aria-labelledby="heading3-2" data-bs-parent="#collapselang-1-3">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading3-2-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-2-1" aria-expanded="false" aria-controls="collapse3-2-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-2-1" class="accordion-collapse collapse" aria-labelledby="heading3-2-1" data-bs-parent="#collapse3-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorman3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading3-2-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-2-2" aria-expanded="false" aria-controls="collapse3-2-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-2-2" class="accordion-collapse collapse" aria-labelledby="heading3-2-2" data-bs-parent="#collapse3-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorman3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
                                            French
                                        </button>
                                    </h2>
                                    <div id="collapse3-3" class="accordion-collapse collapse" aria-labelledby="heading3-3" data-bs-parent="#collapselang-1-3">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading3-3-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-3-1" aria-expanded="false" aria-controls="collapse3-3-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-3-1" class="accordion-collapse collapse" aria-labelledby="heading3-3-1" data-bs-parent="#collapse3-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorfre3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading3-3-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-3-2" aria-expanded="false" aria-controls="collapse3-3-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-3-2" class="accordion-collapse collapse" aria-labelledby="heading3-3-2" data-bs-parent="#collapse3-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorfre3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-4" aria-expanded="false" aria-controls="collapse3-4">
                                            German
                                        </button>
                                    </h2>
                                    <div id="collapse3-4" class="accordion-collapse collapse" aria-labelledby="heading3-4" data-bs-parent="#collapselang-1-3">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading3-4-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-4-1" aria-expanded="false" aria-controls="collapse3-4-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-4-1" class="accordion-collapse collapse" aria-labelledby="heading3-4-1" data-bs-parent="#collapse3-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorger3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="heading3-4-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3-4-2" aria-expanded="false" aria-controls="collapse3-4-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapse3-4-2" class="accordion-collapse collapse" aria-labelledby="heading3-4-2" data-bs-parent="#collapse3-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorger3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingmand-1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1" aria-expanded="false" aria-controls="collapsemand-1">
                                Grade 1
                            </button>
                        </h2>
                        <div id="collapsemand-1" class="accordion-collapse collapse" aria-labelledby="headingmand-1" data-bs-parent="#collapsemand">
                            <div class="accordion-body">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-1-1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-1" aria-expanded="false" aria-controls="collapsemand-1-1">
                                            Art
                                        </button>
                                    </h2>
                                    <div id="collapsemand-1-1" class="accordion-collapse collapse" aria-labelledby="headingmand-1-1" data-bs-parent="#collapsemand-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-1-1-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-1-1" aria-expanded="false" aria-controls="collapsemand-1-1-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-1-1" class="accordion-collapse collapse" aria-labelledby="headingmand-1-1-1" data-bs-parent="#collapsemand-1-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorart1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-1-1-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-1-2" aria-expanded="false" aria-controls="collapsemand-1-1-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-1-2" class="accordion-collapse collapse" aria-labelledby="headingmand-1-1-2" data-bs-parent="#collapsemand-1-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorart1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-1-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-2" aria-expanded="false" aria-controls="collapsemand-1-2">
                                            Indonesian
                                        </button>
                                    </h2>
                                    <div id="collapsemand-1-2" class="accordion-collapse collapse" aria-labelledby="headingmand-1-2" data-bs-parent="#collapsemand-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-1-2-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-2-1" aria-expanded="false" aria-controls="collapsemand-1-2-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-2-1" class="accordion-collapse collapse" aria-labelledby="headingmand-1-2-1" data-bs-parent="#collapsemand-1-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorind1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-1-2-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-2-2" aria-expanded="false" aria-controls="collapsemand-1-2-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-2-2" class="accordion-collapse collapse" aria-labelledby="headingmand-1-2-2" data-bs-parent="#collapsemand-1-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorind1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-1-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-3" aria-expanded="false" aria-controls="collapsemand-1-3">
                                            History
                                        </button>
                                    </h2>
                                    <div id="collapsemand-1-3" class="accordion-collapse collapse" aria-labelledby="headingmand-1-3" data-bs-parent="#collapsemand-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-1-3-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-3-1" aria-expanded="false" aria-controls="collapsemand-1-3-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-3-1" class="accordion-collapse collapse" aria-labelledby="headingmand-1-3-1" data-bs-parent="#collapsemand-1-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorhist1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-1-3-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-3-2" aria-expanded="false" aria-controls="collapsemand-1-3-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-3-2" class="accordion-collapse collapse" aria-labelledby="headingmand-1-3-2" data-bs-parent="#collapsemand-1-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorhist1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-1-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-4" aria-expanded="false" aria-controls="collapsemand-1-4">
                                            Civic
                                        </button>
                                    </h2>
                                    <div id="collapsemand-1-4" class="accordion-collapse collapse" aria-labelledby="headingmand-1-4" data-bs-parent="#collapsemand-1">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-1-4-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-4-1" aria-expanded="false" aria-controls="collapsemand-1-4-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-4-1" class="accordion-collapse collapse" aria-labelledby="headingmand-1-4-1" data-bs-parent="#collapsemand-1-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorciv1 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-1-4-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-1-4-2" aria-expanded="false" aria-controls="collapsemand-1-4-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-1-4-2" class="accordion-collapse collapse" aria-labelledby="headingmand-1-4-2" data-bs-parent="#collapsemand-1-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorciv1Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingmand-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2" aria-expanded="false" aria-controls="collapsemand-2">
                                Grade 2
                            </button>
                        </h2>
                        <div id="collapsemand-2" class="accordion-collapse collapse" aria-labelledby="headingmand-2" data-bs-parent="#collapsemand">
                            <div class="accordion-body">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-2-1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-1" aria-expanded="false" aria-controls="collapsemand-2-1">
                                            Art
                                        </button>
                                    </h2>
                                    <div id="collapsemand-2-1" class="accordion-collapse collapse" aria-labelledby="headingmand-2-1" data-bs-parent="#collapsemand-2">
                                        <div class="accordion-body">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-2-1-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-1-1" aria-expanded="false" aria-controls="collapsemand-2-1-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-1-1" class="accordion-collapse collapse" aria-labelledby="headingmand-2-1-1" data-bs-parent="#collapsemand-2-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorart2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-2-1-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-1-2" aria-expanded="false" aria-controls="collapsemand-2-1-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-1-2" class="accordion-collapse collapse" aria-labelledby="headingmand-2-1-2" data-bs-parent="#collapsemand-2-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorart2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-2-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-2" aria-expanded="false" aria-controls="collapsemand-2-2">
                                            Indonesian
                                        </button>
                                    </h2>
                                    <div id="collapsemand-2-2" class="accordion-collapse collapse" aria-labelledby="headingmand-2-2" data-bs-parent="#collapsemand-2">
                                        <div class="accordion-body">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-2-2-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-2-1" aria-expanded="false" aria-controls="collapsemand-2-2-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-2-1" class="accordion-collapse collapse" aria-labelledby="headingmand-2-2-1" data-bs-parent="#collapsemand-2-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorind2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-2-2-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-2-2" aria-expanded="false" aria-controls="collapsemand-2-2-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-2-2" class="accordion-collapse collapse" aria-labelledby="headingmand-2-2-2" data-bs-parent="#collapsemand-2-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorind2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-2-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-3" aria-expanded="false" aria-controls="collapsemand-2-3">
                                            History
                                        </button>
                                    </h2>
                                    <div id="collapsemand-2-3" class="accordion-collapse collapse" aria-labelledby="headingmand-2-3" data-bs-parent="#collapsemand-2">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-2-3-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-3-1" aria-expanded="false" aria-controls="collapsemand-2-3-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-3-1" class="accordion-collapse collapse" aria-labelledby="headingmand-2-3-1" data-bs-parent="#collapsemand-2-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorhist2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-2-3-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-3-2" aria-expanded="false" aria-controls="collapsemand-2-3-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-3-2" class="accordion-collapse collapse" aria-labelledby="headingmand-2-3-2" data-bs-parent="#collapsemand-2-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorhist2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-2-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-4" aria-expanded="false" aria-controls="collapsemand-2-4">
                                            Civic
                                        </button>
                                    </h2>
                                    <div id="collapsemand-2-4" class="accordion-collapse collapse" aria-labelledby="headingmand-2-4" data-bs-parent="#collapsemand-2">
                                        <div class="accordion-body">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-2-4-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-4-1" aria-expanded="false" aria-controls="collapsemand-2-4-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-4-1" class="accordion-collapse collapse" aria-labelledby="headingmand-2-4-1" data-bs-parent="#collapsemand-2-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorciv2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-2-4-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-2-4-2" aria-expanded="false" aria-controls="collapsemand-2-4-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-2-4-2" class="accordion-collapse collapse" aria-labelledby="headingmand-2-4-2" data-bs-parent="#collapsemand-2-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorciv2Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingmand-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3" aria-expanded="false" aria-controls="collapsemand-3">
                                Grade 3
                            </button>
                        </h2>
                        <div id="collapsemand-3" class="accordion-collapse collapse" aria-labelledby="headingmand-3" data-bs-parent="#collapsemand">
                            <div class="accordion-body">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-3-1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-1" aria-expanded="false" aria-controls="collapsemand-3-1">
                                            Art
                                        </button>
                                    </h2>
                                    <div id="collapsemand-3-1" class="accordion-collapse collapse" aria-labelledby="headingmand-3-1" data-bs-parent="#collapsemand-3">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-3-1-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-1-1" aria-expanded="false" aria-controls="collapsemand-3-1-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-1-1" class="accordion-collapse collapse" aria-labelledby="headingmand-3-1-1" data-bs-parent="#collapsemand-3-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorart3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-3-1-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-1-2" aria-expanded="false" aria-controls="collapsemand-3-1-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-1-2" class="accordion-collapse collapse" aria-labelledby="headingmand-3-1-2" data-bs-parent="#collapsemand-3-1">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorart3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-3-2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-2" aria-expanded="false" aria-controls="collapsemand-3-2">
                                            Indonesian
                                        </button>
                                    </h2>
                                    <div id="collapsemand-3-2" class="accordion-collapse collapse" aria-labelledby="headingmand-3-2" data-bs-parent="#collapsemand-3">
                                        <div class="accordion-body">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-3-2-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-2-1" aria-expanded="false" aria-controls="collapsemand-3-2-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-2-1" class="accordion-collapse collapse" aria-labelledby="headingmand-3-2-1" data-bs-parent="#collapsemand-3-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorind3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-3-2-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-2-2" aria-expanded="false" aria-controls="collapsemand-3-2-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-2-2" class="accordion-collapse collapse" aria-labelledby="headingmand-3-2-2" data-bs-parent="#collapsemand-3-2">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorind3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-3-3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-3" aria-expanded="false" aria-controls="collapsemand-3-3">
                                            History
                                        </button>
                                    </h2>
                                    <div id="collapsemand-3-3" class="accordion-collapse collapse" aria-labelledby="headingmand-3-3" data-bs-parent="#collapsemand-3">
                                        <div class="accordion-body">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-3-3-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-3-1" aria-expanded="false" aria-controls="collapsemand-3-3-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-3-1" class="accordion-collapse collapse" aria-labelledby="headingmand-3-3-1" data-bs-parent="#collapsemand-3-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorhist3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-3-3-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-3-2" aria-expanded="false" aria-controls="collapsemand-3-3-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-3-2" class="accordion-collapse collapse" aria-labelledby="headingmand-3-3-2" data-bs-parent="#collapsemand-3-3">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorhist3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingmand-3-4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-4" aria-expanded="false" aria-controls="collapsemand-3-4">
                                            Civic
                                        </button>
                                    </h2>
                                    <div id="collapsemand-3-4" class="accordion-collapse collapse" aria-labelledby="headingmand-3-4" data-bs-parent="#collapsemand-3">
                                        <div class="accordion-body">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingmand-3-4-1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-4-1" aria-expanded="false" aria-controls="collapsemand-3-4-1">
                                                        First Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-4-1" class="accordion-collapse collapse" aria-labelledby="headingmand-3-4-1" data-bs-parent="#collapsemand-3-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorciv3 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                                                <h2 class="accordion-header" id="headingmand-3-4-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemand-3-4-2" aria-expanded="false" aria-controls="collapsemand-3-4-2">
                                                        Second Semester
                                                    </button>
                                                </h2>
                                                <div id="collapsemand-3-4-2" class="accordion-collapse collapse" aria-labelledby="headingmand-3-4-2" data-bs-parent="#collapsemand-3-4">
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
                                                                                                <thead style="background-color: #fff;">
                                                                                                    <th scope="col">Student ID</th>
                                                                                                    <th scope="col">Full Name</th>
                                                                                                    <th scope="col">Score</th>
                                                                                                    <th scope="col">Exam</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($cursorciv3Sem2 as $exam) {
                                                                                                        foreach ($exam['SCORE_DATA'] as $scoreData) {
                                                                                                            $studentId = $scoreData['student_id'];
                                                                                                            $sql = "SELECT full_name FROM student WHERE student_id = '$studentId'";
                                                                                                            $result = mysqli_query($conn, $sql);
                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                            $fullName = $row['full_name'];
                                                                                                            $finalScore = $scoreData['scores']['score1'] + $scoreData['scores']['score2'];
                                                                                                            $examtype = $exam['EXAM_TYPE'];

                                                                                                            echo "<tr><td>" . $studentId . "</td><td>" . $fullName . "</td><td>" . $finalScore . "</td><td>" . $examtype . "</td></tr>"; // Fix: Close the <tr> tag
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
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>
</html>
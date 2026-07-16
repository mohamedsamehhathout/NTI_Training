<?php

$students = [
    ["Ahmed", 95],
    ["Mohamed", 82],
    ["Ali", 74],
    ["Sara", 61],
    ["Mona", 48]
];

$passed = 0;
$failed = 0;
$total = 0;

$highestName = "";
$highestGrade = -1;

foreach ($students as $student) {

    $name = $student[0];
    $grade = $student[1];

    if ($grade >= 90) {
        $letter = "A";
    } elseif ($grade >= 80) {
        $letter = "B";
    } elseif ($grade >= 70) {
        $letter = "C";
    } elseif ($grade >= 60) {
        $letter = "D";
    } else {
        $letter = "F";
    }

    echo "Name: $name <br>";
    echo "Grade: $grade <br>";
    echo "Grade Letter: $letter <br><br>";

    if ($grade >= 60) {
        $passed++;
    } else {
        $failed++;
    }

    $total += $grade;

    if ($grade > $highestGrade) {
        $highestGrade = $grade;
        $highestName = $name;
    }
}

$average = $total / count($students);

echo "Passed Students: $passed <br>";
echo "Failed Students: $failed <br>";
echo "Average Grade: $average <br>";
echo "Top Student: $highestName ($highestGrade)";
?>
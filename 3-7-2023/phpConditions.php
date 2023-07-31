<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Q1---------------------------" . "<br>";
    $year = 2012;
    if ($year % 4 == 0) {
        echo "$year is leab!" . "<br>";
    } else {
        echo "$year is not leab!" . "<br>";
    }
    echo "<br><br>";

    echo "Q2---------------------------" . "<br>";
    $temp = 20;
    if ($temp > 20) {
        echo "Summer" . "<br>";
    } else {
        echo "Winter" . "<br>";
    }
    echo "<br><br>";

    echo "Q3---------------------------" . "<br>";
    $num1 = 2;
    $num2 = 2;
    if ($num1 == $num2) {
        echo ($num1 + $num2) * 3 . "<br>";
    } else {
        echo ($num1 + $num2) . "<br>";
    }
    echo "<br><br>";

    echo "Q4---------------------------" . "<br>";
    $n1 = 15;
    $n2 = 15;
    if ($n1 + $n2 == 30) {
        echo ($n1 + $n2) . "<br>";
    } else {
        echo "false" . "<br>";
    }
    echo "<br><br>";

    echo "Q5---------------------------" . "<br>";
    $number = 20;
    if ($number % 3 == 0) {
        echo "true" . "<br>";
    } else {
        echo "false" . "<br>";
    }
    echo "<br><br>";

    echo "Q6---------------------------" . "<br>";
    $myNumber = 4;
    if ($myNumber >= 20 && $myNumber <= 50) {
        echo "true" . "<br>";
    } else {
        echo "false" . "<br>";
    }
    echo "<br><br>";

    echo "Q7---------------------------" . "<br>";

    echo max(1, 5, 9) . "<br>";
    echo "<br><br>";

    echo "Q8---------------------------" . "<br>";

    $units = 233;
    $bill = 0;
    if ($units > 0 && $units <= 50) {
        $bill = $units * 2.5;
    } else {
        $units -= 50;
        $bill = 50 * 2.5;
        if ($units <= 100) {
            $bill += ($units * 5);
        } elseif ($units > 100) {
            $units -= 100;
            $bill += 100 * 5;
        }
        if ($units <= 100 && $bill > 625) {
            $bill += ($units * 6.2);
        } elseif ($units > 100) {
            $units -= 100;
            $bill += 100 * 6.2;
        }
        if ($units > 0 && $bill > 1225) {
            $bill += $units * 7.5;
        }
    }
    echo $bill . "<br>";
    echo "<br><br>";

    echo "Q9---------------------------" . "<br>";

    $age = 19;
    if ($age >= 18) {
        echo "you can" . "<br>";
    } else {
        echo "you can't" . "<br>";
    }
    echo "<br><br>";

    echo "Q10---------------------------" . "<br>";

    $w = -7;
    if ($w < 0) {
        echo "Negative number" . "<br>";
    } else {
        echo "Positive number" . "<br>";
    }
    echo "<br><br>";

    echo "Q11---------------------------" . "<br>";
    echo "See bellow for the calculator " . "<br>";

    if (isset($_POST['sub'])) {
        $num1 = (int)$_POST['n1'];
        $num2 = (int)$_POST['n2'];
        $oprnd = $_POST['sub'];
        if ($oprnd == "+")
            $ans = $num1 + $num2;
        else if ($oprnd == "-")
            $ans = $num1 - $num2;
        else if ($oprnd == "x")
            $ans = $num1 * $num2;
        else if ($oprnd == "/")
            $ans = $num1 / $num2;
    }
    echo "<br><br>";

    echo "Q12---------------------------" . "<br>";
    $grades = [60, 86, 95, 63, 55, 74, 79, 62, 50];
    $sum = array_sum($grades);
    $score = $sum / count($grades);
    switch ($score) {
        case $score < 60:
            echo "F" . "<br>";
            break;
        case $score >= 60 && $score < 70:
            echo "D" . "<br>";
            break;
        case $score >= 70 && $score < 80:
            echo "C" . "<br>";
            break;
        case $score >= 80 && $score < 90:
            echo "B" . "<br>";
            break;
        case $score >= 90 && $score <= 100:
            echo "A" . "<br>";
            break;
        
    }

    ?>


    <form method="post" action="">
        <h1>Simple Calculator</h1>
        <br>
        First Number:<input name="n1" value="">
        <br>
        Second Number:<input name="n2" value="">
        <br>
        <input type="submit" name="sub" value="+">
        <input type="submit" name="sub" value="-">
        <input type="submit" name="sub" value="x">
        <input type="submit" name="sub" value="/">
        <br>
        <br>Result: <input type='text' value="<?php echo $ans; ?>"><br>
    </form>

</body>

</html>
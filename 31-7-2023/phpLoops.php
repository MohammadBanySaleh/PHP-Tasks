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
    $sum = 0;
    for ($i = 0; $i < 30; $i++) {
        $sum += $i;
    }
    echo $sum . "<br>";
    echo "<br><br>";

    echo "Q4---------------------------" . "<br><br>";

    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= 5; $j++) {
            if ($i == $j) {
                echo $i . " ";
            } else {
                echo 0 . " ";
            }
        }
        echo "<br>";
    }
    echo "<br><br>";

    echo "Q5---------------------------" . "<br><br>";

    $number = 5;
    $fac = 1;
    for ($i = 1; $i <= 5; $i++) {
        $fac *= $i;
    }
    echo "The factorial of " . $number . " = " . $fac . "<br>";
    echo "<br><br>";

    echo "Q6---------------------------" . "<br><br>";
    $x = 0;
    $y = 1;
    echo 0 . " , " . 1 . " , ";
    for ($i = 0; $i <= 10; $i++) {
        $z = $x + $y;
        echo $z . " , ";
        $x = $y;
        $y = $z;
    }
    echo "<br><br>";

    echo "Q9---------------------------" . "<br><br>";

    $num = 1;
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $num . " ";
            $num++;
        }
        echo "<br>";
    }

    ?>
</body>

</html>
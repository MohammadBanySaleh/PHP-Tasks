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

    $colors = array('white', 'green', 'red');
    echo "<ul>";
    for ($i = 0; $i < count($colors); $i++) {
        echo "<li>" . $colors[$i] . "</li>";
    }
    echo "</ul>";
    echo "<br><br>";

    echo "Q2---------------------------" . "<br><br>";

    $cities = array(
        "Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels",
        "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris",
        "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin",
        "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam",
        "Portugal" => "Lisbon", "Spain" => "Madrid"
    );
    asort($cities);

    foreach ($cities as $key => $value) {
        echo "The cspital of $key is $value" . "<br>";
    }
    echo "<br><br>";

    echo "Q3---------------------------" . "<br><br>";

    $color = array (4 => 'white', 6 => 'green', 11=> 'red');
    echo $color["4"] . "<br>";
    echo "<br><br>";

    echo "Q4---------------------------" . "<br><br>";

    $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
    asort($fruits);
    foreach ($fruits as $key => $value) {
       echo $key . " = " . $value . "<br>";
    }
    echo "<br><br>";

    echo "Q8---------------------------" . "<br><br>";

    $words =  array("abcd","abc","de","hjjj","g","wer");
    $longest = $words[0];
    $shortest = $words[0];
    for ($i=0; $i < count($words); $i++) {
        if (strlen($words[$i]) > strlen($longest)) {
            $longest = $words[$i];       
        }
        if (strlen($words[$i]) < strlen($shortest)) {
            $shortest = $words[$i];
        }
    }
    echo "The shortest array length is " . strlen($shortest) . " The longest array length is " . strlen($longest) . "<br>";


    ?>
</body>

</html>
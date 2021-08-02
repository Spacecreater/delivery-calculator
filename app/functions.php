<?php

$rwtpErr = $toniErr = $moniErr;
$rwtp = $toni = $moni;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["rawsTypesIndex"])) {
        $rwtpErr = "Выберите тип сырья";
    } else {
        $rwtp = test_input($_POST["rawsTypesIndex"]);
    }

    if(empty($_POST["tonnagesIndex"])) {
        $toniErr = "Выберите тоннаж";
    } else {
        $toni = test_input($_POST["tonnagesIndex"]);
    }

    if(empty($_POST["monthIndex"])) {
        $moniErr = "Выберите месяц";
    } else {
        $moni = test_input($_POST["monthIndex"]);
    }
};

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

};

if (! empty($_POST["rawsTypesIndex"]) && ! empty($_POST["tonnagesIndex"]) && ! empty($_POST["monthIndex"])) {
    $key1 = array_search($_POST['rawsTypesIndex'], $rawsTypes);
    $key2 = array_search($_POST['tonnagesIndex'], $tonnages);
    $key3 = array_search($_POST['monthIndex'], $month);
        
};

?>
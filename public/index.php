<?php

require_once __DIR__ . '/../app/data.php';
require_once __DIR__ . '/../app/functions.php';

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>GRUZPRO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="three"><h1>Расчет стоимости доставки грузоперевозки</h1></div>
<div class="container1">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="needs-validation mt-5 mb-5" method="post" actions = "" id="form"  novalidate>

            <span class="error"><div style="color:#FF0000"><b> <?php echo $rwtpErr;?></b></div></span>
            <p><select class="custom-select" type= "text" name ="rawsTypesIndex" required>
                    <option value=''>Выбрать тип сырья</option>
                   <option value='Шрот' <?= ($_POST["rawsTypesIndex"] =="1");?>>Шрот</option>
                   <option value='Жмых' <?= ($_POST["rawsTypesIndex"] =="2");?>>Жмых</option>
                   <option value='Соя' <?= ($_POST["rawsTypesIndex"] =="3");?>>Соя</option>
                </select>

                <span class="error"><div style="color:#FF0000"><b> <?php echo $toniErr;?></b></div></span>
                <p><select class="custom-select" type= "text" name ="tonnagesIndex" required>
                    <option value=''>Выбрать тоннаж</option>
                    <option value='25' <?= ($_POST["tonnagesIndex"] =="1");?>>25</option>
                    <option value='50' <?= ($_POST["tonnagesIndex"] =="2");?>>50</option>
                    <option value='75' <?= ($_POST["tonnagesIndex"] =="3");?>>75</option>
                    <option value='100' <?= ($_POST["tonnagesIndex"] =="4");?>>100</option>
                </select>

                <p><span class="error"><div style="color:#FF0000"><b> <?php echo $moniErr;?></b></div></span>
                    <select class="custom-select" type= "text" name ="monthIndex" required>
                    <option value=''>Выбрать месяц</option>
                    <option value='Январь' <?= ($_POST["monthIndex"] =="1");?>>Январь</option>
                    <option value='Февраль' <?= ($_POST["monthIndex"] =="2");?>>Февраль</option>
                    <option value='Август' <?= ($_POST["monthIndex"] =="3");?>>Август</option>
                    <option value='Сентябрь' <?= ($_POST["monthIndex"] =="4");?>>Сентябрь</option>
                    <option value='Октябрь'> <?= ($_POST["monthIndex"] =="5");?>Октябрь</option>
                    <option value='Ноябрь' <?= ($_POST["monthIndex"] =="6");?>>Ноябрь</option>
                </select>

                </p><button type="submit" name ="submit" class="btn btn-primary btn-lg btn-block" value="submit">Рассчитать</button>

            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php   if(empty($_POST["rawsTypesIndex"])) {
                        $rwtpErr = "Выберите тип сырья";
                    } else {
                        $rwtp = test_input($_POST["rawsTypesIndex"]);

                    if(empty($_POST["tonnagesIndex"])) {
                        $toniErr = "Выберите тоннаж";
                    } else {
                        $toni = test_input($_POST["tonnagesIndex"]);

                    if(empty($_POST["monthIndex"])) {
                        $moniErr = "Выберите месяц";
                    } else {
                        $moni = test_input($_POST["monthIndex"]); ?>

                    <form method="post" actions = "" id="form" class="needs-validation mt-5 mb-5" novalidate>
                    <p><div class="result" style="text-align: center;">Результаты расчета</div></p> 

                            <table class="table">
                                <tr>
                                    <td rowspan="4" style="text-align:center">Параметры расчета</td>
                                    <td>Месяц</td>
                                    <td><?php echo $_POST['monthIndex'];?></td>
                                </tr>
                                <tr>
                                    <td>Тип сырья</td>
                                    <td><?php echo $_POST['rawsTypesIndex'];?></td>
                                </tr>
                                <tr>
                                    <td>Тоннаж</td>
                                    <td><?php echo $_POST['tonnagesIndex'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:right"><b>Стоимость грузоперевозки: 
                                    <?php echo $prices[$key1][$key2][$key3];?> тыс.рублей</b></td>
                                </tr>
                            </table>

                    </form>

                        <?php 
                    };
                    };
                    }; ?>

        </div>
    </div>
</div>

<div class="container">

<?php if(empty($_POST["rawsTypesIndex"])) {
        $rwtpErr = "Выберите тип сырья";
    } else {
        $rwtp = test_input($_POST["rawsTypesIndex"]);

    if(empty($_POST["tonnagesIndex"])) {
        $toniErr = "Выберите тоннаж";
    } else {
        $toni = test_input($_POST["tonnagesIndex"]);

    if(empty($_POST["monthIndex"])) {
        $moniErr = "Выберите месяц";
    } else {
        $moni = test_input($_POST["monthIndex"]); ?>

            <form method="post" actions = "" id="form" class="needs-validation mt-5 mb-5" novalidate>
                <p><div class="result" style="text-align: center;">Таблица по которой производились подсчеты</div></p>

                    <table class="table">
                        <?php echo "<th>Месяц</th>"; ?>
                            <?php foreach($month as $key) {     
                                echo "<th rowspan=2>" . $key . "</th>"; 
                                };?>
                                <tr>
                                    <th>Тоннаж</th>
                                </tr>
                                <tr>
                                <?php foreach($prices[$key1] as $key => $values): {
                                            echo "<tr>";
                                            echo "<td>" . $tonnages[$key] . "</td>";
                                        foreach($values as $massiv) {
                                            echo "<td>" . $massiv . "</td>";
                                        };
                                    }; ?>
                                <?php endforeach; ?>
                                </tr>
                    </table>

            </form>

    <?php 
    };
    };
    }; ?>           
</div>
</div>
</body>
</html>
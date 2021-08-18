<?php

require_once __DIR__ . '/../app/Form.php';
require_once __DIR__ . '/../app/DeliveryCalculator.php';

$form = new Form();
$dc = new DeliveryCalculator($form);

if ($_POST['submit']) {
    $form->load($_POST);
    $form->validate();
}

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
            <form class="needs-validation mt-5 mb-5" method="post" actions = "user_validator.php" id="form"  novalidate>

            <p>

                <div>

                    <?php if ($form->hasRawTypesError()): ?>

                        <span class="error"><div style="color:#FF0000">
                            <b><?= $form->printRawTypesError() ?></b>
                        </span>

                    <?php endif;?>

                    <select class="custom-select" type= "text" name="rawsTypes" required>

                        <?php foreach ($form->getRawTypes() as $key => $type): ?>
                            <option value='<?= $type ?>' <?php if ($key === $form->rawsTypes): echo 'selected'; endif ?>><?= $type ?></option>
                        <?php endforeach ?>

                    </select>

                </div>

            </p>

                <div>

                    <?php if ($form->hasTonnageError()): ?>

                        <span class="error"><div style="color:#FF0000">
                            <b><?= $form->printTonnageError() ?></b>
                        </span>

                    <?php endif;?>

                    <select class="custom-select" type= "text" name="tonnages" required>

                        <?php foreach ($form->getTonnages() as $key => $type): ?>
                            <option value='<?= $type ?>' <?php if ($key === $form->tonnages): echo 'selected'; endif ?>><?= $type ?></option>
                        <?php endforeach ?>

                    </select>

                </div>

            </p>

                <div>

                    <?php if ($form->hasMonthError()): ?>

                        <span class="error"><div style="color:#FF0000">
                            <b><?= $form->printMonthError() ?></b>
                        </span>

                    <?php endif;?>

                    <select class="custom-select" type= "text" name="month" required>

                        <?php foreach ($form->getMonth() as $key => $type): ?>
                            <option value='<?= $type ?>' <?php if ($key === $form->month): echo 'selected'; endif ?>><?= $type ?></option>
                        <?php endforeach ?>

                    </select>

                </div>

            </p>

                <button type="submit" name ="submit" class="btn btn-primary btn-lg btn-block" value="submit">Рассчитать</button>

            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" actions = "" id="form" class="needs-validation mt-5 mb-5" novalidate>

                <?php if (! empty($form->errors)) {
                    return false; 
                    } ?>

                        <p><div class="result" style="text-align: center;">Результаты расчета</div></p>

                            <table class="table">
                                <tr>
                                    <td rowspan="4" style="text-align:center">Параметры расчета</td>
                                    <td>Месяц</td>
                                    <td><?php echo $form->attributes['month'] ?></td>
                                </tr>
                                <tr>
                                    <td>Тип сырья</td>
                                    <td><?php echo $form->attributes['rawsTypes']?></td>
                                </tr>
                                <tr>
                                    <td>Тоннаж</td>
                                    <td><?php echo $form->attributes['tonnages']?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:right"><b>Стоимость грузоперевозки: 
                                    <?php echo $dc->result();?> тыс.рублей</b></td>
                                </tr>
                            </table>

            </form>

        </div>
    </div>
</div>

<div class="container">
    <form method="post" actions = "" id="form" class="needs-validation mt-5 mb-5" novalidate>

        <?php if (! empty($form->errors)) {
            return false; 
            } ?>

                <p><div class="result" style="text-align: center;">Таблица по которой производились подсчеты</div></p>

                    <table class="table">
                        <th>Месяц</th>
                            <?php foreach ($dc->month as $key => $val) {
                                if ($key != 0)
                                echo "<th rowspan=2>" . $val . "</th>";
                                }; ?>
                                <tr>
                                    <th>Тоннаж</th>
                                </tr>
                                <tr>
                                <?php foreach ($dc->prices[$dc->keysRawsTypes] as $key => $values): {
                                            echo "<tr>";
                                            echo "<td>" . "<b>". $dc->tonnages[$key] ."</b>" . "</td>";
                                        foreach ($values as $massiv) {
                                            echo "<td>" . $massiv . "</td>";
                                        };
                                    }; ?>
                                <?php endforeach; ?>
                                </tr>
                    </table>

            </form>

</div>

</body>
</html>
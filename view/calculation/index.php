<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>GRUZPRO</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <article class="wrapper">
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

                                <select class="custom-select" type= "text" name="<?= $form->getRawTypesAttributeName() ?>" required>

                                    <?php foreach ($form->getRawTypes() as $key => $type): ?>
                                        <option value='<?= $key ?>' <?php if ($key === $form->rawsTypes): echo 'selected'; endif ?>><?= $type ?></option>
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

                                <select class="custom-select" type= "text" name="<?= $form->getTonnageAttributeName() ?>" required>

                                    <?php foreach ($form->getTonnages() as $key => $type): ?>
                                        <option value='<?= $key ?>' <?php if ($key === $form->tonnages): echo 'selected'; endif ?>><?= $type ?></option>
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

                                <select class="custom-select" type= "text" name="<?= $form->getMonthAttributeName() ?>" required>

                                    <?php foreach ($form->getMonth() as $key => $type): ?>
                                        <option value='<?= $key ?>' <?php if ($key === $form->month): echo 'selected'; endif ?>><?= $type ?></option>
                                    <?php endforeach ?>

                                </select>

                            </div>

                        </p>

                            <button type="submit" name ="submit" class="btn btn-secondary btn-lg btn-block" value="submit">Рассчитать</button>

                        </form>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="post" actions = "" id="form" class="needs-validation mt-5 mb-5" novalidate>

                            <?php if (empty($form->errors)): ?>
                                
                                <p>
                                    <div class="result" style="text-align: center;">Результаты расчета</div>
                                </p>

                                <table class="table">

                                    <tr>
                                        <td rowspan="4" style="text-align:center">Параметры расчета</td>
                                        <td>Месяц</td>
                                        <td><?= $form->printMonthName() ?></td>
                                    </tr>

                                    <tr>
                                        <td>Тип сырья</td>
                                        <td><?= $form->printRawsTypesName() ?></td>
                                    </tr>

                                    <tr>
                                        <td>Тоннаж</td>
                                        <td><?= $form->printTonnagesName() ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" style="text-align:right"><b>Стоимость грузоперевозки: <?= $calculator->result(); ?> тыс.рублей</b></td>
                                    </tr>

                                </table>

                            <?php endif ?>

                        </form>

                    </div>
                </div>
            </div>

            <div class="container">
                <form method="post" actions = "" id="form" class="needs-validation mt-5 mb-5" novalidate>

                    <?php if (empty($form->errors)): ?>

                        <p>
                            <div class="result" style="text-align: center;">Таблица по которой производились подсчеты</div>
                        </p>

                        <table class="table">
                            
                            <th>Месяц</th>

                            <?php foreach ($form->month as $key => $val): ?>
                                <?php if ($key != 0): ?>

                                    <th rowspan=2><?= $val ?></th>

                                <?php endif ?>

                            <?php endforeach ?>

                            <tr>
                                <th>Тоннаж</th>
                            </tr>

                            <?php foreach ($calculator->prices[$calculator->keysRawsTypes] as $key => $values): ?>
                                <tr>
                                    <td><b><?= $form->tonnages[$key] ?></b></td>

                                    <?php foreach ($values as $massiv): ?>
                                        <td><?= $massiv ?></td>

                                    <?php endforeach ?>

                                </tr>

                            <?php endforeach ?>

                        </table>
                            
                    <?php endif ?>

                </form>

            </div>
            
        </article>
        
    </body>
</html>
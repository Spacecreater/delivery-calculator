<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\models\form\Form;
use app\models\delivery_calculator\DeliveryCalculator;

$form = new Form();
$calculator = new DeliveryCalculator($form);

if ($_POST['submit']) {
    $form->load($_POST);
    $form->validate();
}

include __DIR__ . '/../view/calculation/index.php';
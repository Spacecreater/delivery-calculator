<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\models\form\Form;
use app\models\delivery_calculator\DeliveryCalculator;
use Laminas\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals();

$form = new Form();
$calculator = new DeliveryCalculator($form);

$requests = $request->getParsedBody();

if ($requests['submit']) {
    $form->load($requests);
    $form->validate();
}

include __DIR__ . '/../view/calculation/index.php';
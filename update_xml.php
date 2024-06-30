<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'update') {
        $row = $_POST['row'];
        $common = $_POST['common'];
        $scientific = $_POST['scientific'];
        $zone = $_POST['zone'];
        $light = $_POST['light'];
        $price = $_POST['price'];
        $availability = $_POST['availability'];

        $xml = simplexml_load_file('plant_catalog.xml');

        $xml->PLANT[$row - 1]->COMMON = $common;
        $xml->PLANT[$row - 1]->BOTANICAL = $scientific;
        $xml->PLANT[$row - 1]->ZONE = $zone;
        $xml->PLANT[$row - 1]->LIGHT = $light;
        $xml->PLANT[$row - 1]->PRICE = $price;
        $xml->PLANT[$row - 1]->AVAILABILITY = $availability;

        $xml->asXML('plant_catalog.xml');
    } elseif ($action == 'add') {
        $common = $_POST['common'];
        $scientific = $_POST['scientific'];
        $zone = $_POST['zone'];
        $light = $_POST['light'];
        $price = $_POST['price'];
        $availability = $_POST['availability'];

        $xml = simplexml_load_file('plant_catalog.xml');

        $newPlant = $xml->addChild('PLANT');
        $newPlant->addChild('COMMON', $common);
        $newPlant->addChild('BOTANICAL', $scientific);
        $newPlant->addChild('ZONE', $zone);
        $newPlant->addChild('LIGHT', $light);
        $newPlant->addChild('PRICE', $price);
        $newPlant->addChild('AVAILABILITY', $availability);

        $xml->asXML('plant_catalog.xml');
    } elseif ($action == 'delete') {
        $row = $_POST['row'];

        $xml = simplexml_load_file('plant_catalog.xml');

        unset($xml->PLANT[$row - 1]);

        $xml->asXML('plant_catalog.xml');
    }
}
?>
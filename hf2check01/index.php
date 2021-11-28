<?php
include('config.php');
include('Vendor/renderer.php');
include('Vendor/database.php');

session_start();

$ajax = (isset($_GET['ajax']) && $_GET['ajax'] === '1') ? true : false;
$menuData = Database::query('SELECT * from menu order by id asc');
$menuStructure = [];
foreach ($menuData as $data) {
    if ($data['szulo_id'] !== null) {
        $menuStructure[$data['szulo_id']]['gyerekek'][] = $data;
    } else {
        $menuStructure[$data['id']] = $data;
        $menuStructure[$data['id']]['gyerekek'] = [];
    }

}

$oldal = empty($_GET['url']) ? null : $_GET['url'];
if ($oldal === 'index.php' || $oldal === null) {
    $oldal = "kezdooldal";
}

if (false && !in_array($oldal, array_keys($routes))) {
    $oldal = 'kezdooldal';
}

require_once('Controller/' . $oldal . 'Controller.php');
require_once('Model/' . $oldal . 'Model.php');

$controllerName = $oldal . 'Controller';
$controller = new $controllerName();

$content = $controller->render();
if (!$ajax) {
    $header = render('View/header.php', $fejlec);
    $menu = render('View/menu.php', ['routes' => $menuStructure, 'keres' => $oldal]);
    $footer = render('View/footer.php', $lablec);
    echo $header;
    echo $menu;
}

echo $content;

if (!$ajax) {
    echo $footer;
}
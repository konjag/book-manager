<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/autoload.php';

use Core\Request;
use Core\Database;
use Core\Twig;

$db = new Database();
$db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$twig = new Twig();
$twig->load();

$request = new Request($_SERVER, $_POST, $_GET, $_FILES);

try {
    $controller = $request->getController();
    $method = $request->getMethod($controller);
    $param = $request->getParameter();

    $controller = new $controller($twig, $db);
    echo $controller->$method($param);
} catch (Exception $e) {
    echo sprintf(
        '<h3>%s</h3><h4>%s</h4><h5>%s:%s</h5>',
        $e->getCode(),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    );
}

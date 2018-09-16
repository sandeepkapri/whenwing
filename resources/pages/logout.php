<?php
    $path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
    require_once $path['root'] . '/includes/session.inc.php';
    session_destroy();
    header('Location: /');
?>
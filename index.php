<?php
require('controller/controller.php');

try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'home':
                homeT();
                break;
            case 'details':
                detailT();
                break;
            case 'modify':
                modifyT();
                break;
            default:
                homeT();
        }
    } else {
        homeT(); //default controller to call
    }
} catch (Exception $e) {
    $message = $e->getMessage();
    require('view/viewError.php');
}

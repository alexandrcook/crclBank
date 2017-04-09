<?php

foreach (glob("controllers/*.php") as $filename) {
    include_once $filename;
}

if (isset($controllerFileName)) {
    if ($controllerFileName == 'account') {
        $_method = $_GET['method'] ?? null;
        $_sort_obj = $_GET['sort_obj'] ?? null;
        if (isset($_SESSION['id'])) {
            if (!isset($action) and $_method == null) {
                if ($_sort_obj != null) {
                    accountIndex($pdo, $_sort_obj);
                } else {
                    accountIndex($pdo);
                }
            } elseif (isset($action) and $action == 'auth') {
                auth($pdo, $_POST);
            } elseif ($_method == 'add_account') {
                createAccount($pdo, $_POST);
            } elseif ($_method == 'delete_account') {
                deleteAccount($pdo, $_POST);
            } elseif ($_method == 'add_transaction') {
                createTransaction($pdo, $_POST);
            } elseif ($_method == 'delete_transaction') {
                deleteTransaction($pdo, $_POST);
            } elseif ($_sort_obj != null) {
                sortTable($pdo, $_GET);
            } else {
                view('404');
            }
        } else {
            $_SESSION['flash_msg'] = 'Для входа в банкинг нужно залогинизиpоваться';
            header('location: /login');
            exit();
        }
    }
} else {
    view('default');
}


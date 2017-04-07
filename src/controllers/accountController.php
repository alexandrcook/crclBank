<?php

require_once PATHROOT . '/models/accountModel.php';

function accountIndex($pdo){

    $userAccounts = getUserAccounts($pdo, $_SESSION['id']);

    view('account');
}
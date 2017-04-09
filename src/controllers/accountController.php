<?php

require_once PATHROOT . '/models/accountModel.php';

function accountIndex($pdo, $sort = null)
{
    if ($sort != null){
        $sort_table = $_GET['sort_obj'];
        $sort_by = $_GET['sort_param'];
        $sort_way = $_GET['sort_way'];
    }else {
        $sort_table = 'transactions';
        $sort_by = 'created_at';
        $sort_way = 'ASC';
    }

    $userAccounts = getUserAccounts($pdo, $_SESSION['id']);
    $userTransactions = getSortTable($pdo, $_SESSION['id'], $sort_table, $sort_by, $sort_way);
    $userBalance = getUserBallance($pdo, $_SESSION['id']);
    $categories = getTransactionCategories($pdo);

    view('account', ['userAccounts' => $userAccounts,
                     'categories' => $categories,
                     'transactions' => $userTransactions,
                     'balance' => $userBalance]);
}

//ACCOUNT

function createAccount($pdo)
{
    $uniq_id = uniqid();
    addAccount($pdo, $uniq_id, $_POST['name']);
    $_SESSION['flash_msg'] = 'Account "'.$_POST['name'].'" was created!';
    header('location: /account');
}

function deleteAccount($pdo)
{
    $uniq_id = $_POST['account_uniq_id'];
    $name = $_POST['account_name'];
    delAccount($pdo, $uniq_id);
    $_SESSION['flash_msg'] = 'Account "'.$name.'" was deleted';
    header('location: /account');
}

//TRANSACTIONS

function createTransaction($pdo)
{
    $account_id = $_POST['account_id'];
    $category_id = $_POST['category_id'];
    $description = $_POST['name'];
    $price = $_POST['price'];
    $created_at = date("Y-m-d H:i:s");
    addTransaction($pdo, $account_id, $category_id, $price, $description, $created_at);
    $_SESSION['flash_msg'] = 'Transaction "'.$description.'" was created!';

    header('location: /account');
}

function  deleteTransaction($pdo)
{
    $tr_id = $_POST['transaction_id'];
    $tr_name = $_POST['transaction_name'];
    $tr_time = $_POST['transaction_time'];
    delTransaction($pdo, $tr_id);
    $_SESSION['flash_msg'] = 'Transaction "'.$tr_name.'" ('.$tr_time.') was deleted!';

    header('location: /account');
}

//SORT

function sortTable($pdo)
{
    $sort_table = $_GET['sort_obj'];
    $sort_by = $_GET['sort_param'];
    $sort_way = $_GET['sort_way'];

    $userAccounts = getUserAccounts($pdo, $_SESSION['id']);
    $userTransactions = getSortTable($pdo, $_SESSION['id'], $sort_table, $sort_by, $sort_way);
    $userBalance = getUserBallance($pdo, $_SESSION['id']);
    $categories = getTransactionCategories($pdo);

    view('account', ['userAccounts' => $userAccounts,
        'categories' => $categories,
        'transactions' => $userTransactions,
        'balance' => $userBalance]);
}
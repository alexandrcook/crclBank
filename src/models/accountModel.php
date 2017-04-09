<?php

//ACCOUNTS

function getUserAccounts($pdo, $user_id)
{
    $userAccounts = sql($pdo,
        "SELECT * FROM `accounts` a 
         LEFT JOIN users_accounts u_a ON a.ac_id = u_a.account_id
         WHERE u_a.user_id = '{$user_id}'",
        [],
        'rows'
    );
    return $userAccounts;
}

function addAccount($pdo, $uniq_id, $description)
{
    $insertAccount=$pdo->prepare("INSERT INTO `accounts` (`unique_id`, `description`) VALUES ( ?, ?) ");
    $insertAccount->execute(array($uniq_id, $description));

    $id =$pdo->lastInsertId();

    $insert_user_account=$pdo->prepare("INSERT INTO `users_accounts` (`user_id`, `account_id`) VALUES ( ?, ?) ");
    $insert_user_account->execute(array($_SESSION['id'], $id));
}

function delAccount($pdo, $uniq_id)
{
    $delAccount = $pdo->prepare(
        "DELETE u,a
        FROM users_accounts u
        INNER JOIN accounts a
        ON a.ac_id = u.account_id
        WHERE a.unique_id = (?)"
    );
    $delAccount -> execute(array($uniq_id));
}

//TRANSACTIONS

function getTransactionCategories($pdo)
{
    $categories = sql($pdo,
        "SELECT * FROM `categories`",
        [],
        'rows'
    );
    return $categories;
}

function getUserBallance($pdo, $user_id)
{
    $balance = sql($pdo,
        "SELECT SUM(t.price) as balance 
        FROM `transactions` t 
        INNER JOIN users_accounts a ON a.account_id = t.account_id
        INNER JOIN users u ON u.us_id = a.user_id
        WHERE u.us_id = '{$user_id}'",
        [],
        'rows'
    );
    return $balance;
}


function getUserTransactions($pdo, $user_id)
{
    $userTransactions = sql($pdo,
        "SELECT t.*, t.description as trans_descr, 
                a.*, a.description as ac_description,
                c.*, c.name as cat_name 
         FROM `transactions` t
         LEFT JOIN `accounts` a ON a.ac_id = t.account_id
         LEFT JOIN `users_accounts` u_a ON a.ac_id = u_a.account_id
         LEFT JOIN `users` u ON u.us_id = u_a.user_id
         LEFT JOIN `categories` c ON t.category_id = c.ca_id
         WHERE u.us_id = '{$user_id}'",
        [],
        'rows'
    );
    return $userTransactions;
}

function addTransaction($pdo, $account_id, $category_id, $price, $description, $created_at)
{
    $delAccount = $pdo->prepare(
        "INSERT INTO `transactions` (`account_id`, `category_id`, `price`, `description`, `created_at`)
        VALUES (?, ?, ?, ?, ?)"
    );
    $delAccount -> execute(array($account_id, $category_id, $price, $description, $created_at));
}

function delTransaction($pdo, $tr_id)
{
    $delAccount = $pdo->prepare(
        "DELETE FROM `transactions`
        WHERE `tr_id` = (?)"
    );
    $delAccount -> execute(array($tr_id));
}

//SORT

function getSortTable($pdo, $user_id, $sort_table, $sort_by, $sort_way)
{
$userTransactions = sql($pdo,
    "SELECT `transactions`.*, `transactions`.description as trans_descr, 
                a.*, a.description as ac_description,
                c.*, c.name as cat_name 
         FROM `transactions`
         LEFT JOIN `accounts` a ON a.ac_id = `transactions`.account_id
         LEFT JOIN `users_accounts` u_a ON a.ac_id = u_a.account_id
         LEFT JOIN `users` u ON u.us_id = u_a.user_id
         LEFT JOIN `categories` c ON `transactions`.category_id = c.ca_id
         WHERE u.us_id = '{$user_id}'
         ORDER BY `{$sort_table}`.`{$sort_by}` {$sort_way}",
    [],
    'rows'
);
    return $userTransactions;
}


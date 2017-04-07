<?php

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
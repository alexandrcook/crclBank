<?php

function checkUniqueUser($pdo, $email, $login)
{
    $user = $pdo->query("SELECT * FROM `users` WHERE `login` ='{$login}' OR `email` = '{$email}'");
    $userCheck = $user->fetchAll();
    return $userCheck;
}

function regUser($pdo, $name, $email, $password, $login, $role, $date)
{

    $usersCount = sql($pdo,
        'SELECT COUNT(*) as users_count FROM `users`',
        [],
        'rows'
    );

    $insert = $pdo->prepare("INSERT INTO `users` (`name`,`role`,`email`,`password`,`login`,`last_activity`) VALUES (?,?,?,?,?,?)");
    $insert->execute(array($name, $role, $email, $password, $login, $date));
}

function authUser($pdo, $email)
{

    $authUser = sql($pdo,
        "SELECT * FROM `users` WHERE `email` ='{$email}'",
        [],
        'rows'
    );

    return $authUser;
}
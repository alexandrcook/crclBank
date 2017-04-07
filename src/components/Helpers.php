<?php

// Show view depends on $action
function view($viewRoot, $data = [], $viewName = null)
{
    include PATHROOT . '/views/header.php';

    if($viewRoot == 'admin'){
        include PATHROOT . '/views/admin/adminMenu.php';
    }
    if ($viewName) {
        include PATHROOT . '/views/' . $viewRoot . '/' . $viewName . 'view.php';
    } else {
        include PATHROOT . '/views/' . $viewRoot . '/index.php';
    }
    include PATHROOT . '/views/footer.php';
}

function pagination( $pagesCount, $section ) {
    global $_page;
    for( $page=0; $page < $pagesCount; $page++) {
        $curPage = $_page;
        if (($page < $curPage + 3 && $page > $curPage - 3)
            || ($page == 0)
            || ($page == $pagesCount - 1)
        ) {
            echo '<a href="'.$section.'?page='.$page.'">';
            echo ($curPage == $page) ? '<strong>' : '';
            echo $page + 1;
            echo ($curPage == $page) ? '</strong>' : '';
            echo '</a> |';
        }
    }
}

// Simple function to handle PDO prepared statements
function sql($pdo, $sql, $params = [], $return = null) {
    // Prepare statement
    $stmt = $pdo->prepare($sql);
    // Execute statement
    $res = $stmt->execute($params);
    // Decide whether to return the rows themselves, or query status
    if ($return == "rows") {
        return $stmt->fetchAll(); //rows
    }
    else {
        return $res; //boolean
    }
}

/**
 *
 *

$user = sql($pdo,
'SELECT * FROM `users` WHERE `id` = '.$id,
[],
'rows'
);


 */

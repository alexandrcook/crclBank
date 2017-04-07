<div class="row">
    <div class="col-xs-12">
        <h3>Ваш банкинг</h3>
        <hr>
    </div>
    <div class="container">
        <br>Страница личного кабинета пользователя. URL: “/account”. Доступна только залогинившемся пользователям.<br><br>
        Состоит из:<br><br>
        - имя и текущий баланс пользователя (сумма всех транзакций);<br>
        - открытые счета пользователя в формате списка:<br>
        - уникальный номер счета: uniqid()<br>
        - описание счета<br>
        - * есть возможность создавать общие счета. Если счет принадлежит еще кому-нибудь, выводить имя всех совместных владельцев<br><br>
        - таблица всех транзакций пользователя. По умолчанию отсортированная по дате, по новизне. Есть возможность сортировки по счетам. Состоит из колонок:<br>
        *****- название операции<br>
        *****- счет операции: описание + уникальный номер<br>
        *****- категория операции<br>
        *****- сумма в формате: -1 000.00, +500.50, +50 000.55<br>
        *****- дата и время<br><br>
        - форма создания нового счета. Состоит из полей:<br>
        *****- описание счета<br>
        *****- текстовый инпут<br><br>
        форма создания новой транзакции. Состоит из полей:<br>
        *****- название - текстовый инпут<br>
        *****- счет - селект с счетами пользователя (описания)<br>
        *****- категория - селект с вариантами: зар. плата, покупки, пожертвования, налоги, бизнес, кредит, депозит и т.д.<br>
        *****- сумма  - текстовый инпут<br>
    </div>
</div>
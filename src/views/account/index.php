<?php

$accounts = $data['userAccounts'];
$categories = $data['categories'];
$transactions = $data['transactions'];
$balance = $data['balance'];

?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
        <h3>Your banking ( Balance is [ <?= $balance[0]['balance'] ?> $ ] )</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h3 class="text-center">Create new transaction</h3>
        <form action="/account?method=add_transaction" method="post">
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                               placeholder="Transaction description">
                    </div>
                    <div class="form-group">
                        <label for="c2">Currency</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input name="price" type="number" value="0" step="10" class="form-control currency"
                                   id="c2"/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Account</label>
                        <select name="account_id" class="form-control" id="exampleSelect1">
                            <?php foreach ($accounts as $key => $account) {
                                ?>
                                <option value="<?= $account['ac_id'] ?>"><?= $account['description'] ?></option>
                                <?php
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category_id" class="form-control" id="exampleSelect1">
                            <?php foreach ($categories as $category) {
                                ?>
                                <option value="<?= $category['ca_id'] ?>"><?= $category['name'] ?></option>
                                <?php
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Complete transaction</button>
            </div>
        </form>
        <hr>
    </div>

    <div class="col-xs-12">
        <h3 class="text-center">Your transactions</h3>
        <table class="table table-bordered" id="transactions_tbl">
            <thead>
            <tr>
                <th>#</th>
                <th>Time
                    <div class="sort" style="display: inline">
                        <a href="/account?sort_obj=transactions&sort_param=created_at&sort_way=DESC"
                           class="btn btn-xs btn-success">New</a>
                        <a href="/account?sort_obj=transactions&sort_param=created_at&sort_way=ASC"
                           class="btn btn-xs btn-danger">Old</a>
                    </div>
                </th>
                <th>Description
                    <div class="sort" style="display: inline">
                        <a href="/account?sort_obj=transactions&sort_param=description&sort_way=ASC"
                           class="btn btn-xs btn-success">A-z</a>
                        <a href="/account?sort_obj=transactions&sort_param=description&sort_way=DESC"
                           class="btn btn-xs btn-danger">Z-a</a>
                    </div>
                </th>
                <th>Categ</th>
                <th>Account</th>
                <th>Deb/Cre
                    <div class="sort" style="display: inline">
                        <a href="/account?sort_obj=transactions&sort_param=price&sort_way=DESC"
                           class="btn btn-xs btn-success">$+</a>
                        <a href="/account?sort_obj=transactions&sort_param=price&sort_way=ASC"
                           class="btn btn-xs btn-danger">-$</a>
                    </div>
                </th>
                <th>Delete transaction</th>
            </tr>
            </thead>
            <?php foreach ($transactions as $key => $transaction) {
                ?>
                <tbody>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $transaction['created_at'] ?></td>
                    <td><?= $transaction['trans_descr'] ?></td>
                    <td><?= $transaction['name'] ?></td>
                    <td><?= $transaction['ac_description'] ?> (<?= $transaction['unique_id'] ?>)</td>
                    <td><?= $transaction['price'] ?> $</td>
                    <td>
                        <form action="/account?method=delete_transaction" method="post" style="text-align: center">
                            <input type="hidden" name="transaction_id" value="<?= $transaction['tr_id'] ?>">
                            <input type="hidden" name="transaction_name" value="<?= $transaction['name'] ?>">
                            <input type="hidden" name="transaction_time" value="<?= $transaction['created_at'] ?>">
                            <input type="submit" value="x" class="btn btn-danger btn-sm"">
                        </form>
                    </td>
                </tr>
                </tbody>
                <?php
            } ?>
            <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total:</th>
            <th>
                <?= $balance[0]['balance'] ?> $
            </th>
            <th></th>
            </tfoot>
        </table>
        <hr>
    </div>

    <div class="col-xs-6">
        <h3 class="text-center">Your accounts</h3>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>uniq_id</th>
                <th>Description</th>
                <th>Second users</th>
                <th>Delete account</th>
            </tr>
            </thead>
            <?php foreach ($accounts as $key => $account) {
                ?>
                <tbody>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $account['unique_id'] ?></td>
                    <td><?= $account['description'] ?></td>
                    <td></td>
                    <td>
                        <form action="/account?method=delete_account" method="post" style="text-align: center">
                            <input type="hidden" name="account_name" value="<?= $account['description'] ?>">
                            <input type="hidden" name="account_uniq_id" value="<?= $account['unique_id'] ?>">
                            <input type="submit" value="x" class="btn btn-danger btn-sm"">
                        </form>
                    </td>
                </tr>
                </tbody>
                <?php
            } ?>
        </table>
    </div>

    <div class="col-xs-12 col-sm-6">
        <h3 class="text-center">Create new account</h3>
        <form action="/account?method=add_account" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
            </div>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>
    </div>
    <div class="clearfix"></div>

</div>
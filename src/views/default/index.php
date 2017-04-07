<div class="row">
    <div class="col-xs-12">
        <h3>views/Default/index</h3>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Логинизация</h1>
                <div class="account-wall">
                    <img class="profile-img" src="https://i.ytimg.com/vi/gu-rGAAWr-8/hqdefault.jpg"
                         alt="">
                    <form class="form-signin" method="post" action="/login/auth">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Залогинизироваться</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" name="rememberMe" value="remember-me">
                            Помни меня
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
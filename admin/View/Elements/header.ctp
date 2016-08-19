<div class="navbar navbar-default" role="navigation">
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><span>Intellex</span></a>
        <?php if (!empty($admin)): ?>
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                            <span class="hidden-sm hidden-xs">
                                <?php echo $admin['name']; ?>
                            </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="/admins/edit">アカウント編集</a></li>
                    <li><a href="/admins/createAccount">管理者追加</a></li>
                    <li><a href="/admins/logout">ログアウト</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

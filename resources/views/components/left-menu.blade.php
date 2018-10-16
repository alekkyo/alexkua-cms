<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/dashboard">{{ config('app.name') }}</a>
            <a class="navbar-brand hidden" href="/dashboard">{{ config('app.name') }}</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <!-- Dashboard -->
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>

                <!-- Content -->
                <h3 class="menu-title">Content</h3>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-bag"></i>Manage items</a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-bag"></i>Manage purchases</a>
                </li>

                <!-- Settings -->
                <h3 class="menu-title">Settings</h3>

                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-user"></i>Manage users</a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-settings"></i>System configuration </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
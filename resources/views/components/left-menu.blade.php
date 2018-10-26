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
                    <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>

                <!-- Content -->
                <h3 class="menu-title">Content</h3>
                <li>
                    <a href="/items"> <i class="menu-icon ti-bag"></i>Items</a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-bag"></i>Purchases</a>
                </li>

                <!-- Settings -->
                <h3 class="menu-title">Settings</h3>

                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-user"></i>Users</a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-settings"></i>Settings</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
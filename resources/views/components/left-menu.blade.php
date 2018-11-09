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
                <li @if (View::hasSection('menu-dashboard'))class="active"@endif>
                    <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>

                <!-- Content -->
                <h3 class="menu-title">Content</h3>
                <li @if (View::hasSection('menu-items'))class="active"@endif>
                    <a href="/items"> <i class="menu-icon ti-bag"></i>Items</a>
                </li>
                <li @if (View::hasSection('menu-categories'))class="active"@endif>
                    <a href="/categories"> <i class="menu-icon ti-folder"></i>Categories</a>
                </li>
                <li @if (View::hasSection('menu-purchases'))class="active"@endif>
                    <a href="/purchases"> <i class="menu-icon ti-receipt"></i>Purchases</a>
                </li>

                <!-- Settings -->
                <h3 class="menu-title">Settings</h3>

                <li @if (View::hasSection('menu-users'))class="active"@endif>
                    <a href="/users"> <i class="menu-icon ti-user"></i>Users</a>
                </li>
                <li @if (View::hasSection('menu-settings'))class="active"@endif>
                    <a href="/settings"> <i class="menu-icon ti-settings"></i>Settings</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
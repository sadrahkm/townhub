<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="{{ \Illuminate\Support\Facades\Auth::user()->avatar_name }}" class="img-circle img-responsive"
                                     alt=""></a>
                    <h6>{{ ucwords(\Illuminate\Support\Facades\Auth::user()->name) }}</h6>
                    <span class="text-size-small">{{ ucwords(\Illuminate\Support\Facades\Auth::user()->address) }}</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                    <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span
                                    class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu"
                                                                       title="Main pages"></i></li>
                    <li class="active"><a href="index.blade.php"><i class="icon-home4"></i>
                            <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-users"></i> <span>Users</span></a>
                        <ul>
                            <li><a href="{{ route('admin.users.index') }}"><i class="icon-users4"></i>List of Users</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list3"></i> <span>Category</span></a>
                        <ul>
                            <li><a href="{{ route('admin.categories.index') }}"><i class="icon-list"></i>List of Categories</a></li>
                            <li><a href="{{ route('admin.categories.create') }}"><i class="icon-add-to-list"></i>Create New Category</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-location3"></i> <span>City</span></a>
                        <ul>
                            <li><a href="{{ route('admin.city.index') }}"><i class="icon-city"></i>List of Cities</a></li>
                            <li><a href="{{ route('admin.city.create') }}"><i class="icon-add-to-list"></i>Create New City</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>

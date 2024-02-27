<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ request()->is('/home') || request()->is('/home/*') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class='bx bxs-dashboard nav-icon'></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            @if (auth()->user()->user_type == 'admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class='bx bx-user nav-icon'></i>
                        <p>
                            Users Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li
                            class="nav-item {{ request()->is('/permissions') || request()->is('/permissions/*') ? 'active' : '' }}">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-frog"></i>
                                <p>
                                    {{ __('Permissions') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('/roles') || request()->is('/roles/*') ? 'active' : '' }}">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>
                                    {{ __('Roles') }}
                                </p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->is('/users') || request()->is('/users/*') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    {{ __('Users') }}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('/vendors') || request()->is('/vendors/*') ? 'active' : '' }}">
                    <a href="{{ route('vendors.index') }}" class="nav-link">
                        <i class='bx bx-user-circle nav-icon'></i>
                        <p>
                            {{ __('Vendor') }}
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item {{ request()->is('/sports-categories') || request()->is('/sports-categories/*') ? 'active' : '' }}">
                    <a href="{{ route('sports-categories.index') }}" class="nav-link">
                        <i class='nav-icon bx bxs-category'></i>
                        <p>
                            {{ __('Sports Categories') }}
                        </p>
                    </a>
                </li>
            @endif
            <li class="nav-item {{ request()->is('/sports') || request()->is('/sports/*') ? 'active' : '' }}">
                <a href="{{ route('sports.index') }}" class="nav-link">
                    <i class='nav-icon bx bxs-game'></i>
                    <p>
                        {{ __('Sports') }}
                    </p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('/bookings') || request()->is('/bookings/*') ? 'active' : '' }}">
                <a href="{{ route('bookings.index') }}" class="nav-link">
                    <i class='nav-icon bx bxs-game'></i>
                    <p>
                        {{ __('Bookings') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>

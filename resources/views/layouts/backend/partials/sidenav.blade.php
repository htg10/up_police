<div class="vertical-menu sidebar-light custom-sidebar">
    <div data-simplebar class="h-100 px-3 pt-3">
        <!-- Sidebar Menu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title text-muted">Main</li>

                <li>
                    <a href="{{ url(auth()->user()->role_id == 1 ? '/admin/index' : '/user/index') }}"
                        class="waves-effect d-flex align-items-center">
                        <i class="bx bx-home-circle me-2 fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (auth()->user()->role_id == 1)
                    <li class="menu-title text-muted">Admin Panel</li>
                    <!-- Users -->
                    <li class="mt-2">
                        <a href="/admin/user" class="waves-effect d-flex align-items-center">
                            <i class="bx bx-user me-2 fs-5"></i>
                            <span>All Users</span>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="/admin/daks" class="waves-effect d-flex align-items-center">
                            <i class="bx bx-file me-2 fs-5"></i>
                            <span>All Daks</span>
                        </a>
                    </li>
                @elseif (auth()->user()->role_id == 2)
                    <li class="menu-title text-muted">Admin Panel</li>
                    <li class="mt-2">
                        <a href="/user/daks/create" class="waves-effect d-flex align-items-center">
                            <i class="bx bx-file me-2 fs-5"></i>
                            <span>Add New Dak</span>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="/user/daks" class="waves-effect d-flex align-items-center">
                            <i class="bx bx-file me-2 fs-5"></i>
                            <span>All Daks</span>
                        </a>
                    </li>
                @else
                    <p>No role assigned</p>
                @endif

            </ul>
        </div>
        <!-- End Sidebar Menu -->
    </div>
</div>

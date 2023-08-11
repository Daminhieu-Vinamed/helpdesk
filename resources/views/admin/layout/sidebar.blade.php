<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Helpdesk <sup>Vinamed</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('admin.dashboard') ? '' : 'collapsed'}}" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Quản lý</div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.users.list') || request()->routeIs('admin.users.create') || request()->routeIs('admin.users.edit') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-users"></i>
            <span>Người dùng</span>
        </a>
        <div id="collapseUser" class="collapse {{ request()->routeIs('admin.users.list') || request()->routeIs('admin.users.create') || request()->routeIs('admin.users.edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chọn mục:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.users.list') || request()->routeIs('admin.users.edit') ? 'block' : '' }}" href="{{ route('admin.users.list') }}">Danh sách</a>
                @if (Auth::user()->role === config('constants.role.three'))
                    <a class="collapse-item {{ request()->routeIs('admin.users.create') ? 'block' : '' }}" href="{{ route('admin.users.create') }}">Thêm mới</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.tickets.list') || request()->routeIs('admin.tickets.create') || request()->routeIs('admin.tickets.edit') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTicket"
            aria-expanded="true" aria-controls="collapseTicket">
            <i class="fas fa-ticket-alt"></i>
            <span>Ticket</span>
        </a>
        <div id="collapseTicket" class="collapse {{ request()->routeIs('admin.tickets.list') || request()->routeIs('admin.tickets.create') || request()->routeIs('admin.tickets.edit') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chọn mục:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.tickets.list') || request()->routeIs('admin.tickets.edit') ? 'block' : '' }}" href="{{ route('admin.tickets.list') }}">Danh sách</a>
                <a class="collapse-item {{ request()->routeIs('admin.tickets.create') ? 'block' : '' }}" href="{{ route('admin.tickets.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cài đặt
    </div>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.questions.list') || request()->routeIs('admin.questions.create') || request()->routeIs('admin.questions.edit') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseQuestion"
            aria-expanded="true" aria-controls="collapseQuestion">
            <i class="fas fa-question"></i>
            <span>Câu hỏi</span>
        </a>
        <div id="collapseQuestion" class="collapse {{ request()->routeIs('admin.questions.list') || request()->routeIs('admin.questions.create') || request()->routeIs('admin.questions.edit') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chọn mục:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.questions.list') || request()->routeIs('admin.questions.edit') ? 'block' : '' }}" href="{{ route('admin.questions.list') }}">Danh sách</a>
                <a class="collapse-item {{ request()->routeIs('admin.questions.create') ? 'block' : '' }}" href="{{ route('admin.questions.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
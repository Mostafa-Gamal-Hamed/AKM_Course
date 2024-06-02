<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-text mx-3">
            Admin Page
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Manegars</div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManager"
            aria-expanded="false" aria-controls="collapseManager">
            <i class="fas fa-coins text-info"></i>
            <span>Financial Accounts</span>
        </a>
        <div id="collapseManager" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Curriculum:</h6>
                <a class="collapse-item" href="{{ route('oldAccounts') }}">Old Accounts</a>
                <a class="collapse-item" href="{{ route('currentAccounts') }}">Current accounts</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('addFinancial') }}">
            <i class="fas fa-plus text-warning"></i>
            <span>Add Financial Account</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Levels</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('curriculums') }}">
            <i class="fas fa-book text-info"></i>
            <span>Curriculums</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Plans and Pricing</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('plans') }}">
            <i class="fas fa-map text-info"></i>
            <span>Plans & Pricing</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('addPlan') }}">
            <i class="fas fa-plus text-warning"></i>
            <span>Add Plan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Managers</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('managers') }}">
            <i class="fas fa-user-tie text-info"></i>
            <span>All Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('addManager') }}">
            <i class="fas fa-plus text-warning"></i>
            <span>Add User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Tutors</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('tutors') }}">
            <i class="fas fa-chalkboard-teacher text-info"></i>
            <span>All Tutors</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('tutorClasses') }}">
            <i class="far fa-square text-info"></i>
            <span>All Classes</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('addTutor') }}">
            <i class="fas fa-plus text-warning"></i>
            <span>Add Tutor</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Heading -->
    <div class="sidebar-heading">Students</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('allStudents') }}">
            <i class="fas fa-users text-info"></i>
            <span>All Students</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('addStudent') }}">
            <i class="fas fa-plus text-warning"></i>
            <span>Add Student</span>
        </a>
    </li>

    {{-- Classes --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('demoClasses') }}">
            <i class="fas fa-school text-info"></i>
            <span>Demo class</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

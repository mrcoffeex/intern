<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="students">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Students <span class="text-bold bg-info p-1 pt-0 pb-0 text-dark" style="border-radius: 5px;"><?= countVerifiedStudentsBySchool($schoolId) ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="studentUnverified">
                <i class="ti-close menu-icon"></i>
                <span class="menu-title">Unverified <span class="text-bold bg-warning p-1 pt-0 pb-0 text-dark" style="border-radius: 5px;"><?= countUnVerifiedStudentsBySchool($schoolId) ?></span></span>
            </a>
        </li>

        <div class="dropdown-divider mt-3 mb-3"></div>

        <li class="nav-item">
            <a class="nav-link" href="support">
                <i class="ti-support menu-icon"></i>
                <span class="menu-title">Support</span>
            </a>
        </li>
    </ul>
</nav>
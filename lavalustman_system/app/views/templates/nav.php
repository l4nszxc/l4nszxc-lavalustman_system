<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?=site_url();?>">
            <span class="me-2">FlashCards Home</span>
        </a>
        
        <!-- Moved Courses here -->
        <?php if(logged_in()): ?>
        <div class="navbar-nav me-auto">
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Courses
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">The Contemporary World</a></li>
                    <li><a class="dropdown-item" href="#">Application Development and Emerging Technologies</a></li>
                    <li><a class="dropdown-item" href="#">Networking 2</a></li>
                    <li><a class="dropdown-item" href="#">IT Research Methods</a></li>
                    <li><a class="dropdown-item" href="#">Event Driven Programming</a></li>
                    <li><a class="dropdown-item" href="#">Systems Integration & Architecture 1</a></li>
                    <li><a class="dropdown-item" href="#">Web Systems and Technologies 2</a></li>
                </ul>
            </li>
        </div>
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <?php if(! logged_in()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('auth/login');?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('auth/register');?>">Register</a>
                </li>
                <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?=html_escape(get_username(get_user_id()));?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="<?=site_url('profile');?>">
                                <i class="bi bi-person-circle me-2"></i>View Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="<?=site_url('auth/logout');?>">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
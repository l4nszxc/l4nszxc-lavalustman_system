<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        
        <!-- Courses Dropdown with Home -->
        <?php if(logged_in()): ?>
        <div class="navbar-nav me-auto">
            <li class="nav-item dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-book-half me-2"></i>Courses
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="<?=site_url();?>">
                            <i class="bi bi-house-door me-2"></i>FlashCards Home
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-book me-2"></i>Soc Sci 114 - The Contemporary World
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-laptop me-2"></i>ITC 311 - Application Development and Emerging Technologies
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-router me-2"></i>ITP 311 - Networking 2
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-journal-text me-2"></i>ITP 312 - IT Research Methods
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-code-slash me-2"></i>ITP 313 - Event Driven Programming
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-diagram-3 me-2"></i>ITP 314 - Systems Integration & Architecture 1
                    </a></li>

                    <li><a class="dropdown-item" href="#">
                        <i class="bi bi-globe me-2"></i>ITE 311 - Web Systems and Technologies 2
                    </a></li>         
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('flashcards/create');?>">
                    <i class="bi bi-plus-circle me-2"></i>Create Flashcards
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('flashcards/list');?>">
                    <i class="bi bi-card-list me-2"></i>List Flashcards
                </a>
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
                            <a class="dropdown-item" href="<?=site_url('user-profile');?>">
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
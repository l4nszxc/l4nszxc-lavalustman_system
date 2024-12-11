<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?=site_url();?>">
            FlashCards.buzz
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <?php if(logged_in()): ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url();?>">
                        <i class="bi bi-house-door me-2"></i>Home
                    </a>
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
            </ul>
            <?php endif; ?>

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
                            <a class="dropdown-item text-danger" href="<?=site_url('auth/logout');?>" onclick="return confirm('Are you sure you want to logout?');">
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
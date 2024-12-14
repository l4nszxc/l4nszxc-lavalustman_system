<style>
    .navbar {
        padding: 1rem 0;
        background: linear-gradient(135deg, #1e3c72 0%, #1e3c72) !important;
    }
    .navbar-brand {
        color: #fff !important;
        font-weight: 600;
        font-size: 1.5rem;
        transition: transform 0.3s ease;
    }
    .navbar-brand:hover {
        transform: translateY(-2px);
    }
    .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .nav-link:hover {
        color: #fff !important;
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }
    .navbar-toggler {
        border: none;
        padding: 0.5rem;
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    }
    .dropdown-menu {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 0.5rem;
        min-width: 200px;
    }
    .dropdown-item {
        padding: 0.7rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }
    .dropdown-divider {
        margin: 0.5rem 0;
    }
    .text-danger {
        color: #dc3545 !important;
    }
    @media (max-width: 768px) {
        .navbar-collapse {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border-radius: 12px;
            padding: 1rem;
            margin-top: 1rem;
        }
        .nav-link {
            padding: 0.7rem 1rem !important;
        }
    }
</style>
<nav class="navbar navbar-expand-md shadow-sm">    
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
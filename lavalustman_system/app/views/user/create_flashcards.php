<?php include APP_DIR.'views/templates/header.php'; ?>

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        background: white;
        margin-top: 2rem;
    }
    .card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        font-size: 1.5rem;
        font-weight: 600;
        padding: 1.5rem;
        border-radius: 15px 15px 0 0 !important;
        border: none;
    }
    .card-body {
        padding: 2rem;
    }
    .form-group label {
        color: #1e3c72;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        font-size: 1rem;
        transition: all 0.3s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #1e3c72;
        box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.15);
    }
    .btn-primary {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-weight: 500;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
    }
    @media (max-width: 768px) {
        .card {
            margin: 1rem;
        }
        .card-body {
            padding: 1.5rem;
        }
    }
</style>
<body>
    <div id="app">
    <?php include APP_DIR.'views/templates/nav.php'; ?>  
    <main class="mt-3 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">
                        <i class="bi bi-plus-circle me-2"></i>Create Flashcard
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= site_url('flashcards/create'); ?>">
                            <div class="form-group mb-4">
                                <label for="category">
                                    <i class="bi bi-folder me-2"></i>Category
                                </label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">Select a course</option>
                                        <option value="Soc Sci 114">Soc Sci 114 - The Contemporary World</option>
                                        <option value="ITC 311">ITC 311 - Application Development and Emerging Technologies</option>
                                        <option value="ITP 311">ITP 311 - Networking 2</option>
                                        <option value="ITP 312">ITP 312 - IT Research Methods</option>
                                        <option value="ITP 313">ITP 313 - Event Driven Programming</option>
                                        <option value="ITP 314">ITP314 - Systems Integration & Architecture 1</option>
                                        <option value="ITE 311">ITE 311 - Web Systems and Technologies 2</option>
                                        </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="title">
                                        <i class="bi bi-card-text me-2"></i>Title
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>Create Flashcard
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>
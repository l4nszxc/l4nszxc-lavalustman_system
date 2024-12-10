<?php include APP_DIR.'views/templates/header.php'; ?>
<body>
    <div id="app">
    <?php include APP_DIR.'views/templates/nav.php'; ?>  
    <main class="mt-3 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Create Flashcard
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('flashcards/create'); ?>">
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
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
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Create Flashcard</button>
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
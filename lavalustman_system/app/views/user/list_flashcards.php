<?php include APP_DIR.'views/templates/header.php'; ?>
<body>
    <div id="app">
        <?php include APP_DIR.'views/templates/nav.php'; ?>  
        <main class="mt-3 pt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Your Flashcards</h4>
                                <a href="<?=site_url('flashcards/create')?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-plus-circle"></i> Create New
                                </a>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($flashcards)): ?>
                                    <div class="list-group">
                                        <?php foreach ($flashcards as $flashcard): 
                                            $stats = $this->flashcardsModel->get_quiz_statistics($flashcard['id']);
                                        ?>
                                            <div class="list-group-item list-group-item-action mb-2">
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <h5 class="mb-1">Category: <?= htmlspecialchars($flashcard['category']) ?></h5>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-<?= $flashcard['status'] === 'draft' ? 'warning' : 'success' ?> me-2">
                                                            <?= ucfirst($flashcard['status']) ?>
                                                        </span>
                                                        
                                                        <?php if($stats['takers_count'] > 0): ?>
                                                            <span class="badge bg-info me-2">
                                                                <?= $stats['takers_count'] ?> Quiz Taker(s)
                                                            </span>
                                                            <span class="badge bg-primary me-2">
                                                                Avg Score: <?= number_format($stats['avg_score'], 1) ?>%
                                                            </span>
                                                        <?php endif; ?>

                                                        <div class="btn-group">
                                                            <a href="<?=site_url('flashcards/edit/'.$flashcard['id'])?>" class="btn btn-sm btn-primary">
                                                                <i class="bi bi-pencil-square"></i> Edit
                                                            </a>
                                                            
                                                            <?php if ($flashcard['status'] === 'draft'): ?>
                                                                <a href="<?=site_url('flashcards/post/'.$flashcard['id'])?>" class="btn btn-sm btn-success">
                                                                    <i class="bi bi-check-circle"></i> Post
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="<?=site_url('flashcards/unpost/'.$flashcard['id'])?>" class="btn btn-sm btn-warning">
                                                                    <i class="bi bi-x-circle"></i> Unpost
                                                                </a>
                                                            <?php endif; ?>
                                                            
                                                            <a href="<?=site_url('flashcards/delete/'.$flashcard['id'])?>" 
                                                               class="btn btn-sm btn-danger" 
                                                               onclick="return confirm('Are you sure you want to delete this flashcard?')">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-1"><strong>Title:</strong> <?= htmlspecialchars($flashcard['title']) ?></p>
                                                <p class="mb-1"><strong>Cards:</strong> <?= $flashcard['item_count'] ?></p>
                                                <small class="text-muted">Created: <?= date('M d, Y h:i A', strtotime($flashcard['created_at'])) ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-4">
                                        <p class="mb-0">No flashcards found. Create your first flashcard!</p>
                                        <a href="<?=site_url('flashcards/create')?>" class="btn btn-primary mt-3">
                                            <i class="bi bi-plus-circle"></i> Create Flashcard
                                        </a>
                                    </div>
                                <?php endif; ?>
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
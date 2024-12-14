<?php include APP_DIR.'views/templates/header.php'; ?>
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        margin: 0; /* Reset margin */
        padding: 0; /* Reset padding */
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        background: white;
        margin: 2rem auto;
        max-width: 1200px;
    }
    .card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 15px 15px 0 0 !important;
        border: none;
    }
    .list-group-item {
        border: 2px solid #e9ecef;
        border-radius: 12px !important;
        margin-bottom: 1rem;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }
    .list-group-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-color: #1e3c72;
    }
    .item-header {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    .item-title {
        color: #1e3c72;
        font-weight: 600;
        margin: 0;
        flex: 1;
    }
    .badge-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        align-items: center;
    }
    .badge {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        white-space: nowrap;
    }
    .badge.bg-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%) !important;
        color: white;
    }
    .badge.bg-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
    }
    .badge.bg-info {
        background: linear-gradient(135deg, #17a2b8 0%, #0dcaf0 100%) !important;
    }
    .badge.bg-primary {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
    }
    .item-details {
        margin: 1rem 0;
    }
    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-primary {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
    }
    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
    }
    .btn-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        border: none;
        color: white !important;
    }
    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    @media (max-width: 768px) {
        .card {
            margin: 1rem;
        }
        .list-group-item {
            padding: 1rem;
        }
        .item-header {
            flex-direction: column;
        }
        .badge-container {
            margin-top: 0.5rem;
        }
        .action-buttons {
            flex-direction: column;
        }
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
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
        <h4 class="mb-0"><i class="bi bi-collection me-2"></i>My Flashcards</h4>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php if(empty($flashcards)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-emoji-neutral display-4 text-muted"></i>
                    <p class="mt-3 text-muted">No flashcards found. Create your first flashcard!</p>
                    <a href="<?=site_url('flashcards/create')?>" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-circle me-2"></i>Create Flashcard
                    </a>
                </div>
            <?php else: ?>
                <?php foreach ($flashcards as $flashcard): 
                    $stats = $this->flashcardsmodel->get_quiz_statistics($flashcard['id']);
                ?>
                    <div class="list-group-item">
                        <div class="item-header">
                            <h5 class="item-title">Category: <?= htmlspecialchars($flashcard['category']) ?></h5>
                            <div class="badge-container">
                                <span class="badge bg-<?= $flashcard['status'] === 'draft' ? 'warning' : 'success' ?>">
                                    <?= ucfirst($flashcard['status']) ?>
                                </span>
                                <?php if($stats['takers_count'] > 0): ?>
                                    <span class="badge bg-info">
                                        <?= $stats['takers_count'] ?> Quiz Taker(s)
                                    </span>
                                    <span class="badge bg-primary">
                                        Avg Score: <?= number_format($stats['avg_score'], 1) ?>%
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="item-details">
                            <p class="mb-1"><strong>Title:</strong> <?= htmlspecialchars($flashcard['title']) ?></p>
                            <p class="mb-1"><strong>Cards:</strong> <?= $flashcard['item_count'] ?></p>
                            <small class="text-muted">Created: <?= date('M d, Y h:i A', strtotime($flashcard['created_at'])) ?></small>
                        </div>

                        <div class="action-buttons">
                            <a href="<?=site_url('flashcards/edit/'.$flashcard['id'])?>" class="btn btn-primary">
                                <i class="bi bi-pencil-square me-2"></i>Edit
                            </a>
                            
                            <?php if ($flashcard['status'] === 'draft'): ?>
                                <a href="<?=site_url('flashcards/post/'.$flashcard['id'])?>" class="btn btn-success">
                                    <i class="bi bi-check-circle me-2"></i>Post
                                </a>
                            <?php else: ?>
                                <a href="<?=site_url('flashcards/unpost/'.$flashcard['id'])?>" class="btn btn-warning">
                                    <i class="bi bi-x-circle me-2"></i>Unpost
                                </a>
                            <?php endif; ?>
                            
                            <a href="<?=site_url('flashcards/delete/'.$flashcard['id'])?>" 
                               class="btn btn-danger"
                               onclick="return confirm('Are you sure you want to delete this flashcard?')">
                                <i class="bi bi-trash me-2"></i>Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
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
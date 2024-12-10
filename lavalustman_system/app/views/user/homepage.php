<?php include APP_DIR.'views/templates/header.php'; ?>
<style>
.flip-card-container {
    perspective: 1000px;
    margin-bottom: 20px;
}

.flip-card {
    position: relative;
    width: 100%;
    height: 200px;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 15px;
}

.flip-card-front {
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}

.flip-card-back {
    background-color: #f8f9fa;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
    transform: rotateY(180deg);
}

.category-badge {
    position: absolute;
    top: 10px;
    left: 10px;
}

.card-count {
    position: absolute;
    bottom: 10px;
    right: 10px;
    font-size: 0.8rem;
    color: #6c757d;
}
</style>

<body>
    <div id="app">
        <?php include APP_DIR.'views/templates/nav.php'; ?>  
        <main class="mt-3 pt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Posted Flashcards</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($posted_flashcards) && !empty($posted_flashcards)): ?>
                                    <div class="row">
                                        <?php foreach ($posted_flashcards as $flashcard): ?>
                                            <div class="col-md-6 col-lg-4">
                                                <a href="<?= site_url('flashcards/show/'.$flashcard['id']) ?>" class="text-decoration-none">
                                                    <div class="flip-card">
                                                        <div class="flip-card-front">
                                                            <span class="badge bg-primary category-badge"><?= htmlspecialchars($flashcard['category']) ?></span>
                                                            <h5 class="mb-3"><?= htmlspecialchars($flashcard['title']) ?></h5>
                                                            <p><?= htmlspecialchars($flashcard['items'][0]['question']) ?></p>
                                                            <span class="card-count">Card 1 of <?= count($flashcard['items']) ?></span>
                                                        </div>
                                                        <div class="flip-card-back">
                                                            <h5>Answer:</h5>
                                                            <p><?= htmlspecialchars($flashcard['items'][0]['answer']) ?></p>
                                                            <small class="text-muted">Click to flip back</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-5">
                                        <p class="mb-0">No posted flashcards found.</p>
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
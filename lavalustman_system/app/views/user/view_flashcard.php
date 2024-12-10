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
    cursor: pointer;
}

.flip-card.flipped {
    transform: rotateY(180deg);
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

.card-count {
    position: absolute;
    bottom: 10px;
    right: 10px;
    font-size: 0.8rem;
    color: #6c757d;
}

.navigation-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}
</style>
<body>
    <div id="app">
        <?php include APP_DIR.'views/templates/nav.php'; ?>  
        <main class="mt-3 pt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0"><?= htmlspecialchars($flashcard['title']) ?></h4>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($items)): ?>
                                <div id="flashcardCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($items as $index => $item): ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                <div class="flip-card-container">
                                                    <div class="flip-card">
                                                        <div class="flip-card-front">
                                                            <h5 class="mb-3"><?= htmlspecialchars($item['question']) ?></h5>
                                                            <span class="card-count">Card <?= $index + 1 ?> of <?= count($items) ?></span>
                                                        </div>
                                                        <div class="flip-card-back">
                                                            <h5>Answer:</h5>
                                                            <p><?= htmlspecialchars($item['answer']) ?></p>
                                                            <small class="text-muted">Click to flip back</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="navigation-buttons">
                                        <button class="btn btn-primary" type="button" data-bs-target="#flashcardCarousel" data-bs-slide="prev">
                                            Previous
                                        </button>
                                        <button class="btn btn-primary" type="button" data-bs-target="#flashcardCarousel" data-bs-slide="next">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            <?php else: ?>
                                <p>No items found for this flashcard.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.flip-card').click(function() {
            $(this).toggleClass('flipped');
        });
    });
    </script>
</body>
</html>
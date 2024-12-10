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
                                        <button class="carousel-control-prev" type="button" data-bs-target="#flashcardCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#flashcardCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <p>No items found for this flashcard.</p>
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
    <script>
    $(document).ready(function() {
        $('.flip-card').click(function() {
            $(this).toggleClass('flipped');
        });
    });
    </script>
</body>
</html>
<?php include APP_DIR.'views/templates/header.php'; ?>
<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 1.5rem;
        border: none;
    }
    
    .card-header h4 {
        font-weight: 600;
        margin: 0;
    }

    .flip-card-container {
        perspective: 1000px;
        margin-bottom: 30px;
    }

    .flip-card {
        position: relative;
        width: 100%;
        height: 250px;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
        cursor: pointer;
    }

    .flip-card:hover {
        transform: translateY(-5px);
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
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.8s ease;
    }

    .flip-card-front {
        background: white;
        border: 2px solid #e9ecef;
    }

    .flip-card-back {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        transform: rotateY(180deg);
    }

    .category-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.85rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .completed-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.85rem;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .card-count {
        position: absolute;
        bottom: 15px;
        right: 15px;
        font-size: 0.9rem;
        color: #6c757d;
        font-weight: 500;
    }

    .flip-card h5 {
        color: #1e3c72;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .flip-card-back h5 {
        color: white;
    }

    .flip-card p {
        color: #495057;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .flip-card-back p {
        color: rgba(255,255,255,0.9);
    }

    .flip-card-back small {
        color: rgba(255,255,255,0.7);
        position: absolute;
        bottom: 15px;
    }

    @media (max-width: 768px) {
        .flip-card {
            height: 200px;
        }
        
        .flip-card-front, .flip-card-back {
            padding: 15px;
        }
        
        .category-badge, .completed-badge {
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
        }
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
                                <h4 class="mb-0">All Courses Flashcards</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($posted_flashcards) && !empty($posted_flashcards)): ?>
                                    <div class="row">
                                    <?php foreach ($posted_flashcards as $flashcard): 
                                            $completed = $this->flashcardsmodel->has_user_completed(get_user_id(), $flashcard['id']);
                                            $best_score = $completed ? $this->flashcardsmodel->get_user_best_score(get_user_id(), $flashcard['id']) : null;
                                        ?>
                                            <div class="col-md-6 col-lg-4">
                                                <a href="<?= site_url('flashcards/show/'.$flashcard['id']) ?>" class="text-decoration-none">
                                                    <div class="flip-card">
                                                        <div class="flip-card-front">
                                                            <span class="badge bg-primary category-badge"><?= htmlspecialchars($flashcard['category']) ?></span>
                                                            <?php if($completed): ?>
                                                                <span class="badge bg-success position-absolute top-0 end-0 m-2">
                                                                    Completed (<?= $best_score['score'] ?>/<?= $best_score['total_questions'] ?>)
                                                                </span>
                                                            <?php endif; ?>
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
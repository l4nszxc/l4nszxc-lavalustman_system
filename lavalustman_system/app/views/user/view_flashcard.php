<?php include APP_DIR.'views/templates/header.php'; ?>
<style>
.flip-card-container {
    perspective: 1000px;
    margin-bottom: 20px;
}

.flip-card {
    position: relative;
    width: 100%;
    height: 300px;
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

.option {
    margin: 8px 0;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.option:hover {
    background-color: #f8f9fa;
}

.option.selected-correct {
    background-color: #28a745 !important;
    border-color: #28a745 !important;
    color: white !important;
}

.option.selected-incorrect {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
    color: white !important;
}

.option.show-correct {
    background-color: #28a745 !important;
    border-color: #28a745 !important;
    color: white !important;
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

.modal-score {
    font-size: 2rem;
    font-weight: bold;
    margin: 1rem 0;
}

.modal-percentage {
    font-size: 1.5rem;
    color: #6c757d;
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
                                <div id="flashcardCarousel" class="carousel slide" data-bs-interval="false">
                                    <div class="carousel-inner">
                                        <?php foreach ($items as $index => $item): 
                                            $options = array(
                                                'A' => trim($item['answer']),
                                                'B' => 'Option B',
                                                'C' => 'Option C',
                                                'D' => 'Option D'
                                            );
                                            shuffle($options);
                                        ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-question="<?= $index + 1 ?>">
                                                <div class="flip-card-container">
                                                    <div class="flip-card">
                                                        <div class="flip-card-front">
                                                            <h5 class="mb-3"><?= htmlspecialchars($item['question']) ?></h5>
                                                            <div class="options">
    <?php 
    $correctAnswer = trim($item['answer']);
    foreach ($options as $key => $option): 
        $optionValue = trim($option);
        $isCorrect = ($optionValue === $correctAnswer);
    ?>
        <div class="option" 
             data-option-value="<?= htmlspecialchars($optionValue) ?>"
             data-is-correct="<?= $isCorrect ? '1' : '0' ?>"
             data-correct-answer="<?= htmlspecialchars($correctAnswer) ?>">
            <?= $key ?>. <?= htmlspecialchars($optionValue) ?>
        </div>
    <?php endforeach; ?>
</div>
                                                            <span class="card-count">Card <?= $index + 1 ?> of <?= count($items) ?></span>
                                                        </div>
                                                        <div class="flip-card-back">
    <h5>Answer:</h5>
    <p><?= htmlspecialchars($item['answer'], ENT_QUOTES, 'UTF-8') ?></p>
    <small class="text-muted">Next question will be available after selecting an answer</small>
</div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="navigation-buttons">
                                        <button class="btn btn-primary prev-btn" type="button" data-bs-target="#flashcardCarousel" data-bs-slide="prev">
                                            Previous
                                        </button>
                                        <button class="btn btn-primary next-btn" type="button" data-bs-target="#flashcardCarousel" data-bs-slide="next" disabled>
                                            Next
                                        </button>
                                        <button class="btn btn-success finish-btn" type="button" style="display: none;">
                                            Finish
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

    <!-- Score Modal -->
    <div class="modal fade" id="scoreModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quiz Completed!</h5>
                </div>
                <div class="modal-body text-center">
                    <div id="finalScore" class="py-4"></div>
                </div>
                <div class="modal-footer">
                    <a href="<?= site_url('home') ?>" class="btn btn-primary">Return to Homepage</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
    let userScore = 0;
    let totalQuestions = $('.carousel-item').length;
    let currentQuestion = 1;
    let answeredQuestions = new Map();

    console.log('Quiz initialized:', {totalQuestions, currentQuestion});

    $('.option').click(function() {
        if (answeredQuestions.has(currentQuestion)) {
            return;
        }

        let selectedOption = $(this);
        let isCorrect = selectedOption.data('is-correct') === 1;
        let optionValue = selectedOption.data('option-value');
        let correctAnswer = selectedOption.data('correct-answer');
        let optionsContainer = selectedOption.closest('.options');

        console.log('Answer check:', {
            selected: optionValue,
            correct: correctAnswer,
            isCorrect: isCorrect
        });

        optionsContainer.find('.option').removeClass('selected-correct selected-incorrect show-correct');

        if (isCorrect) {
            selectedOption.addClass('selected-correct');
            userScore++;
            console.log('Correct! New score:', userScore);
        } else {
            selectedOption.addClass('selected-incorrect');
            optionsContainer.find(`.option[data-is-correct="1"]`).addClass('show-correct');
            console.log('Incorrect. Score remains:', userScore);
        }

        answeredQuestions.set(currentQuestion, isCorrect);
        selectedOption.closest('.flip-card').addClass('flipped');
        optionsContainer.find('.option').css('pointer-events', 'none');

        if (currentQuestion === totalQuestions) {
            $('.next-btn').hide();
            $('.finish-btn').show();
        } else {
            $('.next-btn').prop('disabled', false);
        }

        // Debug current state
        console.log('Current state:', {
            question: currentQuestion,
            score: userScore,
            totalAnswered: answeredQuestions.size,
            lastAnswer: isCorrect
        });
    });

    // Finish button handler
    $('.finish-btn').click(function() {
        let percentage = Math.round((userScore / totalQuestions) * 100);
        
        console.log('Final Results:', {
            score: userScore,
            total: totalQuestions,
            percentage: percentage,
            answers: Array.from(answeredQuestions.entries())
        });

        $.ajax({
            url: '<?= site_url("flashcards/save_result") ?>',
            method: 'POST',
            data: {
                flashcard_id: <?= $flashcard['id'] ?>,
                score: userScore,
                total_questions: totalQuestions
            },
            success: function(response) {
                $('#scoreModal').modal('show');
                $('#finalScore').html(`
                    <div class="modal-score">Score: ${userScore} out of ${totalQuestions}</div>
                    <div class="modal-percentage">Percentage: ${percentage}%</div>
                `);
            },
            error: function(xhr, status, error) {
                console.error('Error saving score:', error);
            }
        });
    });

    // Navigation handlers
    $('#flashcardCarousel').on('slide.bs.carousel', function (e) {
        let nextQuestion = $(e.relatedTarget).data('question');
        currentQuestion = nextQuestion;
        
        if (!answeredQuestions.has(nextQuestion)) {
            $('.next-btn').prop('disabled', true);
        }
    });
});
    </script>
</body>
</html>
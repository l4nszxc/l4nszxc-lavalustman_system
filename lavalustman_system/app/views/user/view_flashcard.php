<?php include APP_DIR.'views/templates/header.php'; ?>
<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 30px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    .card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
        border: none;
    }

    .flip-card-container {
        perspective: 1000px;
        margin: 20px auto;
        max-width: 700px;
    }

    .flip-card {
        position: relative;
        width: 100%;
        height: 400px;
        text-align: center;
        transition: transform 0.8s;
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
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .flip-card-front {
        background: white;
    }

    .flip-card-back {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        transform: rotateY(180deg);
    }

    .option {
        margin: 10px 0;
        padding: 15px 20px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.1rem;
        text-align: left;
        position: relative;
        overflow: hidden;
    }

    .option:hover {
        transform: translateX(5px);
        background-color: #f8f9fa;
        border-color: #1e3c72;
    }

    .option.selected-correct {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border-color: transparent;
        color: white;
        transform: scale(1.02);
    }

    .option.selected-incorrect {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border-color: transparent;
        color: white;
    }

    .option.show-correct {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border-color: transparent;
        color: white;
    }

    .navigation-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 30px 0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
    }

    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
    }

    .modal-content {
        border: none;
        border-radius: 15px;
    }

    .modal-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border-radius: 15px 15px 0 0;
        border: none;
    }

    .modal-score {
        font-size: 2.5rem;
        font-weight: 600;
        color: #1e3c72;
        margin: 1.5rem 0;
    }

    .modal-percentage {
        font-size: 1.8rem;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .flip-card {
            height: 450px;
        }
        
        .option {
            font-size: 1rem;
            padding: 12px 15px;
        }
        
        .card-header h4 {
            font-size: 1.2rem;
        }
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
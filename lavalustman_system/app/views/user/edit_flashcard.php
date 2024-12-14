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
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        border: none;
        padding: 1rem 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #1e3c72;
        box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.15);
    }
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }
    
    .btn {
        border-radius: 8px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
    }
    
    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    }
    
    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #218838 100%);
        border: none;
    }
    
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }
    
    .badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
    }
    
    label {
        color: #1e3c72;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }

        .card {
            margin-bottom: 1rem;
        }

        .card-header {
            padding: 1rem;
        }

        .card-body {
            padding: 1rem;
        }

        .card-header .d-flex {
            flex-direction: column;
            gap: 1rem;
        }

        .card-header .btn-group {
            width: 100%;
            justify-content: center;
        }

        .btn {
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            font-size: 0.9rem;
            padding: 0.5rem;
        }

        textarea.form-control {
            min-height: 80px;
        }

        label {
            font-size: 0.9rem;
        }

        .badge {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        h5 {
            font-size: 1.1rem;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        #flipCount {
            width: 100% !important;
            margin-bottom: 0.5rem;
        }

        .btn-sm {
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .card-header .d-flex.justify-content-between {
            flex-direction: column;
            gap: 1rem;
        }

        .card-header .d-flex.align-items-center {
            justify-content: center;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .col-md-8 {
            padding: 0;
        }

        .card {
            border-radius: 0;
        }

        .mt-3 {
            margin-top: 0 !important;
        }

        .pt-3 {
            padding-top: 0 !important;
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 me-3">Edit Flashcard</h5>
                                <?php if ($flashcard['status'] === 'posted'): ?>
                                    <span class="badge bg-success me-2">Posted</span>
                                    <a href="<?=site_url('flashcards/unpost/'.$flashcard['id'])?>" 
                                    class="btn btn-warning btn-sm" 
                                    onclick="return confirm('Are you sure you want to unpublish this flashcard?')">
                                        <i class="bi bi-arrow-down-circle"></i> Unpublish
                                    </a>
                                <?php else: ?>
                                    <span class="badge bg-warning me-2">Draft</span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <select class="form-select form-select-sm me-2" id="flipCount" style="width: 100px; display: inline-block;">
                                    <option value="">Flips</option>
                                    <?php for($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?> Cards</option>
                                    <?php endfor; ?>
                                </select>
                                <button type="button" class="btn btn-primary btn-sm" id="generateCards">
                                    <i class="bi bi-plus-circle"></i> Generate
                                </button>
                                <button type="button" class="btn btn-success btn-sm" id="addCard">
                                    <i class="bi bi-plus-lg"></i> Add Card
                                </button>
                            </div>
                        </div>
                            <div class="card-body">
                                <form id="flashcardForm" method="POST" action="<?= site_url('flashcards/update/'.$flashcard['id']) ?>">
                                    <div class="form-group mb-3">
                                        <label>Category</label>
                                        <select class="form-select" name="category" required>
                                            <option value="">Select a course</option>
                                            <option value="Soc Sci 114" <?= ($flashcard['category'] == 'Soc Sci 114') ? 'selected' : '' ?>>Soc Sci 114 - The Contemporary World</option>
                                            <option value="ITC 311" <?= ($flashcard['category'] == 'ITC 311') ? 'selected' : '' ?>>ITC 311 - Application Development and Emerging Technologies</option>
                                            <option value="ITP 311" <?= ($flashcard['category'] == 'ITP 311') ? 'selected' : '' ?>>ITP 311 - Networking 2</option>
                                            <option value="ITP 312" <?= ($flashcard['category'] == 'ITP 312') ? 'selected' : '' ?>>ITP 312 - IT Research Methods</option>
                                            <option value="ITP 313" <?= ($flashcard['category'] == 'ITP 313') ? 'selected' : '' ?>>ITP 313 - Event Driven Programming</option>
                                            <option value="ITP 314" <?= ($flashcard['category'] == 'ITP 314') ? 'selected' : '' ?>>ITP314 - Systems Integration & Architecture 1</option>
                                            <option value="ITE 311" <?= ($flashcard['category'] == 'ITE 311') ? 'selected' : '' ?>>ITE 311 - Web Systems and Technologies 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($flashcard['title']) ?>" required>
                                    </div>
                                    <div id="cardContainer">
                                        <?php if(!empty($items)): ?>
                                            <?php foreach ($items as $index => $item): ?>
                                            <div class="card mb-3">
                                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                                    <strong>Flip Card #<?= $index + 1 ?></strong>
                                                    <button type="button" class="btn btn-danger btn-sm deleteCard">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group mb-2">
                                                        <label>Question</label>
                                                        <textarea class="form-control" name="questions[]" required><?= htmlspecialchars($item['question']) ?></textarea>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label>Answer</label>
                                                        <textarea class="form-control" name="answers[]" required><?= htmlspecialchars($item['answer']) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
    <script>
$(document).ready(function() {
    function updateCardNumbers() {
        $('#cardContainer .card').each(function(index) {
            $(this).find('.card-header strong').text('Flip Card #' + (index + 1));
        });
    }

    $('#generateCards').click(function() {
        var count = $('#flipCount').val();
        if(!count) return;
        
        $('#cardContainer').empty();
        
        for(var i = 0; i < count; i++) {
            var newCard = `
                <div class="card mb-3">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <strong>Flip Card #${i + 1}</strong>
                        <button type="button" class="btn btn-danger btn-sm deleteCard">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label>Question</label>
                            <textarea class="form-control" name="questions[]" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>Answer</label>
                            <textarea class="form-control" name="answers[]" required></textarea>
                        </div>
                    </div>
                </div>
            `;
            $('#cardContainer').append(newCard);
        }
    });

    $('#addCard').click(function() {
        var count = $('#cardContainer .card').length;
        var newCard = `
            <div class="card mb-3">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <strong>Flip Card #${count + 1}</strong>
                    <button type="button" class="btn btn-danger btn-sm deleteCard">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Question</label>
                        <textarea class="form-control" name="questions[]" required></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Answer</label>
                        <textarea class="form-control" name="answers[]" required></textarea>
                    </div>
                </div>
            </div>
        `;
        $('#cardContainer').append(newCard);
    });

    $(document).on('click', '.deleteCard', function() {
        if($('#cardContainer .card').length > 1) {
            $(this).closest('.card').remove();
            updateCardNumbers();
        } else {
            alert('At least one card is required!');
        }
    });
});
</script>
</body>
</html>
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class FlashcardsController extends Controller {
    private $flashcardsModel;

    public function __construct() {
        parent::__construct();
        $this->flashcardsModel = new FlashcardsModel();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => get_user_id(),
                'category' => $_POST['category'],
                'title' => $_POST['title'],
                'status' => 'draft'
            ];
            
            $this->flashcardsModel->create_flashcard($data);
            redirect('flashcards/list');
        } else {
            include APP_DIR . 'views/user/create_flashcards.php';
        }
    }

    public function list() {
        $user_id = get_user_id();
        $flashcards = $this->flashcardsModel->get_flashcards_by_user($user_id);
        include APP_DIR . 'views/user/list_flashcards.php';
    }

    public function edit($id) {
        $flashcard = $this->flashcardsModel->get_flashcard($id);
        $items = $this->flashcardsModel->get_flashcard_items($id);
        include APP_DIR . 'views/user/edit_flashcard.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate required fields
            if (!isset($_POST['category']) || !isset($_POST['title'])) {
                redirect('flashcards/list');
                return;
            }

            // Update flashcard data
            $data = [
                'category' => $_POST['category'],
                'title' => $_POST['title']
            ];
            
            $this->flashcardsModel->update_flashcard($id, $data);
            
            // Delete existing items
            $this->flashcardsModel->delete_flashcard_items($id);
            
            // Add new items if questions exist
            if (isset($_POST['questions']) && is_array($_POST['questions'])) {
                foreach ($_POST['questions'] as $key => $question) {
                    if (!empty($question) && isset($_POST['answers'][$key])) {
                        $item_data = [
                            'flashcard_id' => $id,
                            'question' => $question,
                            'answer' => $_POST['answers'][$key]
                        ];
                        $this->flashcardsModel->add_flashcard_item($item_data);
                    }
                }
            }
            
            redirect('flashcards/list');
        } else {
            redirect('flashcards/list');
        }
    }

    public function post($id) {
        $this->flashcardsModel->update_status($id, 'posted');
        redirect('flashcards/list');
    }
    public function delete($id) {
        $this->flashcardsModel->delete_flashcard($id);
        redirect('flashcards/list');
    }
    public function unpost($id) {
        $this->flashcardsModel->update_status($id, 'draft');
        redirect('flashcards/list');
    }
}
?>



<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Home extends Controller {
    private $flashcardsModel;

    public function __construct() {
        parent::__construct();
        if(! logged_in()) {
            redirect('auth');
        }
        $this->flashcardsModel = new FlashcardsModel();
    }

    public function index() {
        $posted_flashcards = $this->flashcardsModel->get_posted_flashcards();
        // Add debug info
        error_log('Posted Flashcards: ' . print_r($posted_flashcards, true));
        
        include APP_DIR . 'views/user/homepage.php';
    }
}
?>
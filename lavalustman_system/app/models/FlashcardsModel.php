<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class FlashcardsModel extends Model {
    public function create_flashcard($data) {
        $this->db->table('flashcards')->insert($data);
        return $this->db->last_id();
    }

    public function add_flashcard_item($data) {
        return $this->db->table('flashcard_items')->insert($data);
    }

    public function get_flashcards_by_user($user_id) {
        $sql = "SELECT f.*, COUNT(fi.id) as item_count 
                FROM flashcards f 
                LEFT JOIN flashcard_items fi ON f.id = fi.flashcard_id 
                WHERE f.user_id = ? 
                GROUP BY f.id";
        return $this->db->raw($sql, array($user_id));
    }

    public function get_flashcard($id) {
        $sql = "SELECT * FROM flashcards WHERE id = ? LIMIT 1";
        $stmt = $this->db->raw($sql, array($id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function update_flashcard($id, $data) {
        return $this->db->table('flashcards')
                       ->where('id', $id)
                       ->update($data);
    }

    public function delete_flashcard_items($flashcard_id) {
        return $this->db->table('flashcard_items')
                       ->where('flashcard_id', $flashcard_id)
                       ->delete();
    }

    public function get_flashcard_items($flashcard_id) {
        $sql = "SELECT * FROM flashcard_items WHERE flashcard_id = ?";
        $stmt = $this->db->raw($sql, array($flashcard_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_status($flashcard_id, $status) {
        return $this->db->table('flashcards')
                       ->where('id', $flashcard_id)
                       ->update(['status' => $status]);
    }
    public function delete_flashcard($id) {
        return $this->db->table('flashcards')
                        ->where('id', $id)
                        ->delete();
    }
    public function get_posted_flashcards() {
        try {
            $sql = "SELECT f.*, fi.id as item_id, fi.question, fi.answer 
                    FROM flashcards f 
                    INNER JOIN flashcard_items fi ON f.id = fi.flashcard_id 
                    WHERE f.status = 'posted' 
                    ORDER BY f.created_at DESC";
            
            $stmt = $this->db->raw($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Debug raw results
            error_log('Raw SQL Results: ' . print_r($results, true));
            
            $flashcards = [];
            foreach ($results as $row) {
                if (!isset($flashcards[$row['id']])) {
                    $flashcards[$row['id']] = [
                        'id' => $row['id'],
                        'category' => $row['category'],
                        'title' => $row['title'],
                        'items' => []
                    ];
                }
                
                $flashcards[$row['id']]['items'][] = [
                    'id' => $row['item_id'],
                    'question' => $row['question'],
                    'answer' => $row['answer']
                ];
            }
            
            return array_values($flashcards);
        } catch (Exception $e) {
            error_log('Error in get_posted_flashcards: ' . $e->getMessage());
            return [];
        }
    }
    public function save_quiz_result($data) {
        return $this->db->table('quiz_results')->insert($data);
    }
    
    public function get_quiz_result($user_id, $flashcard_id) {
        $sql = "SELECT * FROM quiz_results WHERE user_id = ? AND flashcard_id = ? ORDER BY completed_at DESC LIMIT 1";
        $stmt = $this->db->raw($sql, array($user_id, $flashcard_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class userModel extends Model {
public function passwordhash($new) {
	$options = array('cost' => 4,);
	return password_hash($new, PASSWORD_BCRYPT, $options);
}

public function getUser() {
    $userId = $_SESSION['user_id'] ?? null;
    return $this->db->table('users')
        ->select('firstname, username, lastname, email, gender, created_at, phone, address, dob, class')
        ->where(['id' => $userId])
        ->get_all();
}

public function updatePhoneNumber($userId, $newPhone)
    {
        $data = array('phone' => $newPhone);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }

    public function updateAddress($userId, $newAddress)
    {
        $data = array('address' => $newAddress);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }

    public function updateName($userId, $newFirst, $newLast)
    {
        $data = array('firstname' => $newFirst, 'lastname' => $newLast);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }   
    
   

    public function updateGender($userId, $newGender)
    {
        $data = array('gender' => $newGender);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }

    public function updateBDAY($userId, $newBDAY)
    {
        $data = array('dob' => $newBDAY);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }

    public function updateRole($userId, $newRole)
    {
        $data = array('class' => $newRole);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }

    public function updateUsername($userId, $newUsername)
    {
        $data = array('username' => $newUsername);
            return $this->db->table('users')
                            ->where(['id' => $userId])
                            ->update($data);
       
    }

   
    public function updatePassword($userId, $new)
    {                 
        $hash = $this->passwordhash($new);
        $data = array('password' => $hash);
        return $this->db->table('users')
            ->where(['id' => $userId])
            ->update($data);
    }
    public function getUserById($userId) {
        return $this->db->table('users')
            ->select('id, firstname, lastname, email, gender, created_at, phone, address, dob, class, password')
            ->where(['id' => $userId])
            ->get();
    }
}


?>
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {
    public function __construct() {
    parent::__construct();
    $this->call->model('userModel');
}

public function index() {
    $this->call->model('userModel');
    $user = $this->userModel->getUser();

    $this->call->view('user/user-profile', ['user' => $user]);
}
public function profile() {
    if (!logged_in()) {
        redirect('auth/login');
    }

    $user = $this->userModel->getUser();
    $this->call->view('user/user-profile', ['user' => $user]);
}

public function updatePhoneNumber()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newPhoneNumber = $this->io->post('phone');

            // Validate the new phone number
            $this->form_validation->name('phone')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $phone = $this->userModel->updatePhoneNumber($userId, $newPhoneNumber);
                if ($phone) {
                    $this->session->set_flashdata(['alert' => 'Phone number updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Invalid phone number format']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updateAddress() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newAddress = $this->io->post('address');

            // Validate the new phone number
            $this->form_validation->name('address')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $address = $this->userModel->updateAddress($userId, $newAddress);
                if ($address) {
                    $this->session->set_flashdata(['alert' => 'Address updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Oh no']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updateUsername() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newUsername = $this->io->post('username');

            // Validate the new phone number
            $this->form_validation->name('username')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $username = $this->userModel->updateUsername($userId, $newUsername);
                if ($username) {
                    $this->session->set_flashdata(['alert' => 'Username updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Oh no']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updateGender() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newGender = $this->io->post('gender');

            // Validate the new phone number
            $this->form_validation->name('gender')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $gender = $this->userModel->updateGender($userId, $newGender);
                if ($gender) {
                    $this->session->set_flashdata(['alert' => 'Gender updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Oh no']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updateName() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newFirst = $this->io->post('firstname');
            $newLast = $this->io->post('lastname');

            // Validate the new phone number
            $this->form_validation->name('firstname')
                ->required();
                $this->form_validation->name('lastname')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $name = $this->userModel->updateName($userId, $newFirst, $newLast);
                if ($name) {
                    $this->session->set_flashdata(['alert' => 'Name updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Oh no']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updateBDAY() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newBDAY = $this->io->post('dob');

            // Validate the new phone number
            $this->form_validation->name('dob')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $dob = $this->userModel->updateBDAY($userId, $newBDAY);
                if ($dob) {
                    $this->session->set_flashdata(['alert' => 'B-day updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Oh no']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updateRole() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $newRole = $this->io->post('role');

            // Validate the new phone number
            $this->form_validation->name('role')
                ->required();

            if ($this->form_validation->run()) {
                // Call the model function to update the phone number
                $role = $this->userModel->updateRole($userId, $newRole);
                if ($role) {
                    $this->session->set_flashdata(['alert' => 'Role updated successfully']);
                } else {
                    $this->session->set_flashdata(['alert' => 'Oh no']);
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        // Redirect or load the view for updating phone number
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = get_user_id();
            $currentPassword = $this->io->post('current_password');
            $newPassword = $this->io->post('new_password');
            $confirmPassword = $this->io->post('confirm_password');
    
            // Validate the new password
            $this->form_validation->name('new_password')
                ->required()
                ->min_length(8, 'New password must be at least 8 characters.');
            $this->form_validation->name('confirm_password')
                ->required()
                ->matches('new_password', 'Passwords did not match.');
    
            if ($this->form_validation->run()) {
                // Verify current password
                $user = $this->userModel->getUserById($userId);
                if (password_verify($currentPassword, $user['password'])) {
                    // Update the password
                    $this->userModel->updatePassword($userId, $newPassword);
                    set_flash_alert('success', 'Password updated successfully.');
                } else {
                    set_flash_alert('danger', 'Current password is incorrect.');
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }
    
        // Redirect or load the view for updating password
        $user = $this->userModel->getUser();
        $this->call->view('user/user-profile', ['user' => $user]);
    }
    public function verifyPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = get_user_id();
            $currentPassword = $this->io->post('current_password');
    
            // Verify current password
            $user = $this->userModel->getUserById($userId);
            if (password_verify($currentPassword, $user['password'])) {
                echo 'verified';
            } else {
                echo 'incorrect';
            }
        }
    }
}
?>
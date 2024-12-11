<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-info {
            margin-bottom: 10px;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .profile-info h4 {
            margin: 0;
            font-size: 1.1rem;
            color: #495057;
            width: 40%;
        }
        .profile-info p {
            margin: 0;
            font-size: 1rem;
            color: #6c757d;
            text-align: right;
            width: 50%;
        }
        .btn-edit {
            font-size: 1.5rem;
            color: #495057;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-left: 10px;
        }
        .profile-container a {
            text-decoration: none;
        }
        .action-card {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .action-card h4 {
            margin-bottom: 20px;
        }
        .action-card a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<?php
include APP_DIR.'views/templates/header.php';
include APP_DIR.'views/templates/nav.php';
?>  

<div class="profile-container">
    <?php if (!empty($user)): ?>
        <?php foreach ($user as $users): ?>
        <div class="profile-header">
            <h2>
                <a data-toggle="modal" data-target="#editNameModal" style="text-decoration: none; color: inherit;">
                    <?= htmlspecialchars($users['firstname'] ?? 'Set first name') ?> <?= htmlspecialchars($users['lastname'] ?? 'Set last name') ?>
                </a>
            </h2>
        </div>
        <div class="profile-info">
            <h4>Email:</h4>
            <p><?= htmlspecialchars($users['email'] ?? 'Set email') ?></p>
        </div>
        <a class="profile-info" data-toggle="modal" data-target="#editNameModal">
            <h4>Fullname:</h4>
            <p><?= htmlspecialchars($users['firstname'] ?? ' ') ?> <?= htmlspecialchars($users['lastname'] ?? ' ') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editUsernameModal">
            <h4>Username:</h4>
            <p><?= htmlspecialchars($users['username'] ?? 'Set username') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editPhoneModal">
            <h4>Phone:</h4>
            <p><?= htmlspecialchars($users['phone'] ?? 'Set phone') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editAddressModal">
            <h4>Address:</h4>
            <p><?= htmlspecialchars($users['address'] ?? 'Set address') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editGenderModal">
            <h4>Gender:</h4>
            <p><?= htmlspecialchars($users['gender'] ?? 'Set gender') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editDobModal">
            <h4>Birthdate:</h4>
            <p><?= htmlspecialchars($users['dob'] ?? 'Set birthdate') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <div class="profile-info" data-toggle="modal" data-target="#editRoleModal">
            <h4>Role:</h4>
            <p><?= htmlspecialchars($users['class']) ?></p>
            <button type="button" class="btn-edit">></button>
        </div>
        <div class="profile-info">
            <h4>Joined:</h4>
            <p><?= htmlspecialchars($users['created_at']) ?></p>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No user data available.</p>
    <?php endif; ?>
</div>

<!-- Action Card -->
<div class="action-card">
    <h4>Account Actions</h4>
    <a class="profile-info"  data-toggle="modal" data-target="#updatePasswordModal">
        <h4 id="actionan">Update Password</h4>
        <button type="button"  class="btn-edit">></button>
    </a>
    <a href="<?=site_url('auth/logout');?>" class="profile-info" onclick="return confirm('Are you sure you want to logout?');">
        <h4>Logout</h4>
    </a>
</div>

<!-- Flash Messages -->
<?php if (isset($_SESSION['flash_alert'])): ?>
    <div class="alert alert-<?= $_SESSION['flash_alert']['type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['flash_alert']['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['flash_alert']); ?>
<?php endif; ?>

<!-- Update Password Modal -->
<div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePasswordModalLabel">Update Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-password-form" method="POST" action="<?=site_url('update-password');?>">
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" class="form-control" id="current-password" name="current_password" required>
                        <button type="button" class="btn btn-secondary mt-2" id="verify-password-btn">Verify Password</button>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" class="form-control" id="new-password" name="new_password" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_password" required disabled>
                    </div>
                    <button type="submit" class="btn btn-primary" id="update-password-btn" disabled>Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editNameModal" tabindex="-1" role="dialog" aria-labelledby="editNameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNameModalLabel">Edit Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?=site_url('update-name');?>">
                    <div class="form-group">
                        <label for="modal-firstname">First Name</label>
                        <input type="text" class="form-control" id="modal-firstname" name="firstname" value="<?= htmlspecialchars($users['firstname'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="modal-lastname">Last Name</label>
                        <input type="text" class="form-control" id="modal-lastname" name="lastname" value="<?= htmlspecialchars($users['lastname'] ?? '') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Name</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editUsernameModal" tabindex="-1" role="dialog" aria-labelledby="editUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsernameModalLabel">Edit Username</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?=site_url('update-username');?>">
                    <div class="form-group">
                        <label for="modal-address">Username</label>
                        <input type="text" class="form-control" id="modal-address" name="username" value="<?= htmlspecialchars($users['username'] ?? '') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Phone Modal -->
<div class="modal fade" id="editPhoneModal" tabindex="-1" role="dialog" aria-labelledby="editPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhoneModalLabel">Edit Phone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=site_url('user-profile');?>">
                    <div class="form-group">
                        <label for="modal-phone">Phone</label>
                        <input type="number" class="form-control" id="modal-phone" name="phone" value="<?= htmlspecialchars($users['phone'] ?? '') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Address Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=site_url('update-address');?>">
                    <div class="form-group">
                        <label for="modal-address">Address</label>
                        <input type="text" class="form-control" id="modal-address" name="address" value="<?= htmlspecialchars($users['address'] ?? '') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Gender Modal -->
<div class="modal fade" id="editGenderModal" tabindex="-1" role="dialog" aria-labelledby="editGenderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGenderModalLabel">Edit Gender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=site_url('update-gender');?>">
                    <div class="form-group">
                        <label for="modal-gender">Gender</label>
                        <select class="form-control" id="modal-gender" name="gender" required>
                            <option value="Male" <?= ($users['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                            <option value="Female" <?= ($users['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=site_url('update-role');?>">
                    <div class="form-group">
                        <label for="modal-role">Role</label>
                        <select class="form-control" id="modal-role" name="role" required>
                            <option value="Student" <?= ($users['class'] == 'Student') ? 'selected' : '' ?>>Student</option>
                            <option value="Teacher" <?= ($users['class'] == 'Teacher') ? 'selected' : '' ?>>Teacher</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Birthdate Modal -->
<div class="modal fade" id="editDobModal" tabindex="-1" role="dialog" aria-labelledby="editDobModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDobModalLabel">Edit Birthdate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=site_url('update-bday');?>">
                    <div class="form-group">
                        <label for="modal-dob">Birthdate</label>
                        <input type="date" class="form-control" id="modal-dob" name="dob" value="<?= htmlspecialchars($users['dob'] ?? '') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#verify-password-btn').click(function() {
        var currentPassword = $('#current-password').val();
        $.ajax({
            url: '<?=site_url('verify-password');?>',
            type: 'POST',
            data: { current_password: currentPassword },
            success: function(response) {
                if (response === 'verified') {
                    $('#new-password').prop('disabled', false);
                    $('#confirm-password').prop('disabled', false);
                    $('#update-password-btn').prop('disabled', false);
                    alert('Password verified. You can now set a new password.');
                } else {
                    alert('Current password is incorrect.');
                }
            }
        });
    });
});
</script>
</body>
</html>
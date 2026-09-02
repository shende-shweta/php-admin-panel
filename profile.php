<?php
/**
 * Profile Page - User profile management
 * Displays user information and allows editing
 */

// Mock user data - replace with actual session data
$user_data = [
    'id' => 1,
    'name' => 'Ilhomjonov Iqbolshoh',
    'email' => 'iqbolshoh@example.com',
    'phone' => '+1 (555) 123-4567',
    'bio' => 'Web Developer & Admin Panel Expert',
    'profile_picture' => './src/images/profile_picture/default.png',
    'joined_date' => '2023-01-15'
];

include './header.php';
?>

<div class="row">
    <!-- Profile Info Card -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img src="<?= htmlspecialchars($user_data['profile_picture']) ?>" alt="User" class="img-circle elevation-2" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
                <h3 class="profile-username text-center mt-3"><?= htmlspecialchars($user_data['name']) ?></h3>
                <p class="text-muted text-center"><?= htmlspecialchars($user_data['bio']) ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"><?= htmlspecialchars($user_data['email']) ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Phone</b> <a class="float-right"><?= htmlspecialchars($user_data['phone']) ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Joined</b> <a class="float-right"><?= htmlspecialchars(date('M d, Y', strtotime($user_data['joined_date']))) ?></a>
                    </li>
                </ul>

                <a href="#edit-profile" class="btn btn-primary btn-block btn-sm" data-toggle="modal">
                    <b>Edit Profile</b>
                </a>
            </div>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#tab-settings" data-toggle="tab">Settings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-password" data-toggle="tab">Change Password</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <!-- Settings Tab -->
                    <div id="tab-settings" class="tab-pane fade show active">
                        <form id="profile-form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user_data['name']) ?>" required>
                                <small class="form-text text-muted">Your full name</small>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" required>
                                <small class="form-text text-muted">Your email address</small>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user_data['phone']) ?>">
                                <small class="form-text text-muted">Your contact number</small>
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3"><?= htmlspecialchars($user_data['bio']) ?></textarea>
                                <small class="form-text text-muted">Tell us about yourself</small>
                            </div>

                            <div class="form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture" accept="image/jpeg,image/png,image/gif">
                                        <label class="custom-file-label" for="profile_picture">Choose file</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF (Max: 2MB)</small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Tab -->
                    <div id="tab-password" class="tab-pane fade">
                        <form id="password-form" method="POST">
                            <div class="form-group">
                                <label for="current_password">Current Password *</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                <small class="form-text text-muted">Enter your current password</small>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password *</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required minlength="8">
                                <small class="form-text text-muted">At least 8 characters</small>
                                <div id="password-strength" class="mt-2">
                                    <small>Password Strength:</small>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div id="strength-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password *</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <small class="form-text text-muted">Re-enter your new password</small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for form handling -->
<script>
    (function() {
        'use strict';

        // Profile form submission
        const profileForm = document.getElementById('profile-form');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Success!',
                    text: 'Profile updated successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Replace with actual form submission
                    // this.submit();
                });
            });
        }

        // Password form submission
        const passwordForm = document.getElementById('password-form');
        if (passwordForm) {
            passwordForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const newPassword = document.getElementById('new_password').value;
                const confirmPassword = document.getElementById('confirm_password').value;

                if (newPassword !== confirmPassword) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Passwords do not match.',
                        icon: 'error'
                    });
                    return;
                }

                if (newPassword.length < 8) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Password must be at least 8 characters.',
                        icon: 'error'
                    });
                    return;
                }

                Swal.fire({
                    title: 'Success!',
                    text: 'Password changed successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Replace with actual form submission
                    // this.submit();
                    passwordForm.reset();
                    updatePasswordStrength();
                });
            });
        }

        // Password strength indicator
        const newPasswordInput = document.getElementById('new_password');
        if (newPasswordInput) {
            newPasswordInput.addEventListener('input', updatePasswordStrength);
        }

        function updatePasswordStrength() {
            const password = newPasswordInput.value;
            const strengthBar = document.getElementById('strength-bar');
            let strength = 0;

            if (password.length >= 8) strength += 25;
            if (/[a-z]/.test(password)) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;

            strengthBar.style.width = strength + '%';
            strengthBar.className = 'progress-bar';

            if (strength <= 25) {
                strengthBar.classList.add('bg-danger');
            } else if (strength <= 50) {
                strengthBar.classList.add('bg-warning');
            } else if (strength <= 75) {
                strengthBar.classList.add('bg-info');
            } else {
                strengthBar.classList.add('bg-success');
            }
        }

        // File input label update
        const fileInput = document.getElementById('profile_picture');
        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                const fileName = this.files[0] ? this.files[0].name : 'Choose file';
                this.nextElementSibling.textContent = fileName;
            });
        }
    })();
</script>

<?php include './footer.php'; ?>

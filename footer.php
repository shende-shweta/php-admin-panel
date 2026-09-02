                </div>
                <!-- Container-fluid closed -->
            </section>
            <!-- Content section closed -->
        </div>
        <!-- Content wrapper closed -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Admin Panel <strong><a target="_blank" href="https://iqbolshoh.uz/" rel="noopener noreferrer">Iqbolshoh.uz</a></strong>
            </div>
            <strong>&copy; <?php echo date('Y'); ?></strong> All rights reserved.
        </footer>

        <!-- Wrapper closed -->
    </div>
    <!-- Body closed -->

    <!-- Logout Script -->
    <script>
        (function() {
            'use strict';

            /**
             * Logout handler with SweetAlert2 confirmation
             */
            function initLogout() {
                const logoutBtn = document.getElementById('logout-btn');
                if (!logoutBtn) return;

                // Handle click event
                logoutBtn.addEventListener('click', handleLogoutClick);

                // Handle Enter key on logout button
                logoutBtn.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.code === 'Space') {
                        e.preventDefault();
                        handleLogoutClick();
                    }
                });
            }

            /**
             * Handle logout button click
             */
            function handleLogoutClick() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will be logged out!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log me out!',
                    cancelButtonText: 'Cancel',
                    allowOutsideClick: false,
                    allowEscapeKey: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show success message
                        Swal.fire({
                            title: 'Logged out!',
                            text: 'You have been successfully logged out.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            willClose: function() {
                                // Redirect to logout or login page
                                window.location.href = './logout.php';
                            }
                        });
                    }
                });
            }

            // Initialize logout handler when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initLogout);
            } else {
                initLogout();
            }
        })();
    </script>
</body>

</html>

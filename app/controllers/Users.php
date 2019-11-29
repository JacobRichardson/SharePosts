<?php

    // Users class.
    class Users extends Controller {

        // Constructor.
        public function __construct() {
            
            // Retrieve the users model.
            $this->userModel = $this->model('User');
        }

        // Register method.
        public function register () {

            // If the method is a post.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data.
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Data for the form.
                $data = [
                    'name' => trim($_POST['name'])
                    , 'email' => trim($_POST['email'])
                    , 'password' => trim($_POST['password'])
                    , 'confirm_password' => trim($_POST['confirm_password'])
                    , 'name_error' => ''
                    , 'email_error' => ''
                    , 'password_error' => ''
                    , 'confirm_password_error' => ''
                ];
            
                // If the email is empty.
                if (empty($data['email'])) {

                    // Set the email error equal to an error.
                    $data['email_error'] = 'Please enter email.';
                }
                // Email is not empty.
                else {

                    // If a user already exists with this email.
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        
                        // Set the email error equal to an error.
                        $data['email_error'] = 'Email is already taken.';
                    }

                }

                // If the name is empty.
                if (empty($data['name'])) {

                    // Set the name error equal to an error.
                    $data['name_error'] = 'Please enter name.';
                }
                
                // If the password is empty.
                if (empty($data['password'])) {

                    // Set the password error equal to an error.
                    $data['password_error'] = 'Please enter password.';
                } 
                // If the password is not empty and the length is less than 6.
                elseif (strlen($data['password']) < 6) {

                    // Set the password error equal to an error.
                    $data['password_error'] = 'Password must be at least 6 characters.';
                }

                // If the confirm password is empty.
                if (empty($data['confirm_password'])) {

                    // Set the confirm password error equal to an error.
                    $data['confirm_password_error'] = 'Please confirm password.';
                }
                else {

                    // If password does not equal confirm password.
                    if ($data['password'] != $data['confirm_password']) {

                        // Set the confirm password error equal to an error.
                        $data['confirm_password_error'] = 'Passwords don\'t match.';
                    }
                }

                // If there are no errors.
                if ( empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error']) ) {

                    // Hash the password.
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // If registering the user was successful.
                    if ($this->userModel->register($data)) {

                        // Call flash with a register success message and the message.
                        flash('register_success', 'You are registered and can login in!');

                        // Redirect to the login in page.
                        redirect('users/login');

                    } else {

                        // End with an error message.
                        die('something went wrong.');
                    }
                } 
                // There are error(s)
                else {

                    // Load view with errors.
                    $this->view('users/register', $data);
                }

            } 
            // Load the form.
            else {
            
                // Data for the form.
                $data = [
                    'name' => ''
                    , 'email' => ''
                    , 'password' => ''
                    , 'confirm_password' => ''
                    , 'name_error' => ''
                    , 'email_error' => ''
                    , 'password_error' => ''
                    , 'confirm_password_error' => ''
                ];

                // Render the view with the data.
                $this->view('users/register', $data);
            }
        }

        // Login method.
        public function login () {

            // If the method is a post.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data.
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Data for the form.
                $data = [
                    'email' => trim($_POST['email'])
                    , 'password' => trim($_POST['password'])
                    , 'email_error' => ''
                    , 'password_error' => ''
                ];

                // If the email is empty.
                if (empty($data['email'])) {

                    // Set the email error equal to an error.
                    $data['email_error'] = 'Please enter email.';
                }

                // If the password is empty.
                if (empty($data['password'])) {

                    // Set the password error equal to an error.
                    $data['password_error'] = 'Please enter password.';
                } 
                // If the password is not empty and the length is less than 6.
                elseif (strlen($data['password']) < 6) {

                    // Set the password error equal to an error.
                    $data['password_error'] = 'Password must be at least 6 characters.';
                }

                // If there are no errors.
                if ( empty($data['email_error']) && empty($data['password_error']) ) {

                    die('success!');
                } 
                // There are error(s)
                else {

                    // Load view with errors.
                    $this->view('users/login', $data);
                }

            } 
            // Load the form.
            else {
            
                // Data for the form.
                $data = [
                    'email' => ''
                    , 'password' => ''
                    , 'email_error' => ''
                    , 'password_error' => ''
                ];

                // Render the view with the data.
                $this->view('users/login', $data);
            }


        }
    }

?>
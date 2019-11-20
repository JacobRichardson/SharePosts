<?php

    // Users class.
    class Users extends Controller {

        // Constructor.
        public function __construct() {
            
        }

        // Register method.
        public function register () {

            // If the method is a post.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
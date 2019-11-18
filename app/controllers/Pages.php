<?php

    // Pages class.
    class Pages extends Controller{

        // Constructor.
        public function __construct() {
        
        }

        // Index method.
        public function index () {

            // Data.
            $data = ['title' => 'Welcome'];

            // Render the view with the data.
            $this->view('pages/index', $data);
        }

        // About method.
        public function about () {

            // Data.
            $data = ['title' => 'About us'];

            // Render the view with the data.
            $this->view('pages/about', $data);
        }
    }

?>
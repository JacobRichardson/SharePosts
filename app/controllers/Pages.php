<?php

    // Pages class.
    class Pages extends Controller{

        // Constructor.
        public function __construct() {
        
        }

        // Index method.
        public function index () {

            // Data.
            $data = [
                'title' => 'SharePosts',
                'description' => 'Simple social network build on the JacobMVC PHP framework.'
            ];

            // Render the view with the data.
            $this->view('pages/index', $data);
        }

        // About method.
        public function about () {

            // Data.
            $data = [
                'title' => 'About Us',
                'description' => 'App to share posts with other users.'
            ];

            // Render the view with the data.
            $this->view('pages/about', $data);
        }
    }

?>
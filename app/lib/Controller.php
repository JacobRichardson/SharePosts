<?php
    /*
     * Base controller.
     * Loads the models and views.
    */

    class Controller {


        // Model method.
        public function model ($model) {

            // Require model file.
            require_once '../app/models/' . $model . '.php';

            // Instantiate the model.
            return new $model();
        }

        // View method.
        public function view ($view, $data = []) {

            // If the view exists.
            if (file_exists('../app/views/' . $view . '.php')) {

                // Require it.
                require_once '../app/views/' . $view . '.php';
            }
            // The view doesn't exist.
            else {

                // Display an error message.
                die('The view doesn\'t exist');
            }
        }
    }
?>
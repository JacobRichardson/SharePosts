<?php

    class User {

        // Class properties.
        private $db;

        public function __construct () {
            
            // Create a new database.
            $this->db = new Database;
        }

        // Register user.
        public function register ($data) {

            // Prepare the query statement.
            $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

            // Bind the actual value of the data values in the SQL statement.
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password', $data['password']);

            // If executing the statement was successful.
            if ($this->db->execute()) {

                // Return true.
                return true;
            } 
            // Statement didn't execute properly.
            else {

                // Return false.
                return false;
            }
        }

        // Find a user by email.
        public function findUserByEmail ($email) {

            // Query the DB.
            $this->db->query('SELECT * FROM users WHERE email = :email');

            // Bind the actual value of email to the variable email in the SQL statement.
            $this->db->bind(':email', $email);

            // Retrieve the record.
            $row = $this->db->single();

            // If row count is greater than zero (a record was found with that email).
            if ($this->db->rowCount() > 0) {

                // Return true.
                return true;
            } 
            // No record was found.
            else {

                // Return false.
                return false;
            }
        }
    }
?>
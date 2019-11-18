<?php
    /*
     * PDO Database Class
     * Connect to database
     * Create prepared statements
     * Bind values
     * Return results from the database.
     */

    class Database {

        // Class properties.
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $dbh;
        private $stmt;
        private $error;

        // Constructor.
        public function __construct() {

            // Create the dsn connection string.
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            // PDO options.
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );
           
            try {

                // Create a new PDO instance and set it on the class.
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

            } 
            catch (PDOException $e) {
                
                // Set the error equal to the error's message.
                $this->error = $e->getMessage();

                // Print the error.
                echo $this->error;
            }
        }

        // Query method.
        public function query ($sql) {

            // Set the statement on the class equal to the prepared sql.
            $this->stmt = $this->dbh->prepare($sql);
        }

        // Bind method.
        public function bind ($param, $value, $type = null) {

            // If type is null.
            if (is_null($type)) {

                // If type is an int set it to an int else null.
                $type = is_int($value) ? PDO::PARAM_INT : null;

                // If type is an bool set it to an bool else null.
                $type = is_bool($vaule) ? PDO::PARAM_BOOL : null;

                // If type is an null set it to an null else null.
                $type = is_null($value) ? PDO::PARAM_NULL : null;

                // If the type is still null.
                if (is_null($type)) {

                    // Default to a string.
                    $type = PDO::PARAM_STRING;
                }
            }

            // Bind the values to the query.
            $this->stmt->bindValue($param, $value, $type);
        }

        // Execute method.
        public function execute () {

            // Return the result of executing the statement.
            return $this->stmt->execute();
        }

        // Result set method.
        public function resultSet () {

            // Invoke the class method execute.
            $this->execute();

            // Return the result of fetching all results of the statement.
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Single method.
        public function single () {

            // Invoke the class method execute.
            $this->execute();

            // Return the result of fetching a single result of the statement.
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Row count method.
        public function rowCount () {

            // Return the statement's row count.
            return $this->stmt->rowCount();
        }

    }
?>
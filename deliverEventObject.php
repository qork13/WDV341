<?php
    require_once('connection-9-1-homework.php');

    class Event {
        private $event_conn;
        public $name;
        public $description;
        public $presenter;
        public $date;
        public $time;

        /**
         * Constructor will always create connection object to be used but
         * will not open the connection at instantiation
         */

         function __construct() {
             $this->event_conn = new Connection();
             
             }

        /**
         * Get events from the DB by passing in query and arguments
         * @param string $query (Query string to be sent)
         * @param array $values (contains key value pair arrays to be bound to PDO)
         * @return $results from db fetch
         */
        
         public function get_events($query) {
            $conn = $this->event_conn->open();
            $statement_obj = $conn->prepare($query);
            $statement_obj->bindValue('name','techcon');
        
             /**
              * Execute, fetch and close
              */

              $statement_obj->execute();
              $results = $statement_obj->fetchAll(PDO::FETCH_ASSOC);
              $conn = $this->event_conn->close();

              return $results;
         }

    }
?>
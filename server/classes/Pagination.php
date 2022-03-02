<?php

class Pagination
{
    private $table,
    $connection, 
     $total_records,
     $col, 
    $limit = 1;
    //PDO connection
    public function __construct($table, $id = '')
    {
        $this->connection = new PDO("mysql:host=localhost; dbname=e-learning", "root", "");
        $this->table = $table;
        if ($this->is_search()) $this->set_search_col();
        $this->set_total_records($id);
    }

    public function set_total_records($id)
    {
        
        $query = "SELECT * FROM $this->table WHERE examid = :id";

        if ($this->is_search()) {
            $val = $this->is_search();
            $query  = "SELECT * FROM $this->table WHERE $this->col = :val";
        }

        $stmt = $this->connection->prepare($query);
        $stmt->execute(array(':id' => $id,':val'=>$val));
        $this->total_records = $stmt->rowCount();
    }

    public function get_data($id)
    {
        $start = 0;
        if ($this->current_page() > 1) {
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }
        $query  = "SELECT * FROM $this->table WHERE examid = :id LIMIT $start, $this->limit";

        if ($this->is_search()) {
            $val = $this->is_search();
            $query  = "SELECT * FROM $this->table WHERE $this->col = :val LIMIT $start, $this->limit";
        }
        $stmt = $this->connection->prepare($query);
        $stmt->execute(array(':id' => $id,':val'=>$val));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function check_search()
    {
        if ($this->is_search()) {
            return '&search=' . $this->is_search() . '&col=' . $this->col;
        }
        return '';
    }


    public function is_search()
    {
        return isset($_GET['search']) ? $_GET['search'] : '';
    }

    public function current_page()
    {
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    public function get_pagination_number()
    {
        return ceil($this->total_records / $this->limit);
    }

    public function prev_page()
    {
        return ($this->current_page() > 1) ? $this->current_page() : 1;
    }

    public function next_page()
    {
        return ($this->current_page() < $this->get_pagination_number()) ? $this->current_page() + 1 : $this->get_pagination_number();
    }

    public function is_active_class($page)
    {
        return ($page == $this->current_page()) ? 'active' : '';
    }

    public function set_search_col()
    {
        $this->col = $_GET['col'];
    }

    public function is_showable($num)
    {
        // The first conditions
        if ($this->get_pagination_number() < 4 || $this->current_page() == $num) {
            return true;
        }
        // The second conditions
        if (($this->current_page() - 2) <= $num && ($this->current_page() + 2) >= $num) {
            return true;
        }
    }

    
}

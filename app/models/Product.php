<?php
class Product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts()
    {
        $this->db->query('SELECT *  from products JOIN categories on products.id_cat = categories.id_cat');
        $this->db->execute();
        return $this->db->resultSet();
    }
}

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

    public function getSingleProduct($id){
        $this->db->query('SELECT *  from products JOIN categories on products.id_cat = categories.id_cat WHERE id_prod = :id');
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->single();
    }
    
    public function getCategories()
    {
        $this->db->query('SELECT *  from categories');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addProduct($product)
    {
        $this->db->query("INSERT INTO products(name , image ,price, description , id_cat) VALUES (:name , :image ,:price, :description , :id_cat)");
        $this->db->bind("name", $product['name']);
        $this->db->bind("image", $product['imagePath']);
        $this->db->bind("price", floatval($product['price']));
        $this->db->bind("description", $product['description']);
        $this->db->bind("id_cat", intval($product['id_cat']));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }

    public function edit($product)
    {
        $this->db->query('UPDATE products SET name = :name , image = :image ,price = :price ,description = :description , id_cat = :id_cat  WHERE id_prod = :id');
        $this->db->bind('id' , intval($product['id']));
        $this->db->bind("name", $product['name']);
        $this->db->bind("image", $product['imagePath']);
        $this->db->bind("price", $product['price']);
        $this->db->bind("description", $product['description']);
        $this->db->bind("id_cat", intval($product['id_cat']));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM products WHERE id_prod = :id');
        $this->db->bind('id' , intval($id));
        $this->db->execute();
        if($this->db->rowCount() < 1){
            return false;
        }
        return true;
    }



}

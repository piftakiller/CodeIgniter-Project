<?php
class Product_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_products() {
        $query = $this->db->get('PRODUCTS');
        return $query->result();
    }

    public function get_product_by_id($id) {
        $query = $this->db->get_where('PRODUCTS', array('PRODUCT_ID' => $id));
        return $query->row();
    }

    public function add_product($name, $description, $price, $category_id) {
        $data = array(
            'PRODUCT_NAME' => $name,
            'DESCRIPTION' => $description,
            'PRICE' => $price,
            'CATEGORY_ID' => $category_id
        );
        $this->db->insert('PRODUCT', $data);
        return $this->db->insert_id();
    }
    public function get_categories() {
        $query = $this->db->get('PRODUCT_CATEGORIES');
        return $query->result_array();
    }

    public function update_product($id, $name, $description, $price, $category_id) {
        $data = array(
            'PRODUCT_NAME' => $name,
            'DESCRIPTION' => $description,
            'PRICE' => $price,
            'CATEGORY_ID' => $category_id
        );
        $this->db->where('PRODUCT_ID', $id);
        $this->db->update('PRODUCT', $data);
        return $this->db->affected_rows();
    }

    public function delete_product($id) {
        $this->db->where('PRODUCT_ID', $id);
        $this->db->delete('PRODUCT');
        return $this->db->affected_rows();
    }
}
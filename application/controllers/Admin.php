<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('product_model');
         $this->load->library('session');
        // Check if user is logged in and is an admin
        if (!$this->session->userdata('is_admin')) {
            echo $this->session->userdata('is_admin');
           // var_dump($this->session->userdata);
           // redirect('login');
        }
    }

    public function index() {
        // Load all products from the database
        $products = $this->product_model->get_products();

        // Load the view file and pass the products to it
        $data['products'] = $products;
        $this->load->view('admin/admin', $data);
    }

    public function edit_product($id) {
        // Load the product with the specified id
        $this->load->model('Product_model');
        $product = $this->product_model->get_product_by_id($id);
        $categories = $this->product_model->get_categories();
        if (!$product) {
            // Product not found, redirect to admin home page
            redirect('admin');
        }
    
        $this->load->library('form_validation');
    
        // Set validation rules for the form fields
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, show the edit product form with errors
            $data['product'] = $product;
            $data['categories'] = $categories;

            $this->load->view('admin/edit_product', $data);
        } else {
            // If validation passes, update the product details in the database
            $product_name = $this->input->post('product_name');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $category_id = $this->input->post('category_id');
            
            // Upload the product image if it is selected
            if ($_FILES['product_image']['name'] != "") {
                $config['upload_path'] = './images/products/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['file_name'] = time() . '_' . $_FILES['product_image']['name'];
    
                $this->load->library('upload', $config);
    
                if (!$this->upload->do_upload('product_image')) {
                    // If image upload fails, show error message
                    $error = array('error' => $this->upload->display_errors());
                    $data['product'] = $product;
                    $data['error'] = $error['error'];
                    $this->load->view('admin/edit_product', $data);
                    return;
                } else {
                    // If image upload is successful, update the product image path in the database
                    $image_data = $this->upload->data();
                    $image_name = $image_data['file_name'];
    
                    $this->load->model('Image_model');
                    $image_id = $this->image_model->add_image($image_name);
    
                    if (!$image_id) {
                        // If image upload fails, show error message
                        $error = array('error' => 'Error uploading image to database');
                        $data['product'] = $product;
                        $data['error'] = $error['error'];
                        $this->load->view('admin/edit_product', $data);
                        return;
                    }
                }
            } else {
                // If no image is selected, use the existing product image
                $image_id = $product->IMAGE_ID;
            }
    
            $result = $this->product_model->update_product($id, $product_name, $description, $price, $category_id, $image_id);
    
            if ($result) {
                // If product update is successful, redirect to admin home page
                redirect('admin');
            } else {
                //
            }
        }
    }    

    public function update_product() {
        // Validate form input
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, redirect back to edit product form with validation errors
            $id = $this->input->post('product_id');
            redirect('admin/edit_product/'.$id);
        }

        // Update the product in the database
        $this->load->model('Product_model');
        $product_data = array(
            'PRODUCT_NAME' => $this->input->post('product_name'),
            'DESCRIPTION' => $this->input->post('description'),
            'PRICE' => $this->input->post('price'),
            'CATEGORY_ID' => $this->input->post('category_id')
        );
        $this->Product_model->update_product($this->input->post('product_id'), $product_data);

        // Redirect back to admin home page
        redirect('admin');
    }

    public function delete_product($id) {
        // Delete the product with the specified id
        $this->load->model('Product_model');
        $this->Product_model->delete_product($id);

        // Redirect back to admin home page
        redirect('admin');
    }

    public function upload_image() {
        // Upload an image file and save it to the database
        // (implementation omitted for brevity)
    }

}

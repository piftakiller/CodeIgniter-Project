<?php class User_model extends CI_Model {
public function __construct()
{
    parent::__construct();
    $this->load->database();
    
}
public function login($username, $password) {
    // Get the user from the database by username
    $query = $this->db->get_where('USERS', array('USERNAME' => $username));
    $user = $query->row();

    if (!$user) {
        // User not found
        return false;
    }

    // Verify the entered password against the hashed password
    if (password_verify($password, $user->PASSWORD)) {
        // If the passwords match, return the user data
        return $user;
    } else {
        // If the passwords don't match, return false
        return false;
    }
}
    public function email_exists($email) {
    
        // Write the SQL query to check if the user with the given email already exists
        $query = $this->db->query("SELECT * FROM USERS WHERE EMAIL = '$email'");
    
        // Return TRUE if the query returns any rows, indicating that the user already exists
        return $query->num_rows() > 0;

    }
    public function create_user($email, $password, $username, $phone_number) {

        // Hash the password using the password_hash function
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->select('MAX(USER_ID) as max_id');
        $query = $this->db->get('USERS');
        $row = $query->row();
        var_dump($row);
        $next_id = $row ? $row->MAX_ID + 1 : 1;
        // Insert the new user into the database
        $data = array(
            'USER_ID' => $next_id,
            'USERNAME' =>$username,
            'EMAIL' => $email,
            'PASSWORD' => $hashed_password,
            'PHONE_NUMBER'=> $phone_number,
            'ROLE_ID' => '1'
        );
        $this->db->insert('USERS', $data);
        return $this->db->affected_rows() > 0;
    }
}
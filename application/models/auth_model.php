<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function loginTemplate($username, $pincode) {
        // Retrieve user's information matching the username and the pincode (password)
        $query = $this->db->get_where(
                "user", 
                array(
                    "email" => $username, 
                    "pin" => $pincode,
                    "isbanned" => 0,
                    "isactivated" => 0
                    )
                );
        // If a record exists then this user account exists.
        if($query->num_rows()) {
            // We retrieve the result as row and get the first one of the entry which corresponds to the userID.
            $userRow = $query->row_array(1);
            // Retrieve user information
            $userInfo = $this->db->join("user_role", "user_role.user_id=profile.user_id")
                    ->get_where("profile", array("profile.user_id" => $userRow["id"]))->row_array(0);
            // Save user information to session
            $userSession = array(
                "loggedIn" => "yes",
                "email_address" => $userRow["email"],
                "user_displayNames" => "",
                "user_role" => $userInfo["role_id"]
            );
            $this->session->set_userdata($userSession);
            // Set the last login datetime
            $last_connected = date("Y-mm-dd h:i:s");
            $this->db->get_where("user", array("email" => $username))->set_row("last_login", $last_connected);
            return TRUE;
        }
        return FALSE;
    }
    
    /*
     * This function signs the User out and delete the session.
     * The session is stored in the DB. So deleting it by delete the row
     * corresponds to the email address of the user.
     * 
     * param: $username
     * return: null
     */
    public function logout($username) {
        $query = $this->db->get_where("session", array("email_address" => $username));
        if($query->num_rows()) {
            $this->db->delete("session", array("email_address" => $username));
        }
        $userSession = array(
            "loggedIn" => "no",
            "email_address" => "",
            "user_displayNames" => "",
            "user_role" => 0
        );
        $this->session->set_userdata($userSession);
    }
    
    /*
     * This function checks if the provided email does not already exist.
     * If YES return TRUE or FALSE if not.
     * 
     * param: $username
     * return: boolean
     */
    public function isUnique($username) {
        $query = $this->db->get_where("user", array("email" => $username));
        if($query->num_rows()) return TRUE;
        return FALSE;
    }
    
    public function register($array) {
        $user = array(
            "email" => $array["email"],
            "pin" => $array["pin"],
            "isbanned" => "no",
            "isactivated" => "no");
        $query = $this->db->insert("user", $user);
        $user_id = $this->db->insert_id();
        if($query) {
            // If registered set the user profile.
            $profile = array(
                "user_id" => $user_id
            );
            //$array["user_id"] = $this->db->insert_id();
            $this->db->insert("profile", $profile);
            $user_role = array(
                "user_id" => $user_id,
                "role_id" => $array["role_id"]
            );
            // Fill the user role table.
            $this->db->insert("user_role", $user_role);
            return TRUE;
        }
        return FALSE;
    }
}
?>

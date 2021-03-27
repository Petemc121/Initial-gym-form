<?php 
/** 
 * Plugin Name: Dynamic Dropdown
 * Plugin URI: https://www.roamingrolls.com/add%20your%20gym/
 * Description: Dynamic dropdown for countries, states and cities.
 */

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'dropdownajax', plugins_url('/dropdownajax.js', __FILE__), true);

    $localize = array( 'ajax_url' => admin_url( 'admin-ajax.php' ) );
    wp_localize_script( 'dropdownajax', 'ajax_object', $localize );
});

add_action( 'wp_ajax_load_countries', 'load_countries' );


function load_countries() {
	include get_template_directory() . '/dbconfig.php'; // this is how you get access to the database

    if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
        //Get all state data

        $countryid = $_POST['country_id'];

        $query = $db->query("SELECT * FROM _S9Q_state WHERE country_id = ".$countryid." ORDER BY name ASC");
       
        //Count total number of rows
        $rowCount2 = mysqli_num_rows($query);
        
        //Display states list
        if($rowCount2 > 0){
            echo '<option value="">Select state</option>';
            while($row = $query->fetch_assoc()){ 
                echo '<option data-value="'.$row['id'].'" value="'.$row['name'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option value="">State not available</option>';
        }
    }
    
    if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
        //Get all city data
        $query = $db->query("SELECT * FROM _S9Q_city WHERE state_id = ".$_POST['state_id']." ORDER BY name ASC");
        echo "<script>console.log(".$_POST["state_id"].")</script>";
    
        //Count total number of rows
        $rowCount = $query->num_rows;
    
        //Display cities list
        if($rowCount > 0){
            echo '<option value="">Select city</option>';
            while($row = $query->fetch_assoc()){ 
                echo '<option data-value="'.$row['id'].'" value="'.$row['name'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option value="">City not available</option>';
        }
    }

	wp_die(); // this is required to terminate immediately and return a proper response
}


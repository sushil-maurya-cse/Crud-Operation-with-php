<?php 

include_once 'db.php'; 
 
if(!empty($_POST["country_id"])){ 
    
    $query = "SELECT * FROM states WHERE country_id = ".$_POST['country_id']."  ORDER BY state_name ASC"; 
    $result = $db->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select State</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">State not available</option>'; 
    } 
}elseif(!empty($_POST["state_id"])){ 
     
    $query = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id']."  ORDER BY city_name ASC"; 
    $result = $db->query($query); 
     
    
    if($result->num_rows > 0){ 
        echo '<option value="">Select city</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
} 
?>
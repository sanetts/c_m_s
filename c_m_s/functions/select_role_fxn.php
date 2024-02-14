<?php
include('../settings/connection.php');

$sql = "SELECT Role.rid, Role.rname, Family_name.fid, Family_name.fam_name 
        FROM Family_name 
        LEFT JOIN Role ON Family_name.fid = Role.rid";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<select name="family_role" id="family_role">';
    echo '<option value="0">Select</option>'; 

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['fid'] . '">' . $row['fam_name'] . '</option>';
    }

    echo '</select><br>';
} else {

    echo '<select name="family_role" id="family_role">';
    echo '<option value="3">Standard</option>'; 
    echo '</select><br>';
}

$conn->close();

?>

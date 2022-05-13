<?php
require_once("config.php");
$col_1 = $_POST["a"];
$sql = "SELECT * FROM stat WHERE COL_1 = '$col_1'";
$result = $link->query($sql);
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) {
        echo $row["COL_4"];
    }
}
else 
{
    echo "not found";
}

?>
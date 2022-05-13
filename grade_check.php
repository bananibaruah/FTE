<?php
require_once("config.php");
$col_1 = $_POST["a"];
$sql = "SELECT * FROM lta_list WHERE COL_1 = '$col_1'";
$result = $link->query($sql);
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) {
        echo $row["COL_2"] . "_" . $row["COL_4"] . "_" . $row["COL_9"] . "_" .
            $row["COL_6"] . "_" . $row["COL_3"] . "_" . $row["COL_5"];
    }
}
else 
{
    echo "not found";
}

?>
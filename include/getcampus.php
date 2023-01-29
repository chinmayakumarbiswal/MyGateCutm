<?php
require('./database.php');
    $OUTPUT=(object) array('status' => false, 'data' => '');

    if (!$_GET || !isset($_GET["campus"]) || !$_GET["campus"] ) {
        $OUTPUT=(object) array('status' => false, 'data' => 'Heading is Required');
    }
    else{
        $query="SELECT * FROM gate where campus='{$_GET["campus"]}'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d['gate'];
        }
        $OUTPUT=(object) array('status' => true, 'data' => $data);

    }
    
    echo json_encode($OUTPUT,true)
?>
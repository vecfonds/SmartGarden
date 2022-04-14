<?php 

include "conn.php";
$db = new DataBase();
// $user_id=$_GET['id'];

// test ============
$user_id='1';


$query="SELECT *
        FROM microbits AS M
        JOIN users AS U
            ON M.microbit_owner = U.user_id
        WHERE U.user_id='$user_id'";

$numresult=$db->num($query);

if($numresult>0){
    $data=array();
    $sql=$db->send($query);
    while($row=$sql->fetch_array()){
        array_push($data,
            array(
                'MicroBit_name'=>$row["microbit_name"],
                'MicroBit_id'=>$row['microbit_id']
            )
        );
    }
    $json=json_encode($data);
    echo $json;

}
else { // don't own any microbit
    echo 'fail';

}

        


?>
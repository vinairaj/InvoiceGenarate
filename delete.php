<?php
require_once("config.php");
    if(isset($_POST)){
        $connectionObj = new DatabaseConnect();
        $connection = $connectionObj ->dbConnect(); 
        $id =mysqli_real_escape_string( $connection,$_POST['id']);

        $query = "DELETE FROM products WHERE n_id = '$id'";
        $getQuery = $connectionObj ->queryExecute($query); 
        $connectionObj -> dbClose();
        if($getQuery>0) {
            $response['status'] = '200';
            $response['message'] = 'success';
            $response['result'] = $getQuery;
            echo json_encode($response);
        }else{
            $response['status'] = '400';
            $response['message'] = 'failed';
            $response['result'] = '';
            echo json_encode($response);
        }
    }else{
        $response['status'] = '400';
        $response['message'] = 'failed';
        $response['result'] = '';
        echo json_encode($response);
    }
?>
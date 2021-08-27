<?php
require_once("config.php");
    $connectionObj = new DatabaseConnect();
    $connection = $connectionObj ->dbConnect(); 
    $query = "SELECT prod.n_id,prod.n_mst_id,prod.c_name,prod.n_quantity,prod.n_price,prod.n_tax_amount FROM products prod
                JOIN product_invoice_generate inv ON inv.n_id = prod.n_mst_id
                WHERE inv.n_invoice_generate_flag='0';";
    $result = $connectionObj ->queryExecute($query); 
   $cnt = $result->num_rows;
    $response = [];
    if($cnt>0) {
        while($obj = mysqli_fetch_assoc($result)){
            $output[] = [
                'id'=>$obj["n_id"],
                'mstId'=>$obj["n_mst_id"],
                'name'=>$obj["c_name"],
                'qty'=>$obj["n_quantity"],
                'price'=>$obj["n_price"],
                'tax'=>$obj["n_tax_amount"]
            ];
        }
        //Closing the statement
        mysqli_free_result($result);
        $connectionObj -> dbClose();
    
        $response['status'] = '200';
        $response['message'] = 'success';
        $response['result'] = $output;
        
        echo json_encode($response);
    }else{
        $response['status'] = '200';
        $response['message'] = 'success';
        $response['result'] = [];
        echo json_encode($response);
    }
    
?>
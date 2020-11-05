<?php
function eQuery($pdo, $sql, $param = [], $b){

    $stm = $pdo->prepare($sql);

    $stm->execute($param);

    if($b == true){
         echo "ok";
    }else{
        return $result = $stm->fetchAll();
    }

    
    
}
<?php
//get all products
function getAllConsultations($db)
{
$sql = 'Select c.result_id, c.hemoglobin_levels, c.vital_rate, c.health_history from consultation_result c ';
//$sql .='Inner Join categories c on p.category_id = c.id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get product by id
function getConsultation($db, $resultId)
{
$sql = 'Select c.result_id, c.hemoglobin_levels, c.vital_rate, c.health_history from consultation_result c ';

//$sql .= 'Inner Join categories c on p.category_id = c.id ';
$sql .= 'Where c.result_id = :result_id';
$stmt = $db->prepare ($sql);
$id = (int) $resultId;
$stmt->bindParam(':result_id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//add new movie
function createConsultation($db, $form_data) {
    $sql = 'Insert into consultation_result (hemoglobin_levels, vital_rate, health_history) ';
    $sql .= 'values (:hemoglobin_levels, :vital_rate, :health_history) ';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':hemoglobin_levels', $form_data['hemoglobin_levels']);
    $stmt->bindParam(':vital_rate', $form_data['vital_rate']);
    $stmt->bindParam(':health_history', $form_data['health_history']);
    $stmt->execute();
    return $db->lastInsertID(); //insert last number.. continue
}   


   //delete movie by id
function deleteConsultation($db,$resultId) {
    $sql = ' Delete from consultation_result where result_id = :result_id';
    $stmt = $db->prepare($sql);
    $id = (int)$resultId;
    $stmt->bindParam(':result_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }

//update product by id
function updateConsultation($db,$form_dat,$resultId) 
{
    $sql = 'UPDATE consultation_result SET hemoglobin_levels = :hemoglobin_levels , vital_rate = :vital_rate, health_history = :health_history ';
    $sql .=' WHERE result_id = :result_id';
    $stmt = $db->prepare ($sql);
    $id = (int)$resultId;
    //$mod_d = $date;
    $stmt->bindParam(':result_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':hemoglobin_levels', $form_dat['hemoglobin_levels']);
    $stmt->bindParam(':vital_rate', $form_dat['vital_rate']);
    $stmt->bindParam(':health_history', $form_dat['health_history']);
    //$stmt->bindParam(':modified', $mod_d , PDO::PARAM_STR);
    $stmt->execute();
    }


<?php
//get all blood
function getAllBloods($db)
{
$sql = 'Select b.blood_id, b.blood_type, b.date_of_collection, b.expiry_date from blood b ';
//$sql .='Inner Join categories c on p.category_id = c.id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get blood by id
function getBlood($db, $bloodId)
{
$sql = 'Select b.blood_id, b.blood_type, b.date_of_collection, b.expiry_date from blood b ';

//$sql .= 'Inner Join categories c on p.category_id = c.id ';
$sql .= 'Where b.blood_id = :blood_id';
$stmt = $db->prepare ($sql);
$id = (int) $bloodId;
$stmt->bindParam(':blood_id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    //add new blood
function createBlood($db, $form_data) {
    $sql = 'Insert into blood (blood_type, date_of_collection, expiry_date) ';
    $sql .= 'values (:blood_type, :date_of_collection, :expiry_date) ';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':blood_type', $form_data['blood_type']);
    $stmt->bindParam(':date_of_collection', $form_data['date_of_collection']);
    $stmt->bindParam(':expiry_date', $form_data['expiry_date']);
    $stmt->execute();
    return $db->lastInsertID(); //insert last number.. continue
}   


   //delete blood by id
function deleteBlood($db,$bloodId) {
    $sql = ' Delete from blood where blood_id = :blood_id';
    $stmt = $db->prepare($sql);
    $id = (int)$bloodId;
    $stmt->bindParam(':blood_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }

//update blood by id
function updateBlood($db,$form_dat,$bloodId) 
{
    $sql = 'UPDATE blood SET blood_type = :blood_type , date_of_collection = :date_of_collection, expiry_date = :expiry_date ';
    $sql .=' WHERE blood_id = :blood_id';
    $stmt = $db->prepare ($sql);
    $id = (int)$bloodId;
    //$mod_d = $date;
    $stmt->bindParam(':blood_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':blood_type', $form_dat['blood_type']);
    $stmt->bindParam(':date_of_collection', $form_dat['date_of_collection']);
    $stmt->bindParam(':expiry_date', $form_dat['expiry_date']);
    //$stmt->bindParam(':modified', $mod_d , PDO::PARAM_STR);
    $stmt->execute();
    }

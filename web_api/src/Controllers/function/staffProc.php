<?php
//get all products
function getAllStaffs($db)
{
$sql = 'Select s.staff_id, s.name, s.username, s.password from staff s ';
//$sql .='Inner Join blood b on d.bloods_id = b.blood_id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get staff by id
function getStaff($db, $staffId)
{
$sql = 'Select s.staff_id, s.name, s.username, s.password from staff s ';
//$sql .='Inner Join blood b on d.bloods_id = b.blood_id';
$sql .= 'Where s.staff_id = :staff_id';
$stmt = $db->prepare ($sql);
$id = (int) $staffId;
$stmt->bindParam(':staff_id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//add new staff
function createStaff($db, $form_data) {
    $sql = 'Insert into staff (name, username, password) ';
    $sql .= 'values (:name, :username, :password)';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':name', $form_data['name']);
    $stmt->bindParam(':username', $form_data['username']);
    $stmt->bindParam(':password', $form_data['password']);
    $stmt->execute();
    return $db->lastInsertID(); //insert last number.. continue
}   


   //delete staff by id
function deleteStaff($db,$staffId) {
    $sql = ' Delete from staff where staff_id = :staff_id';
    $stmt = $db->prepare($sql);
    $id = (int)$staffId;
    $stmt->bindParam(':staff_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }

//update staff by id
function updateStaff($db,$form_dat,$staffId) 
{
    $sql = 'UPDATE staff SET name = :name , username = :username , password = :password ';
    $sql .=' WHERE staff_id = :staff_id';
    $stmt = $db->prepare ($sql);
    $id = (int)$staffId;
    //$mod_d = $date;
    $stmt->bindParam(':staff_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $form_dat['name']);
    $stmt->bindParam(':username', $form_dat['username']);
    $stmt->bindParam(':password', $form_dat['password']);
    //$stmt->bindParam(':modified', $mod_d , PDO::PARAM_STR);
    $stmt->execute();
    }
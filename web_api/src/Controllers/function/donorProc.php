<?php
//get all products
function getAllDonors($db)
{
$sql = 'Select d.donor_id, d.name, d.date_of_birth, d.gender, d.address, d.contact_number, d.email_add, d.bloods_id from donor d ';
//$sql .='Inner Join blood b on d.bloods_id = b.blood_id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get donor by id
function getDonor($db, $donorId)
{
$sql = 'Select d.donor_id, d.name, d.date_of_birth, d.gender, d.address, d.contact_number, d.email_add, d.bloods_id from donor d ';
//$sql .='Inner Join blood b on d.bloods_id = b.blood_id';
$sql .= 'Where d.donor_id = :donor_id';
$stmt = $db->prepare ($sql);
$id = (int) $donorId;
$stmt->bindParam(':donor_id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//add new donor
function createDonor($db, $form_data) {
    $sql = 'Insert into donor (name, date_of_birth, gender, address, contact_number, email_add, bloods_id) ';
    $sql .= 'values (:name, :date_of_birth, :gender, :address, :contact_number, :email_add, :bloods_id) ';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':name', $form_data['name']);
    $stmt->bindParam(':date_of_birth', $form_data['date_of_birth']);
    $stmt->bindParam(':gender', $form_data['gender']);
    $stmt->bindParam(':address', $form_data['address']);
    $stmt->bindParam(':contact_number', $form_data['contact_number']);
    $stmt->bindParam(':email_add', $form_data['email_add']);
    $stmt->bindParam(':bloods_id', $form_data['bloods_id']);
    $stmt->execute();
    return $db->lastInsertID(); //insert last number.. continue
}   


   //delete donor by id
function deleteDonor($db,$donorId) {
    $sql = ' Delete from donor where donor_id = :donor_id';
    $stmt = $db->prepare($sql);
    $id = (int)$donorId;
    $stmt->bindParam(':donor_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }

//update donor by id
function updateDonor($db,$form_dat,$donorId) 
{
    $sql = 'UPDATE donor SET name = :name , date_of_birth = :date_of_birth , gender = :gender, address = :address, contact_number = :contact_number, email_add = :email_add, bloods_id = :bloods_id ';
    $sql .=' WHERE donor_id = :donor_id';
    $stmt = $db->prepare ($sql);
    $id = (int)$donorId;
    $stmt->bindParam(':donor_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $form_dat['name']);
    $stmt->bindParam(':date_of_birth', $form_dat['date_of_birth']);
    $stmt->bindParam(':gender', $form_dat['gender']);
    $stmt->bindParam(':address', $form_dat['address']);
    $stmt->bindParam(':contact_number', $form_dat['contact_number']);
    $stmt->bindParam(':email_add', $form_dat['email_add']);
    $stmt->bindParam(':bloods_id', ($form_dat['bloods_id']));
    $stmt->execute();
    }


    
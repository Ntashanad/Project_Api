<?php
//get all products
function getAllDonations($db)
{
$sql = 'Select d.donation_id, d.date_of_donation, d.venue, d.health_history from donation_event d ';
//$sql .='Inner Join categories c on p.category_id = c.id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get product by id
function getDonation($db, $donationId)
{
$sql = 'Select d.donation_id, d.date_of_donation, d.venue, d.health_history from donation_event d ';

//$sql .= 'Inner Join categories c on p.category_id = c.id ';
$sql .= 'Where d.donation_id = :donation_id';
$stmt = $db->prepare ($sql);
$id = (int) $donationId;
$stmt->bindParam(':donation_id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//add new movie
function createDonation($db, $form_data) {
    $sql = 'Insert into donation_event (date_of_donation, venue, health_history) ';
    $sql .= 'values (:date_of_donation, :venue, :health_history) ';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':date_of_donation', $form_data['date_of_donation']);
    $stmt->bindParam(':venue', $form_data['venue']);
    $stmt->bindParam(':health_history', $form_data['health_history']);
    $stmt->execute();
    return $db->lastInsertID(); //insert last number.. continue
}   


   //delete movie by id
function deleteDonation($db,$donationId) {
    $sql = ' Delete from donation_event where donation_id = :donation_id';
    $stmt = $db->prepare($sql);
    $id = (int)$donationId;
    $stmt->bindParam(':donation_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }

//update product by id
function updateDonation($db,$form_dat,$donationId) 
{
    $sql = 'UPDATE donation_event SET date_of_donation = :date_of_donation , venue = :venue, health_history = :health_history ';
    $sql .=' WHERE donation_id = :donation_id';
    $stmt = $db->prepare ($sql);
    $id = (int)$donationId;
    //$mod_d = $date;
    $stmt->bindParam(':donation_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':date_of_donation', $form_dat['date_of_donation']);
    $stmt->bindParam(':venue', $form_dat['venue']);
    $stmt->bindParam(':health_history', $form_dat['health_history']);
    //$stmt->bindParam(':modified', $mod_d , PDO::PARAM_STR);
    $stmt->execute();
    }


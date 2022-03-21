<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include productsProc.php file
include __DIR__ . '/../Controllers/function/donationProc.php';

//read table products
$app->get('/donation', function (Request $request, Response $response, array $arg)
{
return $this->response->withJson(array('data' => 'success'), 200);
});

// read all data from table donor
$app->get('/alldonations',function (Request $request, Response $response, array $arg)
{
$data = getAllDonations($this->db);
if (is_null($data)) 
{
return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
}
return $this->response->withJson(array('data' => $data), 200);
});

//request table donors by condition (donor id)
$app->get('/donation/[{donation_id}]', function ($request, $response, $args)
{
$donationId = $args['donation_id'];
if (!is_numeric($donationId)) 
{
return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}
$data = getDonation($this->db,$donationId);
if (empty($data)) {
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});


//insert new data
$app->post('/donation/add', function ($request, $response, $args) {

    $form_data = $request->getParsedBody();
    $data = createDonation($this->db, $form_data);

    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
   );


   //delete row in table movie
$app->delete('/donation/del/[{donation_id}]', function ($request, $response, $args){
 
    $donationId = $args['donation_id'];
   if (!is_numeric($donationId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
   $data = deleteDonation($this->db,$donationId);
   if (empty($data)) {
   return $this->response->withJson(array($donationId=> 'is successfully deleted'), 202);};
   });


   //put or update table movie
   $app->put('/donation/put/[{donation_id}]', function ($request, $response, $args){
    $donationId = $args['donation_id'];
    
   if (!is_numeric($donationId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
    $form_dat=$request->getParsedBody();
    $data = updateDonation($this->db,$form_dat,$donationId);

   if ($data <=0)

   return $this->response->withJson(array('data' => 'successfully updated'), 200);
});
<?php

use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include productsProc.php file
include __DIR__ . '/../Controllers/function/consultationProc.php';

//read table products
$app->get('/consultation_result', function (Request $request, Response $response, array $arg)
{
return $this->response->withJson(array('data' => 'success'), 200);
});

// read all data from table donor
$app->get('/allconsultations',function (Request $request, Response $response, array $arg)
{
$data = getAllConsultations($this->db);

if (is_null($data)) 
{
return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
}
return $this->response->withJson(array('data' => $data), 200);
});

//request table donors by condition (donor id)
$app->get('/consultation/[{result_id}]', function ($request, $response, $args){
$resultId = $args['result_id'];

if (!is_numeric($resultId))

{
return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}

$data = getConsultation($this->db,$resultId);
if (empty($data)) {
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});

//insert new data
$app->post('/consultation/add', function ($request, $response, $args) {

    $form_data = $request->getParsedBody();
    $data = createConsultation($this->db, $form_data);

    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
   );


   //delete row in table movie
$app->delete('/consultation/del/[{result_id}]', function ($request, $response, $args){
 
    $resultId = $args['result_id'];
   if (!is_numeric($resultId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
   $data = deleteConsultation($this->db,$resultId);
   if (empty($data)) {
   return $this->response->withJson(array($resultId=> 'is successfully deleted'), 202);};
   });


   //put or update table movie
   $app->put('/consultation/put/[{result_id}]', function ($request, $response, $args)
   {
    $resultId = $args['result_id'];
    
   if (!is_numeric($resultId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
    $form_dat=$request->getParsedBody();
    $data = updateConsultation($this->db,$form_dat,$resultId);

   if ($data <=0)

   return $this->response->withJson(array('data' => 'successfully updated'), 200);
});
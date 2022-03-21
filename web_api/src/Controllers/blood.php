<?php

use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include productsProc.php file
include __DIR__ . '/../Controllers/function/bloodProc.php';

//read table products
$app->get('/blood', function (Request $request, Response $response, array $arg)
{
return $this->response->withJson(array('data' => 'success'), 200);
});

// read all data from table donor
$app->get('/allbloods', function (Request $request, Response $response, array $arg)
{
$data = getAllBloods($this->db);

if (is_null($data)) {
return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
}
return $this->response->withJson(array('data' => $data), 200);
});

//request table donors by condition (donor id)
$app->get('/blood/[{blood_id}]', function ($request, $response, $args){
$bloodId = $args['blood_id'];
if (!is_numeric($bloodId)) {
return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}
$data = getBlood($this->db,$bloodId);
if (empty($data)) {
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});

//add new data
$app->post('/blood/add', function ($request, $response, $args) 
{
    $form_data = $request->getParsedBody();
    $data = createBlood($this->db, $form_data);
    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
    );


   //delete row in table movie
$app->delete('/blood/del/[{blood_id}]', function ($request, $response, $args)
{
 
    $bloodId = $args['blood_id'];
   if (!is_numeric($bloodId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
   $data = deleteBlood($this->db,$bloodId);
   if (empty($data)) {
   return $this->response->withJson(array($bloodId=> 'is successfully deleted'), 202);};
   });


   //put or update table movie
   $app->put('/blood/put/[{blood_id}]', function ($request, $response, $args)
   {
    $bloodId = $args['blood_id'];
    
   if (!is_numeric($bloodId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
    $form_dat=$request->getParsedBody();
    $data = updateBlood($this->db,$form_dat,$bloodId);

   if ($data <=0)

   return $this->response->withJson(array('data' => 'successfully updated'), 200);
});
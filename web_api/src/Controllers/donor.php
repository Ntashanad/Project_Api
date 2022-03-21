<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include donorProc.php file
include __DIR__ . '/../Controllers/function/donorProc.php';

//include staffProc.php file
include __DIR__ . '/../Controllers/function/staffProc.php';

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});


// read all data from table donor
$app->get('/donors',function (Request $request, Response $response, array $arg)
{
$data = getAllDonors($this->db);
if (is_null($data)) 
{
return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
}
return $this->response->withJson(array('data' => $data), 200);
});

//request table donors by condition (donor id)
$app->get('/donors/[{donor_id}]', function ($request, $response, $args)
{
$donorId = $args['donor_id'];
if (!is_numeric($donorId)) 
{
return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}
$data = getDonor($this->db,$donorId);
if (empty($data)) 
{
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});

//insert new data
$app->post('/donors', function ($request, $response, $args) {

    $form_data = $request->getParsedBody();
    $data = createDonor($this->db, $form_data);

    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
   );


   //delete row in table movie
$app->delete('/donors/[{donor_id}]', function ($request, $response, $args){
 
    $donorId = $args['donor_id'];
   if (!is_numeric($donorId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
   $data = deleteDonor($this->db,$donorId);
   if (empty($data)) {
   return $this->response->withJson(array($donorId=> 'is successfully deleted'), 202);};
   });


   //put or update table movie
   $app->put('/donors/[{donor_id}]', function ($request, $response, $args){
    $donorId = $args['donor_id'];
    
   if (!is_numeric($donorId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
    $form_dat=$request->getParsedBody();
    $data = updateDonor($this->db,$form_dat,$donorId);

   if ($data <=0)

   return $this->response->withJson(array('data' => 'successfully updated'), 200);
});


// read all data from table staff
$app->get('/staff',function (Request $request, Response $response, array $arg)
{
$data = getAllStaffs($this->db);
if (is_null($data)) {
return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
}
return $this->response->withJson(array('data' => $data), 200);
});

//insert new data
$app->post('/staff', function ($request, $response, $args) {

    $form_data = $request->getParsedBody();
    $data = createStaff($this->db, $form_data);

    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
   );


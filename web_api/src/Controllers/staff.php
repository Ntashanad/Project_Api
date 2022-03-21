<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include productsProc.php file
// include __DIR__ . '/../Controllers/function/staffProc.php';

// $app->add(function ($req, $res, $next) {
//     $response = $next($req, $res);
//     return $response
//             ->withHeader('Access-Control-Allow-Origin', '*')
//             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
//             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
// });

//read table staff
// $app->get('/staff', function (Request $request, Response $response, array $arg)
// {
// return $this->response->withJson(array('data' => 'success'), 200);
// });

// read all data from table staff
// $app->get('/staff',function (Request $request, Response $response, array $arg)
// {
// $data = getAllStaffs($this->db);
// if (is_null($data)) {
// return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
// }
// return $this->response->withJson(array('data' => $data), 200);
// });

//request table donors by condition (staff id)
// $app->get('/staff/[{staff_id}]', function ($request, $response, $args)
// {
// $staffId = $args['staff_id'];
// if (!is_numeric($staffId)) 
// {
// return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
// }
// $data = getStaff($this->db,$staffId);
// if (empty($data)) 
// {
// return $this->response->withJson(array('error' => 'no data'), 500);
// }
// return $this->response->withJson(array('data' => $data), 200);
// });


//insert new data
// $app->post('/staff', function ($request, $response, $args) {

//     $form_data = $request->getParsedBody();
//     $data = createStaff($this->db, $form_data);

//     if ($data <= 0) {
//     return $this->response->withJson(array('error' => 'add data fail'), 500);
//     }
//     return $this->response->withJson(array('add data' => 'success'), 200);
//     }
//    );


   //delete row in table staff
// $app->delete('/staff/del/[{staff_id}]', function ($request, $response, $args){
 
//     $staffId = $args['staff_id'];
//    if (!is_numeric($staffId)) {
//     return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
//    }
//    $data = deleteStaff($this->db,$staffId);
//    if (empty($data)) {
//    return $this->response->withJson(array($staffId=> 'is successfully deleted'), 202);};
//    });


   //put or update table staff
//    $app->put('/staff/put/[{staff_id}]', function ($request, $response, $args){
//     $staffId = $args['staff_id'];
    
//    if (!is_numeric($staffId)) {
//     return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
//    }
//     $form_dat=$request->getParsedBody();
//     $data = updateStaff($this->db,$form_dat,$staffId);

//    if ($data <=0)

//    return $this->response->withJson(array('data' => 'successfully updated'), 200);
// });
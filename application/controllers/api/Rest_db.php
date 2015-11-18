<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Rest_db extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }



    function demo_get()
    {
        if (!$this->get('id'))
        {
            $this->response(NULL, 400);
        }

        $this->db->where(array('id'=>$this->get('id')));
        $user = $this->db->get('rest_demo')->row();
        // $users = [
        //     1 => ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
        //     2 => ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
        //     3 => ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        // ];

      //  $user = @$users[$this->get('id')];

        if ($user)
        {
            $this->response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }

        else
        {
            $this->response(['error' => 'User could not be found'], REST_Controller::NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    function demo_post()
    {
        // $this->some_model->update_user($this->get('id'));
        if (!$this->post('nama') && !$this->post('email'))
        {
            $this->response(['error' => 'Something wrong'], 400);
        }

         $data = [
             'nama' => $this->post('nama'),
             'email' => $this->post('email')
         ];
         $user = $this->db->insert('rest_demo',$data);

         if ($user)
         {
             $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
         }

         else
         {
             $this->response(['error' => 'Something wrong'], REST_Controller::HTTP_CREATED); // NOT_FOUND (404) being the HTTP response code
         }

        //$this->response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    function demo_delete()
    {
        $user = $this->db->delete('rest_demo', array('id' => $this->get('id')));  // Produces: // DELETE FROM mytable  // WHERE id = $id

        if (!$this->get('id'))
        {
            $this->response(NULL, 400);
        }

        if ($user)
        {
            $this->response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }

        else
        {
            $this->response(['error' => 'User could not be found'], REST_Controller::NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    function demos_get()
    {
        $users = $this->db->get('rest_demo')->result();

        if ($users)
        {
            $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }

        else
        {
            $this->response(['error' => 'Couldn\'t find any users!'], REST_Controller::NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function demo_put()
    {
      // $this->some_model->update_user($this->get('id'));
      $id = $this->put('id');
      if (!$this->put('nama') && !$this->put('email') )
      {
          $this->response(['error' => 'incomplete request'], 400);
      }

       $data = [
           'nama' => $this->put('nama'),
           'email' => $this->put('email')
       ];
       $user = $this->db->update('rest_demo', $data, array('id'=>  $id));

       if ($user)
       {
           $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
       }

       else
       {
           $this->response(['error' => 'Something wrong'], REST_Controller::HTTP_CREATED); // NOT_FOUND (404) being the HTTP response code
       }

      //$this->response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
}

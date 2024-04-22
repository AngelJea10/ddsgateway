<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\User2Service;
//use App\Models\User;

Class User2Controller extends Controller {

    use ApiResponser;
    
    /**
     *  @var User2Service
     */
    public $user2Service;

    /**
     * @return 
     */
    public function  __construct(User2Service $user2Service){
        $this->user2Service = $user2Service;
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    // ADD USER
    public function add(Request $request ){        
        return $this->successResponse($this->user2Service->createUser2($request->all(), Response::HTTP_CREATED));
    }

    //SHOW ID INFORMATION
    public function show($id){
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    //UPDATE USER
    public function update(Request $request,$id){
        return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
    }

    //DELETE USER
    public function delete($id){
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}      

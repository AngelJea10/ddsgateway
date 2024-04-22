<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\User1Service;
//use App\Models\User;

Class User1Controller extends Controller {

    use ApiResponser;
    
    /**
     *  @var User1Service
     */
    public $user1Service;

    /**
     * @return 
     */
    public function  __construct(User1Service $user1Service){
        $this->user1Service = $user1Service;
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    // ADD USER
    public function add(Request $request ){        
        return $this->successResponse($this->user1Service->createUser1($request->all(), Response::HTTP_CREATED));
    }

    //SHOW ID INFORMATION
    public function show($id){
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }

    //UPDATE USER
    public function update(Request $request,$id){
        return $this->successResponse($this->user1Service->editUser1($request->all(), $id));
    }

    //DELETE USER
    public function delete($id){
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}      

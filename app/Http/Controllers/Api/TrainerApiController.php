<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainerApiRequest;
use App\Http\Requests\UpdateTrainerApiRequest;
use App\Http\Resources\Api\TrainerResource;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerApiController extends Controller
{
    public function index(){
        $users = User::role('trainer')->get();
    return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => ['data' => TrainerResource::collection($users)], 'code' => Constant::HTTP_CODE['success']]);
}

public function store(StoreTrainerApiRequest $request)
{
    try {

        $user = Trainer::insertTrainer($request);
        $user->assignRole('student');

        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [], 'code' => Constant::HTTP_CODE['created']]);
    }catch (\Throwable $e) {
        return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
    }
}

public function show($id){

    $user = User::getOne($id);

    return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $user, 'code' => Constant::HTTP_CODE['success']]);
}

public function update(UpdateTrainerApiRequest $request, $id)
{
    try {
            $user = User::updateUser($request, $id);
            // $user = Student::updateStudent($request, $id);

            return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $user, 'code' =>  Constant::HTTP_CODE['updated']]);
    } catch (\Throwable $e) {
        return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
    }
}

public function destroy(string $id)
{
    if(Auth::user()->id == $id){
        return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'message' => 'you can not delete this user', 'code' => Constant::HTTP_CODE['unauthorized']]);
    }

    return Trainer::deleteStudent($id)
        ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
        : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
}
}

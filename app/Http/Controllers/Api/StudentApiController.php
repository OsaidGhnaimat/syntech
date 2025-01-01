<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentApiRequest;
use App\Http\Requests\UpdateStudentApiRequest;
use App\Http\Resources\Api\StudentResource;
use App\Models\Student;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function index(){
            $users = User::role('student')->get();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => ['data' => StudentResource::collection($users)], 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(StoreStudentApiRequest $request)
    {
        try {

            $user = Student::insertStudent($request);
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

    public function update(UpdateStudentApiRequest $request, $id)
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
        if(auth::user()->id == $id){
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'message' => 'you can not delete this user', 'code' => Constant::HTTP_CODE['unauthorized']]);
        }

        return Student::deleteStudent($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }

}

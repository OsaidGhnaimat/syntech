<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssessmentRequest;
use App\Http\Requests\UpdateAssessmentRequest;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentApiController extends Controller
{
    public function index(){
        $tags = Assessment::select("id", "progress_comment", "is_pass", "user_id", "brief_id")->get();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => ['data' => $tags], 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(StoreAssessmentRequest $request)
    {
        try {
            $row = Assessment::insertAssessment($request);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [$row], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = Assessment::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(UpdateAssessmentRequest $request, $id)
    {
        try {

            $row = Assessment::updateAssessment($request, $id);

            return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        return Assessment::deleteAssessment($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

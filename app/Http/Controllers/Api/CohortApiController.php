<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCohortApiRequest;
use App\Models\Cohort;
use Illuminate\Http\Request;

class CohortApiController extends Controller
{
    public function index(){
        $data = Cohort::all();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => $data, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(StoreCohortApiRequest $request)
    {
        try {

            Cohort::insertCohort($request);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = Cohort::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(Request $request, $id)
    {
        try {
                $row = Cohort::updateCohort($request, $id);

                return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        return Cohort::deleteCohort($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

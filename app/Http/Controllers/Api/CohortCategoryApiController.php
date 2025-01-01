<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Models\CohortCategory;
use Illuminate\Http\Request;

class CohortCategoryApiController extends Controller
{
    public function index(){
        $data = CohortCategory::all();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => $data, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required',
            ]);

            CohortCategory::insertCohortCategory($validated);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = CohortCategory::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(Request $request, $id)
    {
        try {
                $row = CohortCategory::updateCohortCategory($request, $id);

                return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        return CohortCategory::deleteCohortCategory($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

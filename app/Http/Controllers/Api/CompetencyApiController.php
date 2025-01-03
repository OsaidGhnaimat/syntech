<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetencyRequest;
use App\Http\Requests\UpdateCompetencyRequest;
use App\Models\Competency;
use Illuminate\Http\Request;

class CompetencyApiController extends Controller
{
    public function index(){
        $tags = Competency::select("id", "title", "description")->get();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => ['data' => $tags], 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(StoreCompetencyRequest $request)
    {
        try {
            $row = Competency::insertCompetency($request);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [$row], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = Competency::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(UpdateCompetencyRequest $request, $id)
    {
        try {

            $row = Competency::updateCompetency($request, $id);

            return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        return Competency::deleteCompetency($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

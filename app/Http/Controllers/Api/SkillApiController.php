<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillApiController extends Controller
{
    public function index(){
        $tags = Skill::select("id", "name", "description", "type")->get();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => ['data' => $tags], 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(StoreSkillRequest $request)
    {
        try {
            $row = Skill::insertTag($request);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [$row], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = Skill::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(UpdateSkillRequest $request, $id)
    {
        try {

                $row = Skill::updateTag($request, $id);

                return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        return Skill::deleteTag($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

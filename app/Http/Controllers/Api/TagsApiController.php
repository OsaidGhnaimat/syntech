<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsApiController extends Controller
{
    public function index(){
        $tags = Tags::select("id", "name")->get();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => ['data' => $tags], 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
            ]);

            $row = Tags::insertTag($validated);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [$row], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = Tags::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
            ]);

                $row = Tags::updateTag($validated, $id);

                return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        return Tags::deleteTag($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

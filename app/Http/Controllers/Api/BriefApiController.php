<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBriefApiRequest;
use App\Http\Requests\UpdateBriefApiRequest;
use App\Models\Brief;
use App\Services\ImageService;


class BriefApiController extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index(){
        $data = Brief::all();
        return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => $data, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function store(StoreBriefApiRequest $request)
    {
        try {
            $storedPath = '';
            if($request->image_base64 && $request->image_extention){
                // dd($request->image_bas64);
                $storedPath = $this->imageService->storeBase64Image($request->image_base64, $request->image_extention, 'brief');
            }
            Brief::insertBrief($request, $storedPath);

            return $this->response(['status' => Constant::HTTP_STATUS['success'],  'data' => [], 'code' => Constant::HTTP_CODE['created']]);
        }catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function show($id){

        $row = Brief::getOne($id);

        return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' => Constant::HTTP_CODE['success']]);
    }

    public function update(UpdateBriefApiRequest $request, $id)
    {
        try {
            $storedPath = '';
            if($request->image_base64 && $request->image_extention){
                $storedPath = $this->imageService->storeBase64Image($request->image_base64, $request->image_extention, 'brief');
            }
                $row = Brief::updateBrief($request, $id, $storedPath);

                return $this->response(['status' => Constant::HTTP_STATUS['success'], 'data' => $row, 'code' =>  Constant::HTTP_CODE['updated']]);
        } catch (\Throwable $e) {
            return $this->response(['status' => Constant::HTTP_STATUS['failed'], 'error' => $e->getMessage(), 'code' => Constant::HTTP_CODE['bad_request']]);
        }
    }

    public function destroy(string $id)
    {
        $row = Brief::find($id);
        $this->imageService->deleteImage($row->image_path);

        return Brief::deleteBrief($id)
            ? $this->response(['status' => Constant::HTTP_STATUS['success'], 'code' => Constant::HTTP_CODE['success']])
            : $this->response(['status' => Constant::HTTP_STATUS['failed'],'code' => Constant::HTTP_CODE['not_found']]);
    }
}

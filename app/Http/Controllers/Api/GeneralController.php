<?php

namespace App\Http\Controllers\Api;

use App\Constant;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    // get role and permissions
    public function getUserRole(){
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $permissions = $user->getAllPermissions()->pluck('name');

        return response()->json(['status' => Constant::HTTP_STATUS['success'],'data' => [
                'roles' => $roles,
                'permissions' => $permissions,
            ],'code' => Constant::HTTP_CODE['success'],]);
    }
}

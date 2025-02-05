<?php

namespace App\Http\Controllers\Ajax\User;

use App\Http\Controllers\Controller;

use App\Services\User\UserService;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{   
    protected $userService; 

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    
    public function filter(Request $request) {
        $users = $this->userService->paginate($request);
        if ($users) {
            return response()->json([
                'status' => 'success',
                'data' => $users,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => "Lấy dữ liệu không thành công!"
            ], 500);
        }
    } 

    public function create(StoreUserRequest $request) {
        $response = $this->userService->create($request);
        return $response;
    }

    public function edit($id) {
        $user = $this->userService->getUserDetails($id);
        return $user;
    }

    public function update(UpdateUserRequest $request, $id) {
        $response = $this->userService->update($request, $id);
        return $response;
    }

    public function delete($id) {
        $response = $this->userService->delete($id);
        return $response;
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\UserRequest;
use App\Http\Service\UserService;
use App\Resource\UserResource;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function postNewUser(UserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->userService->newUser($validatedData);
            return ApiResponse::success([$validatedData], UserResource::USER_REGISTER_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(UserResource::USER_REGISTER_FAILED, $exception, Response::HTTP_UNAUTHORIZED);
        }

    }

    public function getAllUsers()
    {
        try {
            $users = $this->userService->allUsers();
            return ApiResponse::success($users, UserResource::USER_GET_SUCCESS, Response::HTTP_OK);
        }catch (\Exception $exception){
            return ApiResponse::error(UserResource::USER_GET_FAILED, $exception, Response::HTTP_UNAUTHORIZED);
        }

    }

    public function getUserById($id)
    {
        try{
            $user = $this->userService->userById($id);
            if(!$user){
                return ApiResponse::error(UserResource::USER_GET_ID_NOT_FOUND, '', Response::HTTP_NOT_FOUND);
            }
            return ApiResponse::success([$user], UserResource::USER_GET_ID_SUCCESS, Response::HTTP_OK);
        }catch (\Exception $exception){
            return ApiResponse::error(UserResource::USER_GET_ID_FAILED, $exception, Response::HTTP_NOT_FOUND);
        }
    }

    public function putUser(UserRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $userUpdated = $this->userService->updateUser($id, $validatedData);
            if(!$userUpdated){
                return ApiResponse::error(UserResource::USER_PUT_FAILED, '',Response::HTTP_NOT_FOUND);
            }
            return ApiResponse::success([$validatedData], UserResource::USER_PUT_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(UserResource::USER_PUT_FAILED, $exception, Response::HTTP_NOT_FOUND);
        }
    }

    public function deleteUser($id)
    {
        try {
            $userDeleted = $this->userService->deleteUser($id);
            if(!$userDeleted){
                return ApiResponse::error(UserResource::USER_DELETE_NOT_FOUND, '', Response::HTTP_NOT_FOUND);
            }
            return ApiResponse::success([''], UserResource::USER_DELETE_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(UserResource::USER_DELETE_FAILED, $exception, Response::HTTP_NOT_FOUND);
        }
    }
}

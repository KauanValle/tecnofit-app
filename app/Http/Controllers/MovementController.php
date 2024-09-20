<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\MovementRequest;
use App\Http\Service\MovementService;
use App\Resource\MovementResource;
use Symfony\Component\HttpFoundation\Response;

class MovementController extends Controller
{
    private $movementService;
    public function __construct(MovementService $movementService)
    {
        $this->movementService = $movementService;
    }

    public function postNewMovement(MovementRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->movementService->newMovement($validatedData);
            return ApiResponse::success($validatedData, MovementResource::MOVEMENT_REGISTER_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(MovementResource::MOVEMENT_REGISTER_FAILED, $exception, Response::HTTP_UNAUTHORIZED);
        }

    }

    public function getAllMovements()
    {
        try {
            $movements = $this->movementService->allMovements();
            return ApiResponse::success($movements, MovementResource::MOVEMENT_GET_SUCCESS, Response::HTTP_OK);
        }catch (\Exception $exception){
            return ApiResponse::error(MovementResource::MOVEMENT_GET_FAILED, $exception, Response::HTTP_UNAUTHORIZED);
        }

    }

    public function getMovementById($id)
    {
        try{
            $movement = $this->movementService->movementById($id);
            if(!$movement){
                return ApiResponse::error(MovementResource::MOVEMENT_GET_ID_NOT_FOUND, '', Response::HTTP_NOT_FOUND);
            }
            return ApiResponse::success($movement, MovementResource::MOVEMENT_GET_ID_SUCCESS, Response::HTTP_OK);
        }catch (\Exception $exception){
            return ApiResponse::error(MovementResource::MOVEMENT_GET_ID_FAILED, $exception, Response::HTTP_NOT_FOUND);
        }
    }

    public function putMovement(MovementRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $movementUpdated = $this->movementService->updateMovement($id, $validatedData);
            if(!$movementUpdated){
                return ApiResponse::error(MovementResource::MOVEMENT_PUT_FAILED, '', Response::HTTP_NOT_FOUND);
            }
            return ApiResponse::success($validatedData, MovementResource::MOVEMENT_PUT_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(MovementResource::MOVEMENT_PUT_FAILED, $exception, Response::HTTP_NOT_FOUND);
        }
    }

    public function deleteMovement($id)
    {
        try {
            $movementDeleted = $this->movementService->deleteMovement($id);
            if(!$movementDeleted){
                return ApiResponse::error(MovementResource::MOVEMENT_DELETE_NOT_FOUND, '', Response::HTTP_NOT_FOUND);
            }
            return ApiResponse::success([''], MovementResource::MOVEMENT_DELETE_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(MovementResource::MOVEMENT_DELETE_FAILED, $exception, Response::HTTP_NOT_FOUND);
        }
    }
}

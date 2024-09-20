<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\PersonalRecordRequest;
use App\Http\Service\PersonalRecordService;
use App\Resource\PersonalRecordResource;
use Illuminate\Http\Response;

class PersonalRecordController extends Controller
{
    private $personalRecordService;
    public function __construct(PersonalRecordService $personalRecordService)
    {
        $this->personalRecordService = $personalRecordService;
    }

    public function postNewPersonalRecord(PersonalRecordRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $personalRecordRegistered = $this->personalRecordService->newPersonalRecord($validatedData);
            $rejectionsArray = $this->personalRecordService->getRejectionsArray();
            if(in_array($personalRecordRegistered, $rejectionsArray)){
                return ApiResponse::error($personalRecordRegistered, '', Response::HTTP_UNAUTHORIZED);
            }
            return ApiResponse::success([$validatedData], PersonalRecordResource::PERSONAL_RECORD_REGISTER_SUCCESS, Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return ApiResponse::error(PersonalRecordResource::PERSONAL_RECORD_REGISTER_FAILED, $exception, Response::HTTP_UNAUTHORIZED);
        }

    }

    public function getRankingPersonalRecords()
    {
        try {
            $personalRecords = $this->personalRecordService->rankingPersonalRecords();
            return ApiResponse::success($personalRecords, PersonalRecordResource::PERSONAL_RECORD_GET_SUCCESS, Response::HTTP_OK);
        }catch (\Exception $exception){
            return ApiResponse::error(PersonalRecordResource::PERSONAL_RECORD_GET_FAILED, $exception, Response::HTTP_UNAUTHORIZED);
        }
    }
}

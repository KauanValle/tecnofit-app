<?php

namespace App\Http\Service;

use App\Http\Repository\PersonalRecordRepository;
use App\Models\Movement;
use App\Models\PersonalRecord;
use App\Models\User;
use App\Resource\PersonalRecordResource;

class PersonalRecordService
{
    private $personalRecordRepository;
    public function __construct(PersonalRecordRepository $personalRecordRepository)
    {
        $this->personalRecordRepository = $personalRecordRepository;
        $this->personalRecordRepository->setModel(new PersonalRecord());
    }

    public function newPersonalRecord($request)
    {
        $personalRecord = new PersonalRecord();
        $personalRecord->fill($request);

        # Movimento inexistente
        if(empty($personalRecord->movement()->first())){
            return PersonalRecordResource::PERSONAL_RECORD_MOVEMENT_NOT_FOUND;
        }

        # Usuario inexistente
        if(empty($personalRecord->user()->first())){
            return PersonalRecordResource::PERSONAL_RECORD_USER_NOT_FOUND;
        }

        $this->personalRecordRepository->post($request);
    }

    public function rankingPersonalRecords()
    {
        $personalRecords = $this->personalRecordRepository->get();
        $rankedRecords = [];
        $currentRank = 1;
        $positionIncrement = 1;
        $previousValue = null;

        foreach ($personalRecords as $key => $record) {
            if ($record->value != $previousValue) {
                $currentRank = $positionIncrement;
            }

            $usuario = $record->user()->select([User::ID, User::NAME])->get()->toArray();
            $movement = $record->movement()->select([Movement::ID, Movement::NAME])->get()->toArray();

            # Retorno montado para praticidade de visualização, seria adaptavel a necessidade do produto.
            $rankedRecords[] = [
                'rank' => $currentRank,
                'value' => $record->value,
                'movement' =>$movement[0]['name'],
                'user' => $usuario[0]['name']
            ];

            $previousValue = $record->value;
            $positionIncrement++;
        }
        return $rankedRecords;
    }

    public function getRejectionsArray()
    {
        return [
            PersonalRecordResource::PERSONAL_RECORD_MOVEMENT_NOT_FOUND,
            PersonalRecordResource::PERSONAL_RECORD_USER_NOT_FOUND,
        ];
    }
}

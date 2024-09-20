<?php

namespace App\Http\Service;

use App\Http\Repository\MovementRepository;
use App\Models\Movement;

class MovementService
{
    private $movementRepository;
    public function __construct(MovementRepository $movementRepository)
    {
        $this->movementRepository = $movementRepository;
        $this->movementRepository->setModel(new Movement());
    }

    public function newMovement($data)
    {
        $this->movementRepository->post($data);
    }

    public function allMovements()
    {
        return $this->movementRepository->get();
    }

    public function movementById($id)
    {
        return $this->movementRepository->getById($id);
    }

    public function updateMovement($id, $data)
    {
        return $this->movementRepository->putUpdateMovement($id, $data);
    }

    public function deleteMovement($id)
    {
        return $this->movementRepository->deleteMovement($id);
    }
}

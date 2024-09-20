<?php

namespace App\Http\Service;

use App\Http\Repository\UserRepository;
use App\Models\User;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->userRepository->setModel(new User());
    }

    public function newUser($data)
    {
        $this->userRepository->post($data);
    }

    public function allUsers()
    {
        return $this->userRepository->get();
    }

    public function userById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function updateUser($id, $data)
    {
        return $this->userRepository->putUpdateUser($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}

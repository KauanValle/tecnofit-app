<?php

namespace App\Resource;

class MovementResource
{
    const MOVEMENT_REGISTER_SUCCESS = 'Novo movimento registrado com sucesso.';
    const MOVEMENT_REGISTER_FAILED = 'Houve um erro ao registar o movimento.';

    const MOVEMENT_GET_SUCCESS = 'Todos os registros foram listados.';
    const MOVEMENT_GET_FAILED = 'Houve um erro ao listar todos os registros.';

    const MOVEMENT_GET_ID_SUCCESS = 'Registro listado com sucesso.';
    const MOVEMENT_GET_ID_FAILED = 'Houve um erro ao listar o registro.';
    const MOVEMENT_GET_ID_NOT_FOUND = 'O registro informado não existe na nossa base de dados.';

    const MOVEMENT_PUT_SUCCESS = 'Registro atualizado com sucesso.';
    const MOVEMENT_PUT_FAILED = 'Houve um erro ao atualizar o registro.';

    const MOVEMENT_DELETE_SUCCESS = 'Registro apagado com sucesso.';
    const MOVEMENT_DELETE_FAILED = 'Houve um erro ao apagar o registro.';
    const MOVEMENT_DELETE_NOT_FOUND = 'O registro informado não existe na nossa base de dados.';
}

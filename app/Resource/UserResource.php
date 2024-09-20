<?php

namespace App\Resource;

class UserResource
{
    const USER_REGISTER_SUCCESS = 'Novo usuario registrado com sucesso.';
    const USER_REGISTER_FAILED = 'Houve um erro ao registar o usuario.';

    const USER_GET_SUCCESS = 'Todos os registros foram listados.';
    const USER_GET_FAILED = 'Houve um erro ao listar todos os registros.';

    const USER_GET_ID_SUCCESS = 'Registro listado com sucesso.';
    const USER_GET_ID_FAILED = 'Houve um erro ao listar o registro.';
    const USER_GET_ID_NOT_FOUND = 'O registro informado não existe na nossa base de dados.';

    const USER_PUT_SUCCESS = 'Registro atualizado com sucesso.';
    const USER_PUT_FAILED = 'Houve um erro ao atualizar o registro.';

    const USER_DELETE_SUCCESS = 'Registro apagado com sucesso.';
    const USER_DELETE_FAILED = 'Houve um erro ao apagar o registro.';
    const USER_DELETE_NOT_FOUND = 'O registro informado não existe na nossa base de dados.';
}

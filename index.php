<?php

// CONTROLADORES
require_once 'src/Controllers/PessoaController.php';

// CRIA UMA INSTÂNCIA DO CONTROLADOR: PessoaController
$controller = new PessoaController();

// PEGAR A AÇÃO SOLICITADA, SENÃO DEFINIDA RETORNAR index
$action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?? 'index';

// PEGA O ID PASSADO NA URL, SENÃO DEFINIDO RETORNAR null
$id = filter_input(INPUT_GET, 'id', FILTER_UNSAFE_RAW) ?? null;

// VERIFICA QUAL AÇÃO FOI SOLICITADA E CHAMA O MÉTODO CORRESPONDENTE NO CONTROLADOR
switch ($action) {
    case 'create':
        $controller->cadastrarPessoaForm();
        break;
    case 'store':
        $controller->cadastrarPessoa();
        break;
    case 'edit':
        if ($id) {
            $controller->buscarPessoaId($id);
        } else {
            echo("ID não fornecido para edição.");
        }
        break;
    case 'update':
        if ($id) {
            $controller->atualizarPessoa($id);
        } else {
            echo("ID não fornecido para atualização.");
        }
        break;
    case 'delete':
        if ($id) {
            $controller->excluirPessoa($id);
        } else {
            echo("ID não fornecido para deleção.");
        }
        break;
    case 'sorteio':
        $controller->sorteio();
        break;
    default:
        $controller->buscarPessoas();
        break;
}

?>

<?php

require_once 'src/Models/Pessoa.php';

class PessoaController {

    /**
     * Método responsável por obter pessoas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public function buscarPessoas(){
        // PEGAR O TEXTO DA BUSCA
        $busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

        // CONDIÇÕES SQL
        $condicoes = [
            !empty($busca) ? 'nome LIKE "%'.str_replace(' ', '%', $busca).'%"' : null,
            !empty($busca) ? 'email LIKE "%'.str_replace(' ', '%', $busca).'%"' : null
        ];

        // REMOVE POSIÇÕES VAZIAS
        $condicoes = array_filter($condicoes);
        
        // CLÁUSULA WHERE 
        $where = implode(' OR ', $condicoes);        

        $pessoas = Pessoa::buscarPessoas($where);

        include 'src/Views/index.php';
    }    

    /**
     * Método responsável por mostrar o formulário de cadastro
     */
    public function cadastrarPessoaForm() {
        include 'src/Views/form.php';
    }

    /**
     * Método responsável por cadastrar uma nova pessoa
     * @return boolean
     */
    public function cadastrarPessoa(){
        $nome  = filter_input(INPUT_POST, 'nome',  FILTER_UNSAFE_RAW);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $pessoa = Pessoa::buscarPessoaEmail($email);
        
        if($pessoa instanceof Pessoa)
            header('Location: index.php?action=create&nome='.$nome.'&email='.$email.'&error=Já existe um usuário com este e-mail.');
        else{
            $obPessoa = new Pessoa();
            $obPessoa->nome  = $nome;
            $obPessoa->email = $email;
            $obPessoa->cadastrarPessoa();

            header('Location: index.php?action=index&success=Usuário cadastrado com sucesso.');
        }
    }

    /**
     * Método responsável por buscar uma pessoa com base em seu ID
     * @param integer $id
     * @return Pessoa
     */
    public function buscarPessoaId($id){        
        $pessoa = Pessoa::buscarPessoaId($id);

        include 'src/Views/form.php';
    }

    /**
     * Método responsável por atualizar uma pessoa no banco
     * @return boolean
     */
    public function atualizarPessoa($id){
        $nome  = filter_input(INPUT_POST, 'nome',  FILTER_UNSAFE_RAW);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $pessoaAtual = Pessoa::buscarPessoaId($id);
        
        if($pessoaAtual->email !== $email){
            $pessoaComEmail = Pessoa::buscarPessoaEmail($email);
            if($pessoaComEmail instanceof Pessoa){
                header('Location: index.php?action=edit&id='.$id.'&error=Já existe um usuário com este e-mail.');
                exit; // Adicionar exit após o redirecionamento
            }
        }
        
        $obPessoa = new Pessoa();
        $obPessoa->id    = $id;
        $obPessoa->nome  = $nome;
        $obPessoa->email = $email;
        $obPessoa->atualizarPessoa();
    
        header('Location: index.php?action=index&success=Usuário atualizado com sucesso.');
        exit; // Adicionar exit após o redirecionamento
    }
    
    /**
     * Método responsável por excluir uma pessoa do banco
     * @return boolean
     */
    public function excluirPessoa($id){
        $obPessoa = new Pessoa();
        $obPessoa->id = $id;
        $obPessoa->excluirPessoa();

        header('Location: /desafio-amigo-secreto');
    }

    /**
     * Método responsável por sortear as pessoas
     * @return array
     */
    public function sorteio(){
        
        // BUSCANDO AS PESSOA PARA O SORTEIO
        $pessoas = Pessoa::buscarPessoas();

        // EMBARALHANDO AS PESSOAS
        shuffle($pessoas);

        // SORTEANDO AS PESSOAS
        $resultado = [];
        for ($i = 0; $i < count($pessoas); $i++) {
            $amigo = ($i + 1) % count($pessoas);

            $resultado[] = [
                'doador' => $pessoas[$i]->nome,
                'recebedor' => $pessoas[$amigo]->nome
            ];
        }
        
        // VIEW ONDE O SORTEIO SERA APRESENTADO
        include 'src/Views/resultado.php';
    }
}

?>

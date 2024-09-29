<?php
    
require_once 'src/Models/Database.php';

class Pessoa {

    /**
     * Identificador único da pessoa
     * @var integer
     */
    public $id;

    /**
     * Nome da pessoa
     * @var string
     */
    public $nome;
    
    /**
     * E-mail da pessoa
     * @var string
     */
    public $email;

    /**
     * Método responsável por obter pessoas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function buscarPessoas($where = null, $order = null, $limit = null){
        $obDatabase = new Database('pessoas');
        $obDatabase = $obDatabase->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $obDatabase;
    }

    /**
     * Método responsável por cadastrar uma nova pessoa
     * @return boolean
     */
    public function cadastrarPessoa(){
        $obDatabase = new Database('pessoas');
        $obDatabase = $obDatabase->insert(['nome' => $this->nome, 'email' => $this->email]);
        
        return $obDatabase;
    }

    /**
     * Método responsável por buscar uma pessoa com base em seu ID
     * @param integer $id
     * @return Pessoa
     */
    public static function buscarPessoaId($id){
        $obDatabase = new Database('pessoas');
        $obDatabase = $obDatabase->select('id = '.$id)->fetchObject(self::class);

        return $obDatabase;
    }

    /**
     * Método responsável por buscar uma pessoa com base em seu E-mail
     * @param string $email
     * @return Pessoa
     */
    public static function buscarPessoaEmail($email){
        $obDatabase = new Database('pessoas');
        $obDatabase = $obDatabase->select('email = '."'{$email}'")->fetchObject(self::class);        

        return $obDatabase;
    }    

    /**
     * Método responsável por atualizar uma pessoa no banco
     * @return boolean
     */
    public function atualizarPessoa(){
        $obDatabase = new Database('pessoas');
        $obDatabase = $obDatabase->update('id = '.$this->id, ['nome'  => $this->nome, 'email' => $this->email]);

        return $obDatabase;
    }
    
    /**
     * Método responsável por excluir uma pessoa do banco
     * @return boolean
     */
    public function excluirPessoa(){
        $obDatabase = new Database('pessoas');
        $obDatabase->delete('id = '.$this->id);
    }
}

?>
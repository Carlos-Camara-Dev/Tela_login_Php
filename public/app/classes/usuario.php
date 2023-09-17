<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

class usuario
{
    private string $nome;
    private string $senha;
    private string $email;

    public function __construct($email, $nome, $senha, $conexao)
    {
        $this->set_nome($nome);
        $this->set_email($email);
        $this->set_senha($senha);
        $this->verificar_usuario($email, $senha, $conexao);
    }

    public function get_nome()
    {
        return  $this->nome;
    }
    private function set_nome(string $nome)
    {
        $this->nome = $nome;
    }

    public function get_email()
    {
        return  $this->email;
    }
    private function set_email(string $email)
    {
        $this->email = $email;
    }
    public function get_senha()
    {
        return  $this->senha;
    }
    private function set_senha(string $senha)
    {
        $this->senha = $senha;
    }

    public function verificar_usuario(string $email,  string $senha, $conexao)
    {
        // Verifica se o usuario já foi cadastrado
        $comando = $conexao->query("SELECT * FROM usuario WHERE email='$email' AND senha='$senha'");

        if ($comando->rowCount() > 0) {
            header('location: login.html');
        } else {
            $this->cadastrar_usuario($conexao);
        }
    }
    public function cadastrar_usuario($conexao)
    {
        $comando = $conexao->query('INSERT INTO usuario(nome, email, senha)VALUES($this->getNome(), $this->getNome(), $this->getNome())');
    }
    // public function verificar_usuario(string $email,  string $senha, $conexao)
    // {

    //     $comando = $conexao->query("SELECT * FROM usuario WHERE email='$email' AND senha='$senha'");

    //     if ($comando->rowCount() > 0) {
    //         $dados = $comando->fetch(PDO::FETCH_ASSOC);
    //         $tipo = $dados['tipo'];

    //         $this->setEmail($nome);
    //         $this->setId_suario($id);
    //         $this->setTipo($tipo);

    //         header('location: home.php');
    //     }
    // }
}
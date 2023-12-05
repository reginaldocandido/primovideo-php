<?php
class Classificacao
{
    public $id;
    public $classificacao;
    

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM classificacoes";

        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        // Query SQL para buscar todas as informações pelo id
        $sql = "SELECT * FROM classificacoes WHERE id=" . $this->id;
        include "conexao.php";

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->id = $linha['id'];
        $this->classificacao = $linha['classificacao'];
        
    }
}

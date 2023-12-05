<?php
class Filme
{
    public $id;
    public $titulo;
    public $sinopse;
    public $ano;
    public $tempo;
    public $imdb;
    public $imagem;
    public $classificacao;
    public $categorias;
    public $youtube;

    public $nomeImagem;
    public $caminhoImagem;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function inserir()
    {
        // A Função do PHP "preg_match()", pega a extensão da imagem e carrega na variável $ext
        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->imagem["name"], $ext);

        /* Esta linha usa as funções PHP md5(), uniqid() e time() 
        para gerar um nome único para a imagem. Depois concatena com a extensão extraida na linha acima */
        $this->nomeImagem = md5(uniqid(time())) . "." . $ext[1];

        //Esta linha concatena o caminho da pasta que guardaremos as imagens com nome da imagem
        $this->caminhoImagem = '../assets/img/galeria/' . $this->nomeImagem;
        /*******MUNDANÇA DE CAMINHO*****/

        //Aqui utilizamos a função PHP move_upload_file() para salvar a imagem na pasta
        move_uploaded_file($this->imagem["tmp_name"], $this->caminhoImagem);

        //Aqui criamos o comando SQL para inserir os dados na tabela de alunos
        $sql = "INSERT INTO filmes (titulo, sinopse, ano, tempo, imdb, imagem, fk_classificacao_id, youtube) VALUES (
                    '{$this->titulo}',
                    '{$this->sinopse}',
                    '{$this->ano}',
                    '{$this->tempo}',
                    '{$this->imdb}',
                    '{$this->nomeImagem}',
                    '{$this->classificacao}',
                    '{$this->youtube}'
                    )";
        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/
        $conexao->exec($sql);
        echo "Registro gravado com sucesso!";
        header("refresh:1; URL= ../index.php?acao=listar&permissao=adm");
    }

    public function listar()
    {
        $sql = "SELECT * FROM view_filmes_info";
        // . $this->id;

        include "conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function excluir()
    {
        // $this->carregar();
        // // Define a string de consulta SQL para deletar um registro
        // // da tabela "tb_turmas" com base no seu ID
        // $sql = "DELETE FROM tb_alunos WHERE id=" . $this->id;

        // // Cria uma nova conexão PDO com o banco de dados "sis-escolar" localizado
        // // no servidor "127.0.0.1" e autentica com o usuário "root" (sem senha)
        // include "conexao.php";
        // /*******MUNDANÇA DE CAMINHO*****/

        // // Executa a instrução SQL de exclusão utilizando o método
        // // "exec" do objeto de conexão PDO criado acima
        // $conexao->exec($sql);

        // //Apaga a foto da pasta
        // unlink("../img/" . $this->foto);
    }


    public function atualizar()
    {
        // print_r($this->imagem);

        //Verifica se o usuário alterou a Foto do Aluno, se alterou continua daqui
        if (!empty($_FILES['imgCartaz']['name'])){
            // A Função do PHP "preg_match()", pega a extensão da imagem e carrega na variável $ext
            preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->imagem["name"], $ext);

            /* Esta linha usa as funções PHP md5(), uniqid() e time() 
            para gerar um nome único para a imagem. Depois concatena com a extensão extraida na linha acima */
            $this->nomeImagem = md5(uniqid(time())) . "." . $ext[1];

            //Esta linha concatena o caminho da pasta que guardaremos as imagens com nome da imagem
            $this->caminhoImagem = '../assets/img/galeria/' . $this->nomeImagem;
            /*******MUNDANÇA DE CAMINHO*****/

            //Aqui utilizamos a função PHP move_upload_file() para salvar a imagem na pasta
            move_uploaded_file($this->imagem["tmp_name"], $this->caminhoImagem);



            // Query SQL para atualizar um aluno no banco de dados pelo id
            $sql = "UPDATE filmes SET 
                    titulo = '$this->titulo' ,
                    sinopse = '$this->sinopse',
                    ano = '$this->ano',
                    tempo = '$this->tempo',
                    imdb = '$this->imdb',
                    imagem = '$this->nomeImagem',
                    fk_classificacao_id = '$this->classificacao',
                    youtube = '$this->youtube'
                    WHERE id = '$this->id' ";
        } else {
            
            // Caso o usuário não tenha alterado a FOTO, o campo chegará vazio,
            // então não realizamos o UPDATE da foto e mantemos a antiga.
            $sql = "UPDATE filmes SET 
                    titulo = '$this->titulo' ,
                    sinopse = '$this->sinopse',
                    ano = '$this->ano',
                    tempo = '$this->tempo',
                    imdb = '$this->imdb',
                    fk_classificacao_id = '$this->classificacao',
                    youtube = '$this->youtube'
                    WHERE id = '$this->id' ";
        }

        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/
        $conexao->exec($sql);
        echo "Registro atualizado com sucesso!";
        header("refresh:3; URL= ../index.php?acao=listar&permissao=adm");
    }

    public function carregar()
    {
        // Query SQL para buscar todas as informações pelo id
        $sql = "SELECT * FROM view_filmes_info WHERE id=" . $this->id;
        include "conexao.php";
        /*******MUNDANÇA DE CAMINHO*****/

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->id = $linha['id'];
        $this->titulo = $linha['titulo'];
        $this->sinopse = $linha['sinopse'];
        $this->ano = $linha['ano'];
        $this->tempo = $linha['tempo'];
        $this->imdb = $linha['imdb'];
        $this->imagem = $linha['imagem'];
        $this->classificacao = $linha['classificacao'];
        $this->categorias = $linha['categorias'];
        $this->youtube = $linha['youtube'];
    }
}

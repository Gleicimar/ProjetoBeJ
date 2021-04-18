<?php
/* Inicializa uma sessão */
session_start();

/* Verifica se já existe uma sessão ativa */
if(!isset($_SESSION['itens'])){
    $_SESSION['itens'] = array();
}

/* Inicializa uma sessão */
if(isset($_GET['add']) && $_GET['add'] == 'carrinho'){
    $idProduto = $_GET['id'];
    if(!isset($_SESSION['itens'][$idProduto])){
        $_SESSION['itens'][$idProduto] = 1;
    }else{
        $_SESSION['itens'][$idProduto] += 1;
    }
}

/* Mostrar carrinho de compras */

if(count($_SESSION['itens']) == 0){
    echo 'Carrinho Vazio<br/><a href="index.php">Adicionar Itens</a>';
}else{
    $conection = new PDO('mysql:host=localhost;dbname=meusprodutos', 'admin', 'nuttertools');
    foreach{($_SESSION['itens'] as $idProduto => $qtde)
    $query = $conection->prepare("SELECT * FROM produtos WHERE id=?");
    $query->bindParam(1, $idProduto);
    $query->execute();
    $produtos = $query->fetchAll();
    echo
        $produtos[0]["nome"].'<br/>';
    }
}

?>
<?php
echo  "Olá mundo"

?>
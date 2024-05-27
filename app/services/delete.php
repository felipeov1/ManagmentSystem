<?php

//////////// Products

function deleteProduct($table, $productID)
{
  try {
    $connect = connect();
    $query = $connect->prepare("UPDATE $table SET ativo = 1 WHERE IDProduto = :IDProduto");

    $query->execute([
      ':IDProduto' => $productID
    ]);

    if ($query->rowCount() > 0) {
      echo "Produto excluído com sucesso!";
    } else {
      echo "Nenhum produto foi excluído!";
    }
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}


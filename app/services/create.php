<?php 

//////////// Products

function addProduct($table, $productName, $productQuantity, $productPrice)
{
  try {
    $connect = connect();
    $query = $connect->prepare("INSERT INTO produtos (Nome, Quantidade, ValorQuantidade) VALUES (:Nome, :Quantidade, :ValorQuantidade)");

    $query->execute([
      ':Nome' => $productName,
      ':Quantidade' => $productQuantity,
      ':ValorQuantidade' => $productPrice
    ]);

    if ($query->rowCount() > 0) {
      echo "Inserção bem-sucedida!";
    } else {
      echo "Nenhuma linha inserida!";
    }
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}





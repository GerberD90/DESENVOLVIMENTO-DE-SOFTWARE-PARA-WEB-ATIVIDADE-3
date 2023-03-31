<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servidor = "localhost"; // nome do servidor MySQL
  $usuario = "usuario"; // nome de usuário do MySQL
  $senha = "senha"; // senha do MySQL
  $banco = "nome_db"; // nome do banco de dados
  $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
  if (!$conexao) {
    die("Erro ao se conectar ao banco de dados: " . mysqli_connect_error());
  }

  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $valor = $_POST["valor"];
  $fornecedor = $_POST["fornecedor"];

  $query = "INSERT INTO produtos (nome, descricao, valor, fornecedor) VALUES ('$nome', '$descricao', '$valor', '$fornecedor')";
  if (mysqli_query($conexao, $query)) {
    echo "<p>Dados salvos com sucesso.</p>";
  } else {
    echo "<p>Erro ao salvar dados: " . mysqli_error($conexao) . "</p>";
  }

  mysqli_close($conexao);
}
?>

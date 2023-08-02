<?php
include_once '../bd/Conexao.php';

$conexao = new Conexao();

// Number of records fetch
$numberofrecords = 10;

if(!isset($_POST['searchTerm'])){

   // Fetch records
   $usersList = $conexao->obterConexao()->prepare("SELECT * FROM autor ORDER BY nome");
   //$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $usersList = $stmt->execute();
   $usersList = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Fetch records
   $stmt = $conexao->obterConexao()->prepare("SELECT * FROM autor WHERE nome like :nome ORDER BY nome");
   $stmt->bindValue(':nome', '%'.$search.'%', PDO::PARAM_STR);
//$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $usersList = $stmt->execute();
   $usersList = $stmt->fetchAll();

}

$response = array();

// Read Data
foreach($usersList as $user){
   $response[] = array(
      "id" => $user['id'],
      "text" => $user['nome']
   );
}

echo json_encode($response);
exit();
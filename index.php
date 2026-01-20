<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Teste</title>
</head>

<body>
  <h1>Primeira prática de PHP</h1>

  <?php
  // $arrayAssociativoNomes = array("Luck" => "L", "Katlin" => "K", "Daniel" => "D", "Luizy" => "LU", );
  // $arrayAlternativo = ["Computador", "Microondas", "Ar condicionado", "Cama"];
  // $nome = "Lucas";
  // $a = 10;
  // $b = 5;
  // print_r($arrayAssociativoNomes[1]);
  // echo PularLinha();
  // print_r($arrayAlternativo[1]);
  // echo PularLinha();
  // foreach ($arrayAlternativo as $value) {
  //     print "<h1>$value</h1> <br>";
  // }
  // // var_dump($a < $b);
  // // echo "Meu nome é $nome";
  // echo PularLinha();
  
  // foreach ($arrayAssociativoNomes as $value => $key) {
  //     print "$value $key ";
  // }
  
  // // ===============================================
  
  // class Animal
  // {
  //     public $tipo;
  
  //     public function __construct($tipoAnimal)
  //     {
  //         $this->tipo = $tipoAnimal;
  //     }
  
  //     public function fazerBarulho()
  //     {
  
  //         switch ($this->tipo) {
  //             case "cachorro":
  //                 echo "au au au";
  //                 break;
  //             case "gato":
  //                 echo "miauuuu";
  //                 break;
  //             case "vaca":
  //                 echo "muuuuu";
  //                 break;
  //             default:
  //                 echo "Sou mudo";
  //                 break;
  //         }
  
  //     }
  // }
  
  // $cachorro = new Animal("cachorro");
  // $cachorro->fazerBarulho();
  
  // echo PularLinha();
  
  // $gato = new Animal("gato");
  // echo $gato->fazerBarulho();
  

  // ==================================================
  
  $dadosConvertidos = json_decode(file_get_contents("mocks.json"));

  $arrayDosDados = $dadosConvertidos->data;

  require "service.php";
  ?>

  <pre>
      <?php
      var_dump(getPessoas());
      ?>
  </pre>

  <h1>Tabela vindo do Banco de Dados MYSQL</h1>

  <table class="tabela">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Idade</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach (getPessoas() as $key => $value) { ?>
        <tr>
          <td>
            <?php
            echo $value->id
              ?>
          </td>
          <td>
            <?php
            echo $value->nome
              ?>
          </td>
          <td>
            <?php
            echo $value->idade
              ?>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>

  <br>

  <form action="service.php" method="post" class="form-simples">
    <label for="nome">Seu nome:</label>
    <input name="nome" id="nome" type="text" placeholder="Digite seu nome">

    <label for="idade">Sua idade:</label>
    <input name="idade" id="idade" type="number" placeholder="Digite sua idade">

    <button type="submit">Enviar</button>
  </form>

  <br>
  <br>

  <h1>Tabela vindo do arquivo .json(dados mockados)</h1>

  <table class="tabela">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Ativo</th>
        <th>Data de Criação</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($arrayDosDados as $pessoa) { ?>
        <tr>
          <td>
            <?php
            echo $pessoa->id;
            ?>
          </td>
          <td>
            <?php
            echo $pessoa->nome;
            ?>
          </td>
          <td>
            <?php
            echo $pessoa->email;
            ?>
          </td>
          <td>
            <?php
            echo $pessoa->idade;
            ?>
          </td>
          <td>
            <?php
            if ($pessoa->ativo) {
              echo "Ativa";
            } else {
              echo "Desativa";
            }
            ?>
          </td>
          <td>
            <?php
            echo $pessoa->criado_em;
            ?>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>

  <?php 

    require "connection.php";

    // var_dump(@$data->fetch());

    foreach ($data as $row) {
      print_r($row);
    }
  
  ?>
</body>

</html>
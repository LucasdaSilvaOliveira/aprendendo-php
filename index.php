<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste</title>

  <style>
    .tabela {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .tabela thead {
      background-color: #2c3e50;
      color: #ffffff;
    }

    .tabela th,
    .tabela td {
      padding: 12px 15px;
      text-align: left;
    }

    .tabela th {
      text-transform: uppercase;
      font-size: 12px;
      letter-spacing: 0.05em;
    }

    .tabela tbody tr {
      border-bottom: 1px solid #dddddd;
    }

    .tabela tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    .tabela tbody tr:hover {
      background-color: #eef3f7;
    }

    .tabela td {
      color: #333333;
    }

    /* Status */
    .tabela .ativo {
      color: #27ae60;
      font-weight: bold;
    }

    .tabela .inativo {
      color: #c0392b;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <h1>Primeira prática de PHP</h1>

  <?php
  // $arrayNomes = array("Luck" => "L", "Katlin" => "K", "Daniel" => "D", "Luizy" => "LU", );
  
  // $arrayAlternativo = ["Computador", "Microondas", "Ar condicionado", "Cama"];
  
  // $nome = "Lucas";
  // $a = 10;
  // $b = 5;
  
  // print_r($arrayNomes[1]);
  
  // echo PularLinha();
  
  // print_r($arrayAlternativo[1]);
  
  // echo PularLinha();
  
  // foreach ($arrayAlternativo as $value) {
  //     print "<h1>$value</h1> <br>";
  // }
  // // var_dump($a < $b);
  
  // // echo "Meu nome é $nome";
  
  // echo PularLinha();
  
  // foreach ($arrayNomes as $value => $key) {
  //     print "$value $key ";
  // }
  
  function pularLinha()
  {
    echo "<br><br>";
  }
  echo PularLinha();

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

  // require "service.php";
  
  // $opcoes = [
  //   "http" => [
  //     "method" => "GET",
  //     "header" => "User-Agent: PHP\r\n"
  //   ]
  // ];
  // $contexto = stream_context_create($opcoes);
  // $resposta = file_get_contents("https://api.example.com", false, $contexto);

  $pessoas = json_decode(file_get_contents("https://localhost:7061/api/Pessoa"));

  // foreach ($pessoas as $key => $value) {
  //   echo "<h1>$pessoas->$nome</h1>";
  // }
  
  // var_dump($pessoas);

    ?>

    <pre>
      <?php 
  var_dump($pessoas);
      
      ?>
    </pre>

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
</body>

</html>
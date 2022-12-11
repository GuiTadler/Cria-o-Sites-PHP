<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="padding:15px">
        <form method="POST"  enctype="multipart/form-data">
        <h3 class="title has-text-grey" style="justify-content: center; align-items: center; display: flex; padding: 8px">Cadastro de Pessoas</h3>
        <div class="row g-3" >
            <div class="col-sm-4" style="padding: 10px"> 
                <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" aria-label="nome">
            </div>
            <div class="col-sm-4">
                <input type="text" name="email" class="form-control" placeholder="Digite seu email" aria-label="email">
            </div>
            <div class="col-sm-4">
                <input type="file" name="foto" class="form-control" >
            </div>
        </div>
        <div class="row g-3" style="display: flex; width: 100%; padding: 10px;">
            <input type="submit" style="width: 20%; margin-left: 45%; margin-right: 45%; " name="enviar" value="Enviar" class="btn btn-primary" />
        </div>

        </form>
    </div>
    <hr/>
    <?php
        if(isset($_POST['enviar'])){
            $arquivo="./imagens/".$_FILES["foto"]["name"];
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo)){
                
                require_once "dataBase.php";
                #executar consulta no BD
                $sql="INSERT INTO usuario (nome, email, foto)
                VALUES 
                ('{$_POST['nome']}','{$_POST['email']}','{$arquivo}')";

                if(!$con->query($sql)){
                    echo "Falha ao salvar registro!";
                }

            }
        }

        include "listaUsuarios.php";
    ?>

</body>
</html>
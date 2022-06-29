<head>
    <title>Dados do Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<?php
    include_once 'conexao.php';
    $acao = $_GET['acao'];
    if(isset($_GET['cod'])){
        $cod = $_GET['cod'];
    }
    switch($acao){
        case 'insert':
            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $doc = $_POST['doc'];
        
            $sql = "INSERT INTO tbcliente (nomeCliente, tipoCliente, docIdentificadorCliente)
            VALUES ('$nome', '$tipo', '$doc')";
            
            if (!mysqli_query($conn, $sql)) {
                die ("Erro ao inserir: " . $sql . ", erro:" . mysqli_error($conn));
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert ('Dados cadastrados com sucesso!')
                window.location.href='crudcliente.php?acao=select'</script>";
            }
            break;
        case 'montar':
            include("menu.php");
            $cod = $_GET['cod'];
            $sql = 'SELECT * FROM tbCliente WHERE codCliente = '.$cod;
            $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar os dados");
            
            echo '<form method="post" name="dadoscliente" action="crudcliente.php?acao=atualizar">';
            while($registro = mysqli_fetch_array($resultado)){
                echo '<div class="form-group">
                        <label or="exampleFormControlInput1">Código</label>
                        <input name="cod" id="cod" type="text" class="form-control" id="exampleFormControlInput1" value='.$cod.'  readonly  required>
                        <label for="exampleFormControlInput1">Nome</label>
                        <input name="nome" id="nome" type="text" class="form-control" id="exampleFormControlInput1" value='.$registro['nomeCliente'].'  required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo do cliente</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tipo" id="tipo" value='.$registro['tipoCliente'].' required>
                            <option>Físico</option>
                            <option>Jurídico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Documento Identificador</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="doc" id="doc" value='.$registro['docIdentificadorCliente'].' required>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </center>
                </form>';
            }
            echo "</table>";
            echo "</form>";
            
            break;
        case 'atualizar':
            $cod = $_POST['cod'];
            $nome = $_POST['nome'];
            $doc = $_POST['doc'];
            $tipo = $_POST['tipo'];
            
            $sql ="UPDATE tbCliente SET nomeCliente = '$nome', tipoCliente = '$tipo', docIdentificadorCliente = '$doc' WHERE codCliente = '$cod' ";
            $resultado = mysqli_query($conn, $sql) or die("Erro ao atualizar os dados");

            if(!(mysqli_query($conn,$sql))){
                die("</br>Erro ao atualizar: ". mysqli_error($conn));
            }else{
                echo "<script language='javascript' type='text/javascript'>
                alert ('Dados atualizados com sucesso!')
                window.location.href='crudcliente.php?acao=selecionar'</script>";
            }
            
            
            break;
        case 'deletar':
            $sql = "DELETE FROM tbcliente WHERE codCliente = $cod";
            
            if (!mysqli_query($conn, $sql)) {
                die ("Erro ao inserir: " . $sql . ", erro:" . mysqli_error($conn));
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert ('Dados excluídos com sucesso!')
                window.location.href='crudcliente.php?acao=select'</script>";
            }
            
            mysqli_close($conn);
            header("Location:crudcliente.php?acao=selecionar");
            break;
        case 'select':
            include("menu.php");
            date_default_timezone_set('America/Sao_Paulo');
            header("Content-type: text/html; charset=utf-8");
            echo "<center> <table border=1>";
            echo "<tr>";
            echo "<th>CÓDIGO</th>";
            echo "<th>NOME</th>";
            echo "<th>TIPO</th>";
            echo "<th>DOCUMENTO IDENTIFICADOR</th>";
            echo "</tr> </center>";
            
            $sql = "SELECT * FROM tbcliente";
            $resultado = mysqli_query($conn, $sql) or die ("Erro ao retornar dados!");
            
            echo "<center><h2> Registros cadastrados na base de dados </h2> <br> </center>";
            
            while($registro=mysqli_fetch_array($resultado)){
                $cod = $registro['codCliente'];
                $nome = $registro['nomeCliente'];
                $tipo = $registro['tipoCliente'];
                $doc = $registro['docIdentificadorCliente'];
                
                echo "<tr>";
                echo "<td>".$cod."</td>";
                echo "<td>".$nome."</td>";
                echo "<td>".$tipo."</td>";
                echo "<td>".$doc."</td>";
                echo "<td> <a href='crudcliente.php?acao=deletar&cod=$cod'><img src='delete.png' alt='Deletar' title='Deletar Registro'></a>
                <a href='crudcliente.php?acao=montar&cod=$cod'><img src='update.png' alt='Atualizar' title='Atualizar Registro'></a>
                <a href='index.php'><img src='insert.png' alt='Inserir' title='Inserir Registro'></a> </td>";
                echo "</tr> </center>";
                
            }
            mysqli_close($conn);
            break;
        default:
            header("Location:crudcliente.php?acao=select");
            break;
    }
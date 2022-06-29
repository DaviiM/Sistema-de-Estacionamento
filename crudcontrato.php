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
            $num = $_POST['numVagas'];
            $tipo = $_POST['tipoPag'];
            $dataInicio = $_POST['dataInicio'];
            $dataFinal = $_POST['dataFinal'];
            $codCliente = $_POST['codCliente'];
            $convenio = $_POST['nomeConvenio'];
            $evento = $_POST['nomeEvento'];
        
            $sql = "INSERT INTO tbcontrato (numVagas, tipoPagamento, dataInicio, dataFinal, codCliente, nomeConvenio, eventoContrato)
            VALUES ('$num', '$tipo', '$dataInicio', '$dataFinal', '$codCliente', '$convenio', '$evento')";
            
            if (!mysqli_query($conn, $sql)) {
                die ("Erro ao inserir: " . $sql . ", erro:" . mysqli_error($conn));
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert ('Dados cadastrados com sucesso!')
                window.location.href='crudcontrato.php?acao=select'</script>";
            }
            break;
        case 'montar':
            include("menu.php");
            $cod = $_GET['cod'];
            $sql = 'SELECT * FROM tbcontrato WHERE codcontrato = '.$cod;
            $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar os dados");
            
            echo '<form method="post" name="dadoscliente" action="crudcontrato.php?acao=atualizar">';
            while($registro = mysqli_fetch_array($resultado)){
                echo '<div class="form-group">
                <label for="exampleFormControlInput1">Código</label>
            <input name="cod" id="cod" type="number" class="form-control" id="exampleFormControlInput1" value= '.$cod.'
            readonly required>
            <label for="exampleFormControlInput1">Número de vagas</label>
            <input name="numVagas" id="numVagas" type="number" class="form-control" id="exampleFormControlInput1" value='.$registro['numVagas'].' required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo do Pagamento</label>
            <select class="form-control" id="exampleFormControlSelect1" name="tipoPag" id="tipoPag" value='.$registro['tipoPagamento'].' required>
              <option>Vista</option>
              <option>Parcelado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Data de Início</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="dataInicio" id="dataInicio" value='.$registro['dataInicio'].' required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Data Final</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="dataFinal" id="dataFinal" value='.$registro['dataFinal'].' required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Código do Cliente</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" value='.$registro['codCliente'].' name="codCliente" id="codCliente" placeholder="Vá até a página para visualizar os clientes e pegue o código">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Convênio</label>
            <input type="datetime" class="form-control" id="exampleFormControlInput1" name="nomeConvenio" id="nomeConvenio" placeholder="Caso tenha um convênio, coloque o nome aqui" value='.$registro['nomeConvenio'].'>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Caso seja para um evento </label>
            <input type="datetime" class="form-control" id="exampleFormControlInput1" name="nomeEvento" id="nomeEvento" placeholder="Vá até a página para visualizar os clientes e pegue o código" value='.$registro['eventoContrato'].'>
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </center>';
            }
            echo "</table>";
            echo "</form>";
            
            break;
        case 'atualizar':
            $num = $_POST['numVagas'];
            $tipo = $_POST['tipoPag'];
            $dataInicio = $_POST['dataInicio'];
            $dataFinal = $_POST['dataFinal'];
            $codCliente = $_POST['codCliente'];
            $convenio = $_POST['nomeConvenio'];
            $evento = $_POST['nomeEvento'];
            
            $sql ="UPDATE tbContrato SET numVagas = '$num', tipoPagamento = '$tipo', dataInicio = '$dataInicio', dataFinal = '$dataFinal', nomeConvenio = '$convenio', eventoContrato = '$evento' WHERE codCliente = '$cod' ";
            $resultado = mysqli_query($conn, $sql) or die("Erro ao atualizar os dados");

            if(!(mysqli_query($conn,$sql))){
                die("</br>Erro ao atualizar: ". mysqli_error($conn));
            }else{
                echo "<script language='javascript' type='text/javascript'>
                alert ('Dados atualizados com sucesso!')
                window.location.href='crudcontrato.php?acao=selecionar'</script>";
            }
            
            
            break;
        case 'deletar':
            $sql = "DELETE FROM tbCONTRATO WHERE codContrato = $cod";
            
            if (!mysqli_query($conn, $sql)) {
                die ("Erro ao inserir: " . $sql . ", erro:" . mysqli_error($conn));
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert ('Dados excluídos com sucesso!')
                window.location.href='crudcontrato.php?acao=select'</script>";
            }
            
            mysqli_close($conn);
            header("Location:crudcontrato.php?acao=selecionar");
            break;
        case 'select':
            include("menu.php");
            date_default_timezone_set('America/Sao_Paulo');
            header("Content-type: text/html; charset=utf-8");
            echo "<center> <table border=1>";
            echo "<tr>";
            echo "<th>CÓDIGO</th>";
            echo "<th>NÚMERO DE VAGAS</th>";
            echo "<th>TIPO DE PAGAMENTO</th>";
            echo "<th>DATA DE INÍCIO</th>";
            echo "<th>DATA FINAL</th>";
            echo "<th>CÓDIGO DO CLIENTE</th>";
            echo "<th>NOME DO CONVÊNIO</th>";
            echo "<th>NOME DO EVENTO</th>";
            echo "</tr> </center>";
            
            $sql = "SELECT * FROM tbcontrato";
            $resultado = mysqli_query($conn, $sql) or die ("Erro ao retornar dados!");
            
            echo "<center><h2> Registros cadastrados na base de dados </h2> <br> </center>";
            
            while($registro=mysqli_fetch_array($resultado)){
                $cod = $registro['codContrato'];
                $num = $registro['numVagas'];
                $tipo = $registro['tipoPagamento'];
                $dataInicio = $registro['dataInicio'];
                $dataFinal = $registro['dataFinal'];
                $codCli = $registro['codCliente'];
                $convenio = $registro['nomeConvenio'];
                $evento = $registro['eventoContrato'];
                
                echo "<tr>";
                echo "<td>".$cod."</td>";
                echo "<td>".$num."</td>";
                echo "<td>".$tipo."</td>";
                echo "<td>".$dataInicio."</td>";
                echo "<td>".$dataFinal."</td>";
                echo "<td>".$codCli."</td>";
                echo "<td>".$convenio."</td>";
                echo "<td>".$evento."</td>";
                echo "<td> <a href='crudcontrato.php?acao=deletar&cod=$cod'><img src='delete.png' alt='Deletar' title='Deletar Registro'></a>
                <a href='crudcontrato.php?acao=montar&cod=$cod'><img src='update.png' alt='Atualizar' title='Atualizar Registro'></a>
                <a href='cadcontrato.php'><img src='insert.png' alt='Inserir' title='Inserir Registro'></a> </td>";
                echo "</tr> </center>";
                
            }
            mysqli_close($conn);
            break;
        default:
            header("Location:crudcontrato.php?acao=select");
            break;
    }
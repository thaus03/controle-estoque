<?php include("cabecalho.php")?>
    <h1> Usuários </h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
        <tr>
            <td></td>
            <td><input type="checkbox" name="ativo" value="true"> Ativo </td>
        </tr>
        <tr>
            <td>Nome:</td>
            <td><input class="form-control" type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Nome de Usuário:</td>
            <td><input class="form-control" type="text" name="user"></td>
        </tr>
        <tr>
            <td>Senha:</td>
            <td><input class="form-control" type="password" name="pass"></td>
        </tr>
        <tr>
            <td>
                <!-- <button class="btn btn-primary" type="submit">Cadastrar</button> -->
            </td>
            <td><input type="submit" class="btn btn-primary" value="Cadastrar"></td>
        </tr>
        </table>
    </form>
<?php include("rodape.php")?>
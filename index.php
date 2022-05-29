<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="css/estilo.css">
    <?php require "conexao.php" ?>
</head>


<body>
    <div id= "logo"><img src="img/logo.png.png" /></div>

    <div id="caixa_login"> 

    <?php 
           if(isset($_POST['button'])){
                $code = $_POST['code'];
                 $password = $_POST['password'];



                 if ($code == ''){
                    echo "<h4>Por favor, insira o Numero do cartao ou o Codigo de acesso</h4>"; }

                    else if  ($password == ''){
                        echo "<h4>Por vafor digite a sua Senha</h4>";}
                    

                    else{
                        $sql=  "SELECT * FROM log WHERE code='$code' AND senha='$password'";



                       $result= mysqli_query($conexao,$sql);
                       if (mysqli_num_rows($result) > 0 ){ 
                       while ($res_1= mysqli_fetch_assoc ($result)) {

                        $status = $res_1 ['status'];
                        $code= $res_1 ['code'];
                        $senha = $res_1 ['senha'];
                        $nome = $res_1 ['nome'];
                        $painel = $res_1 [ 'painel'];


                        if ($status == 'inativo'){ 
                    echo "<h4> voce esta  Inativo, contacte a administracao </h4>";   
                        }

                        else{
                            session_start(); 
                            $_SESSION['code']= $code;
                            $_SESSION['nome']= $nome;
                            $_SESSION['senha']= $senha;
                            $_SESSION['painel']= $painel;


                            if ($painel == 'admin'){

                                echo "<script language= 'javascript'> window.location= 'admin';</script>"; }


                            else if  ($painel == 'aluno' ){
                                echo "<script language= 'javascript'> window.location= 'aluno';</script>";
                            }


                            else if  ($painel == 'professor' ){
                                echo "<script language= 'javascript'> window.location= 'professor';</script>";
                            }


                            else if  ($painel == 'publico' ){
                                echo "<script language= 'javascript'> window.location= 'portaria';</script>";
                            }



                            else if  ($painel == 'tesouraria' ){
                                echo "<script language= 'javascript'> window.location= 'tesouraria';</script>";
                            }





 



 
                        }
}
                       
                    } else{
                        
                        echo "<h4> Dados incorretos! </h4>";
                            }
                        }
}
            
        ?>  


        <form  name = "form" method="post" action="" enctype="multpart/from-data">
            <table>
                <tr>
                    <td><h2 >Codigo: </h2></td>
                </tr>
                
                <tr>
                  <td><input type="" name="code"></td>    
                </tr>

                <tr>
                    <td><h2>Senha: </h2></td>
                </tr>
              

                <tr>
                    <td><input type="password" name="password"></td>
                </tr>

                <tr>
                    <td><input class="input" type="submit" name="button" value="Entar"></td>
                </tr>
                    </div>
            </table>
        </form>
    </div>




</body>
</html>


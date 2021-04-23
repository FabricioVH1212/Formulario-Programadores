<!DOCTYPE html>
<html>
    <head>
        <title>Administrador</title>
        <link rel="icon" href="../Resources/img/logo-uca.png">
        <link rel="apple-touch-icon" href="../Resources/img/logo-uca.png"> 
        <link rel="stylesheet" href="../Resources/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
            .centrado{
                text-align:center;
                margin-top: 25px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-md-6"><img src="../Resources/img/logo-uca.png"width="100px"height="100px"></div>
            <div class="centrado">
                <h1>Oferentes de programadores</h1>
            </div>  
            <div class = "float-right">
                 <a href="insertar.php" class="btn btn-primary">Ingresar programador</a>
            </div>
            <div class = "tabla table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                       <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Identificaci&oacute;n</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include("../Controllers/CRUD.php");
                        $adm = new programadores();
                        $null = true; 
                        if(isset($_GET["delete"])){
                            $borrarProgramador = new programadores();
                            $borrarProgramador->set_num_ide($_GET["identificacion"]);
                            if(!is_numeric($borrarProgramador->get_num_ide())){
                                echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identifaci&oacute;n no debe contener letras o caracteres especiales</div>');
                            }

                            if(empty($borrarProgramador->get_num_ide())){
                                echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser vac&iacute;o</div>');
                            }

                            if(strlen($borrarProgramador->get_num_ide()) < 9){
                                echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser menor de 9 d&iacute;gitos</div>');
                            }

                            if($borrarProgramador->eliminarOferente()){
                                echo ('<div class="alert alert-success" role="alert">Oferente eliminado satisfactoriamente</div>');
                                echo "<script>setTimeout(\"location.href='index.php'\",3000)</script>";
                            }else{
                                echo ('<div class="alert alert-danger" role="alert">Hubo un problema al eliminar el oferente</div>');
                            }
                        }

                        $resultado = $adm->consultarOferentes();
                        while ($fila = $resultado->fetch_assoc()) {
                            $null = false; 
                        ?>
                            <tr>
                                <td><?=$fila["NUM_IDENTIFICACION"]?></td>
                                <td><?=$fila["DSC_NOMBRE"]." ".$fila["DSC_APELLIDOS"]?></td>
                                <td>
                                    <a href="editar.php?identificacion=<?=$fila["NUM_IDENTIFICACION"]?>" class="btn btn-warning">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="?delete=true&identificacion=<?=$fila["NUM_IDENTIFICACION"]?>&ruta=<?=$fila["DSC_ARCHIVO"]?>" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>                 
                        <?php
                        }
                        if($null){
                        ?>        
                         <tr>
                             <td class = "text-center h4"colspan="6">No hay datos que mostrar</td>
                         </tr>
                        <?php }?>                                
                        </tbody>
                    </table>      
            </div>
        </div>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
          <script src="https://use.fontawesome.com/1cf4292344.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulario</title>
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
                <h1>Editar</h1>
            </div>
              <!-- begin panel-body -->
            <div class="tabla panel-body bg-dark">
                <a  href = "index.php" class = "btn btn-warning "><i class="fa fa-arrow-circle-left col-lg " aria-hidden="true"></i></a>
                  <?php
            include("../Models/CRUD.php");
            $editarProgramador = new programadores();
            $editarProgramador->set_num_ide($_GET["identificacion"]);

            if(!is_numeric($editarProgramador->get_num_ide())){
                echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identifaci&oacute;n no debe contener letras o caracteres especiales</div>');
                exit();
            }

            if(empty($editarProgramador->get_num_ide())){
                echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser vac&iacute;o</div>');
                exit();
            }

            if(strlen($editarProgramador->get_num_ide()) < 9){
                echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser menor de 9 d&iacute;gitos</div>');
                exit();
            }
            $editarProgramador->consultarProgramador();
            ?>
            <form method="POST" action="#" enctype="multipart/form-data">
                <div class="row text-white">
                    <div class="col-md-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">N&uacute;mero de identificaci&oacute;n:</label>
                            <div class="col-md-9">
                                <input type="number" value="<?=$editarProgramador->get_num_ide()?>" name="num_ide" class="form-control m-b-5" placeholder="N&uacute;mero de identificaci&oacute;n" readonly/>
                            </div>
                        </div>                
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Apellidos:</label>
                            <div class="col-md-9">
                                <input type="text" value="<?=$editarProgramador->get_apellidos()?>" name="txt_apellidos" class="form-control m-b-5" placeholder="Apellidos de la persona" />
                            </div>
                        </div> 
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Correo electr&oacute;nico:</label>
                            <div class="col-md-9">
                                <input type="email" value="<?=$editarProgramador->get_correo()?>" name="txt_email" class="form-control m-b-5" placeholder="Correo electr&oacute;nico" />
                            </div>
                        </div>  
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Provincia:</label>
                            <div class="col-md-9">
                                <select name="sel_provincia" class="form-control">
                                    <option value="" selected>Selecciones</option>
                                    <option value="1" <?=($editarProgramador->get_provincia() == 1) ? "selected='selected'" : "" ?>>San Jos&eacute;</option>
                                    <option value="2" <?=($editarProgramador->get_provincia() == 2) ? "selected='selected'" : "" ?>>Alajuela</option>
                                    <option value="3" <?=($editarProgramador->get_provincia() == 3) ? "selected='selected'" : "" ?>>Cartago</option>
                                    <option value="4" <?=($editarProgramador->get_provincia() == 4) ? "selected='selected'" : "" ?>>Heredia</option> 
                                    <option value="5" <?=($editarProgramador->get_provincia() == 5) ? "selected='selected'" : "" ?>>Guanacaste</option>                               
                                    <option value="6" <?=($editarProgramador->get_provincia() == 6) ? "selected='selected'" : "" ?>>Puntarenas</option>                                                    
                                    <option value="7" <?=($editarProgramador->get_provincia() == 7) ? "selected='selected'" : "" ?>>Lim&oacute;n</option>                            
                                </select>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Nombre:</label>
                            <div class="col-md-9">
                                <input type="text" value="<?=$editarProgramador->get_nombre()?>" name="txt_nombre" class="form-control m-b-5" placeholder="Nombre de la persona" />
                            </div>
                        </div>                    
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">N&uacute;mero telef&oacute;nico:</label>
                            <div class="col-md-9">
                                <input type="number" value="<?=$editarProgramador->get_telefono()?>" name="number_telefono" class="form-control m-b-5" placeholder="N&uacute;mero telef&oacute;nico" />
                            </div>
                        </div>  
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Genero:</label>
                            <div class="col-md-9">
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio" id="rd_genero1" name="rd_genero" class="custom-control-input" value="m" checked>
                                    <label class="custom-control-label" for="rd_genero1">Mujer</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="rd_genero2" name="rd_genero" class="custom-control-input" value="h" <?=($editarProgramador->get_genero() == "h") ? "checked='checked'" : "" ?>>
                                    <label class="custom-control-label" for="rd_genero2">Hombre</label>
                                </div>
                            </div>
                        </div>                   
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Direcci&oacute;n:</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="txt_direccion"><?=$editarProgramador->get_direccion()?></textarea>
                            </div>
                        </div>                      
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-12">Adjuntar archivo</label>
                            <div class="col-md-12">
                                <input type="file" id="file" name="file" class="form-control bg-dark text-white m-b-5">
                            </div> 
                        </div>                   
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-12">Lenguajes de programaci&oacute;n:</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Java", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Java" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Java</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("C++", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="C++" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">C++</label>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("C#", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="C#" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">C#</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="chk_lenguaje[]" <?=(in_array("Python", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Python" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Python</label>
                                    </div>
                                </div>                                 
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("PHP", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="PHP" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">PHP</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Visual Basic .net", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Visual Basic .net" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Visual Basic .net</label>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Perl", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Perl" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Perl</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="chk_lenguaje[]" <?=(in_array("Ruby", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Ruby" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Ruby</label>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Pascal", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Pascal" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Pascal</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Swift", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Swift" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Swift</label>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Kotlin", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Kotlin" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Kotlin</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_lenguaje[]" <?=(in_array("Scala", $editarProgramador->get_lenguajes())) ? "checked='checked'" : ""?> value="Scala" id="defaultCheckbox" />
                                        <label class="form-check-label" for="defaultCheckbox">Scala</label>
                                    </div>
                                </div>                                                                                                
                            </div>
                        </div> 
                    </div> 
                    <div class="col-md-12">
                        <div class="float-right">
                            <a href="index.php" class="btn btn-xl btn-danger m-r-5">Cancelar</a>
                            <input type="submit" class="btn btn-xl btn-primary m-r-5" name="btn_update" value="Procesar">
                        </div>
                    </div>
                </div>
                <?php
                if(isset($_POST["btn_update"])){
                ?>
                <div class="row">
                    <div class="col-md-12"><hr> 
                <?php
                    //validaciones del numero de identificacion
                     $programadores = new programadores();

                    $programadores->set_num_ide($_POST["num_ide"]);
                    if(empty($programadores->get_num_ide())){
                        echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser vac&iacute;o</div>');
                        exit();
                    }

                    if(!is_numeric($programadores->get_num_ide())){
                        echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser letras o caracteres especiales</div>');
                        exit();
                    } 
                    
                    if(strlen($programadores->get_num_ide()) < 9){
                        echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de identificaci&oacute;n no debe ser menos de 9 digitos</div>');
                        exit();                        
                    }

                    //validaciones del nombre
                    $programadores->set_nombre($_POST["txt_nombre"]);
                    if(empty($programadores->get_nombre())){
                        echo ('<div class="alert alert-danger" role="alert">El nombre no debe ser vac&iacute;o</div>');
                        exit();
                    }     
                    
                    if(strlen($programadores->get_nombre()) < 3){
                        echo ('<div class="alert alert-danger" role="alert">El nombre no debe ser menos de 3 digitos</div>');
                        exit();                        
                    }   
                    
                    //validaciones de los apellidos
                    $programadores->set_apellidos($_POST["txt_apellidos"]);
                    if(empty($programadores->get_apellidos())){
                        echo ('<div class="alert alert-danger" role="alert">Los apellidos no deben ser vac&iacute;os</div>');
                        exit();
                    }     
                    
                    if(strlen($programadores->get_apellidos()) < 5){
                        echo ('<div class="alert alert-danger" role="alert">El nombre no debe ser menos de 6 digitos</div>');
                        exit();                        
                    }   
                    
                    //validaciones del numero telefonico
                    $programadores->set_telefono($_POST["number_telefono"]);
                    if(empty($programadores->get_telefono())){
                        echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de telef&oacute;nico no debe ser vac&iacute;o</div>');
                        exit();
                    }

                    if(!is_numeric($programadores->get_telefono())){
                        echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de telef&oacute;nico no debe ser letras o caracteres especiales</div>');
                        exit();
                    } 
                    
                    if(strlen($programadores->get_telefono()) < 8){
                        echo ('<div class="alert alert-danger" role="alert">El n&uacute;mero de telef&oacute;nico no debe ser menos de 8 digitos</div>');
                        exit();                        
                    }

                    //validaciones del correo electronico
                    $programadores->set_correo($_POST["txt_email"]);
                    if(empty($programadores->get_correo())){
                        echo ('<div class="alert alert-danger" role="alert">El correo electr&oacute;nico no debe ser vac&iacute;o</div>');
                        exit();
                    }                    
                    
                    if(false === filter_var($programadores->get_correo(), FILTER_VALIDATE_EMAIL)){
                        echo ('<div class="alert alert-danger" role="alert">Formato de correo electr&oacute;nico incorrecto</div>');
                        exit();
                    };

                    //validaciones de la provincia de residencia
                    $programadores->set_provincia($_POST["sel_provincia"]);
                    if(!is_numeric($programadores->get_provincia())){
                        echo ('<div class="alert alert-danger" role="alert">Debe seleccionar una provincia de residencia</div>');
                        exit();                        
                    }

                    //validaciones de la direccion
                    $programadores->set_direccion($_POST["txt_direccion"]);
                    if(empty($programadores->get_direccion())){
                        echo ('<div class="alert alert-danger" role="alert">La direcci&oacute;n no debe ser vac&iacute;a</div>');
                        exit();
                    }         
                    
                    if(strlen($programadores->get_direccion()) < 10){
                        echo ('<div class="alert alert-danger" role="alert">La direcci&oacute;n no debe ser menor a 10 caracteres</div>');
                        exit();
                    }   
                    
                    $programadores->set_genero($_POST["rd_genero"]);
                    $rd_genero = ($_POST["rd_genero"] == "h") ? "Hombre" : "Mujer" ;

                    if(!empty($_FILES['file']['name'])){
                        $nombre_archivo = $_FILES['file']['name'];
                        $ext =  explode(".", $nombre_archivo);
                        $file_name = $programadores->get_num_ide().'_'.$ext[0].'.'.$ext[1];

                        define("DIRECTORIO", "../Resources/archivos/");
                        define("ARCHIVO_RECLUTAMIENTO", "../Resources/archivos/reclutamiento.txt");  
                        
                        if(!file_exists(DIRECTORIO)){
                            mkdir(DIRECTORIO, 0777);
                        }  
                        
                        if(!move_uploaded_file($_FILES['file']['tmp_name'], DIRECTORIO.$file_name)){
                            echo ('<div class="alert alert-danger" role="alert">El archivo no se pudo subir correctamente</div>');
                            exit();
                        }
                        $programadores->set_archivo(DIRECTORIO.$file_name);
                    }
                    
                    
                    if(isset($_POST["chk_lenguaje"])){
                        $programadores->set_lenguajes($_POST["chk_lenguaje"]);
                    }
                    if($programadores->actualizarProgramador()){
                        echo '<script>alert("Actualizado correctamente")</script>';
                        echo ('<div class="alert alert-success" role="alert">Registro actualizado satisfactoriamente</div>');
                        echo "<script>setTimeout(\"location.href='index.php'\", 3000)</script>"; 
                    }else{
                        echo ('<div class="alert alert-danger" role="alert">Hubo un error en la actualizaci&oacute;n de los datos</div>');
                        exit();                        
                    }                       
                ?>
                <table class="table table-success table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" colspan="3"><?=$programadores->get_nombre()." ".$programadores->get_apellidos()." - ".$programadores->get_num_ide()?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <em>Tel&eacute;fono</em><br><?=$programadores->get_telefono()?>
                        </td>
                        <td>
                            <em>Correo electr&oacute;nico</em><br><?=$programadores->get_correo()?>
                        </td>  
                        <td>
                            <em>Genero</em><br><?=$rd_genero?>
                        </td>                                                
                    </tr>
                    <tr>
                        <td>
                            <em>Provincia</em><br>
                            <?php
                            switch($programadores->get_provincia()){
                                case 1:
                                    echo "San Jos&eacute;";
                                break;
                                case 2:
                                    echo "Alajuela";
                                break;
                                case 3:
                                    echo "Cartago";
                                break;
                                case 4:
                                    echo "Heredia";
                                break;  
                                case 5:
                                    echo "Guanacaste";
                                break;
                                case 6:
                                    echo "Puntarenas";
                                break;
                                case 7:
                                    echo "Lim&oacute;n";
                                break;                                                                                           
                            }
                            ?>
                        </td>
                        <td>
                            <em>Direcci&oacute;n</em><br><?=$programadores->get_direccion()?>
                        </td>  
                        <td>
                            <a href="<?=DIRECTORIO.$file_name?>"target="_blank">Adjunto</a>
                        </td>                                                                        
                    </tr>   
                    <tr>
                        <td colspan="3">
                            <em>Lenguajes de programaci&oacute;n</em><br>
                            <ul class="list-group">
                            <?php
                            $x = 1;
                            if(isset($_POST["chk_lenguaje"])){
                                foreach ($_POST["chk_lenguaje"] as $key => $value) {
                                    ?>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="badge badge-primary badge-pill"><?=$x?></span>
                                            &nbsp;<?=$value?>
                                        </li>
                                    <?php 
                                    $x++;                           
                                    }
                            }else{
                                ?>
                                <li class="list-group-item d-flex align-items-center">
                                    <span class="badge badge-primary badge-pill"><?= "0"?></span>
                                    &nbsp;<?= "No indica lenguajes de programaci&oacute;n"?>
                                </li>
                            <?php                                  
                            }
                            ?>
                            </ul>
                        </td>
                    </tr>                 
                    </tbody>
                </table>                
                    </div>
                </div>
                <?php
                }
                ?>                                                         
            </form>      
            </div>
        </div>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/1cf4292344.js"></script>
    </body>
</html>
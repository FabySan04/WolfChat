<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="icon" href="../resources/images/lobo_sin_fondo.png" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Inicio <?php echo e(Auth::user()->name); ?> </title>    
</head>

<style>
    #post{
        width: 50%; border-color: #808080;
        position: relative;
        margin: auto;
        text-align: left;
        width: 540px;
        display:block;
        float:center;
        border-radius: 5%;
        background-color:white;
        padding-left: 20px;
    }
    #perfil{
        width: 50px;
display:block;
float: left;
margin-top:5px;
border-radius:150px;

    }
    #suspencion{
display:block;
float: right;
margin-right:20px;
margin-top:20px;
    }
    #l2 li{
  display: inline;
  margin-right:10px;
    margin-top:10px; 
    width: 35px;
    
}
#l2{
  margin-left:-40px;
  margin-top:5px;
}
#registrar{    
        width: 60%;
        background-color: #42b72a;
        border: 1px solid #42b72a;
        color: #f9f9f9;
        border-radius: 30px;
    }
    #registrar:hover{
    width: 60%;
    background-color: #3CA227;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 30px;
    }
    #perfil{
    width:50px;
    display: block;
    float: left;
    margin-top: 5px;
    border-radius:150px;
}
    #delete{
        margin: auto;
        text-align: right;
        width: 40px;
        display: block;
        float: right;
        border-color: transparent;
        background-color: transparent;
        padding-right: 20px;        
    }
    @media (max-width: 500px){
       #post{
        position: relative;
        margin: auto;
        width: 95%;
        display:block;
        float:center;
        border-radius: 5%;
        background-color:white;
       }
       img.foto{
            width: 104.5%; 
            margin-left:-20px;
        }
    }
</style>

<body>
<?php echo $__env->make('layouts.header',[], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <!-- Button trigger modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="text-align: center;" id="exampleModalLabel">Crear una publicación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(url('/post')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <br><?php $__currentLoopData = $publicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="post" class="card">
            <span style="font-size: 16px;">  
                <?php
                    $db= mysqli_connect('localhost','root','','social_network');
                    $sql = "select * from posts WHERE id = '$publicacion->id' AND id_user = ".Auth::user()->id."";
                    $pub_Dele=mysqli_query($db,$sql); 
                    $pd = mysqli_fetch_array($pub_Dele);
                    $pub_user = $pd['id_user']; 
                    if($pd= True and $pub_user== Auth::user()->id) {                 
                        $pub_Del = $pd['id']; 
                ?>                           
                    <form action="<?php echo e(url('/post/'.$publicacion->id )); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('DELETE')); ?>

                        <input type="submit" onclick="return confirm('¿Quires borrar?')" id="delete" value= ❌>
                    </form>    
                <?php
                    }else{
                ?>
                        <input type="hidden" onclick="return confirm('¿Quires borrar?')" id="delete" value= ❌ disabled>
                <?php
                        }
        
                ?>      
                </span> 
                <img src="<?php echo e(asset('storage').'/'.$publicacion->foto_user); ?>" id="perfil">
                    <H7 style="margin-top:10px; margin-left:40px; color: #191919" id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e($publicacion->name); ?>

                    </H7><br>
                    <img src="<?php echo e(asset('storage').'/'.$publicacion->imagen); ?>" class="foto" width="500px" height="auto" alt="...">
                    <div class="card-body">
                    <!-- LIKES -->    
                    <?php
                        $db= mysqli_connect('localhost','root','','social_network');
                        $sql = "SELECT * from posts";
                        $lista=mysqli_query($db,$sql); 
                        $row_like = mysqli_fetch_array($lista);

                        $quer = "SELECT * from posts WHERE id = '$publicacion->id' AND id_user = ".Auth::user()->id."";
                        $que=mysqli_query($db,$sql); 
                    
                        $query = mysqli_fetch_array($que);
                    ?>
                              
            </div>    
                <a data-toggle="tooltip" style="margin-top: 0px"> <h style="font-size: 16px;" class="card-text" ><?php echo e($publicacion->contenido); ?></h>  
                    <?php
                        $db= mysqli_connect('localhost','root','','social_network');
                        $sql = "select * from posts WHERE id = '$publicacion->id'";
                        $pub_Dele=mysqli_query($db,$sql); 
                        $row_like = mysqli_fetch_array($pub_Dele);
                        $like_user = $row_like['id_user']; 
                        if($pd= True and $pub_user== Auth::user()->id){   
                        ?>
                        | <a href="<?php echo e(url('/post/'.$publicacion->id.'/edit')); ?>" class="btn" style="margin-left: -10px;  font-style: italic;"> Editar post</a>
                        <?php
                            }
            
                    ?>    
                </a><br>
            <!--  COMENTARIOS INDEX -->
            <?php
                $db= mysqli_connect('localhost','root','','social_network');
                $sql = "select * from comentarios WHERE id_post = '$publicacion->id'";
                $comentarios_pub=mysqli_query($db,$sql); 
                                
                while ($row = mysqli_fetch_array($comentarios_pub)) 
                {  
                    $id_comen = $row['id'];  
                    $com_user = $row['id_user']; 
            ?>
               
                <h style="font-size: 15px;" tooltip=""><?php echo $row['name'];?></h> | <h style="font-size: 16px;" tooltip=""><?php echo $row['fecha'];?></h>  <br>
                <h style="font-size: 14px;" tooltip=""><?php echo $row['comentario'];?></h> 
            <?php
                if($row= True and $com_user == Auth::user()->id){ 
            ?>
                    <a href="<?php echo e(url('/comentarios/'.$id_comen.'/edit')); ?>" class="btn">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" class="svg-inline--fa fa-pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M497.9 74.16L437.8 14.06c-18.75-18.75-49.19-18.75-67.93 0l-56.53 56.55l127.1 128l56.56-56.55C516.7 123.3 516.7 92.91 497.9 74.16zM290.8 93.23l-259.7 259.7c-2.234 2.234-3.755 5.078-4.376 8.176l-26.34 131.7C-1.921 504 7.95 513.9 19.15 511.7l131.7-26.34c3.098-.6191 5.941-2.141 8.175-4.373l259.7-259.7L290.8 93.23z"></path></svg></a>   
               
            <?php
                }else{
            ?>
                    <input type="hidden" id="null" value="" disabled>
            <?php
                }
            ?><br>
            <?php
                }
            ?>
                <?php echo $__env->make('comentarios.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div><br><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\WolfChat\resources\views/home.blade.php ENDPATH**/ ?>
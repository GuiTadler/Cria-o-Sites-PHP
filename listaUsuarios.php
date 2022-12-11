<div style="padding:20px; width: 100%; display: inline-block;"> 
    <?php
        require_once "dataBase.php";
        //$sql="SELECT distinct * FROM usuario";
        $sql="SELECT distinct * FROM usuario" or die($con->error);
        $resultado=$con->query($sql);
        
        while($usuario=$resultado->fetch_array()){
            echo '<div class="card" style="width:35vw;">
            <img class="card-img-top" src="'.$usuario['foto'].'" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"> Nome: '.$usuario['nome'].'</h5>
                <p class="card-text" style="font-size: 0.95rem;">E-mail: '.$usuario['email'].'</p>
            </div>
            </div>';
        }
        
    ?>   
    </div>
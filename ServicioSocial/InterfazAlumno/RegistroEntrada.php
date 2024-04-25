<?php
if(!empty($_POST["Entrada"])){
    if(!empty($_POST["Contraseña"])){
        $Contraseña = $_POST["Contraseña"];
        $Consulta = $Conexion->query("Select count(*) as 'total' from alumnos where Numero_Control = '$Contraseña'");
        if($Consulta->fetch_objet()->total>0){  

        }else { 
            ?>
            <script>
                $(function notification(){
                    new = PNotify({
                        title: "CORRECTO", type: "Error", text: "Ingrese Su Numero De Control", styling: "bootstrap3"
                    })
                })
            <?php   
        }
    }else { 
        ?>
        <script>
            $(function notification(){
                new = PNotify({
                    title: "INCORRECTO", type: "Error", text: "Ingrese Su Numero De Control", styling: "bootstrap3"
                })
            })
        <?php   
    }
}
?>
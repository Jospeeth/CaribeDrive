<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type ="text/css">
    <link rel="stylesheet" href="style.css">
    <title>CaribeDrive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>

<body>
<div class="container">
        <header>
        <img class="imgcar" src="Rayo.png" alt="">
        <h1>Reservas Caribe Drive</h1>
        </header>
        <div class="row">
        <form id="myForm" method="post" class="col-7" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="inputs">
            <div >
                <label for="Cédula" class="form-label">Cedula</label>
                <input type="number" class="form-control" id="cedula">
            </div>
            <div >
                <label for="Ciudad" class="form-label">Cuidad</label>
                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                    <option selected>Ciudad</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Santa Marta">Santa Marta</option>
                    <option value="Cartagena">Cartagena</option>
                   

                </select>
            </div>
          </div>
          <div class="rest">
          <div class="mb-3">
                <label for="TipoAuto"  class="form-label " >Tipo Auto</label>
                <select name="tipo" id="hoverSelect"  onchange="changeImage()" class="form-select ">
                    <option value="tipodeauto" selected>Tipo de auto</option>
                    <option value="Economico">Economico</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                    <option value="Camioneta">Camioneta</option>

                </select>
            </div>
        <div class="mb-3    ">
                <label for="Fechallegada" class="form-label">Fecha de llegada</label>
                <input type="date" class="form-control" id="Fechallegada">
            </div>
        </div>
        <div class="mb-3">
                <label for="Horallegada" class="form-label">Hora de llegada</label>
                <input type="time" class="form-control" id="Horallegada">
            </div>
            <div class="mb-3">
                <label for="dias" class="form-label">Numero de dias</label>
                <input type="number" class="form-control" name="dias">
            </div>

            <div class="check">
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="cobertura">
                    <label class="form-check-label" for="cobertura">
                     Incluye cobertura por daño
                    </label>
                  </div>
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="soyCosteño">
                    <label class="form-check-label" for="soyCosteño">
                     Soy costeño
                    </label>
                  </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>

            
        </form>
        <div id="imageContainer" class= col-5>
            <img id="Image" src="carros/Caribedrive.png" alt="Imagen">
            <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $tipo= $_POST['tipo']; 
            $dias= $_POST['dias'];
            $total= 0;
            $cobertura= 0;
            $descuento= 0;
            $subtotal= 0;
           
            
            if ($tipo=="Economico"){ 
                if(empty($dias)){
                    echo "<p style='color: white;'> Dedes alquilar almenos un dia</p>";
    
                }
                else{
                    $total = 150000 * $dias;
                    echo "<p style='color: white; font-weight: 500;'> El Costo de su alquiler : " . $total . "</p>";
                }
             

            }
            
            if ( $tipo =="Mediano"){
                if(empty($dias)){
                    echo "<p style='color: white;'> Dedes alquilar almenos un dia</p>";
    
                }
                else{
                    $total =200000 * $dias;
                    echo "<p style='color: white; font-weight: 500;'> El Costo de su alquiler : " . $total . "</p>";
                }
               
            
            }
            
            if ( $tipo=="Grande"){ 
                if(empty($dias)){
                    echo "<p style='color: white;'> Dedes alquilar almenos un dia</p>";
    
                }
                else{
                    $total = 408080* $dias;
                    echo "<p style='color: white; font-weight: 500;'> El Costo de su alquiler : " . $total . "</p>";
                }
               
            
            } 
            if ($tipo== "Camioneta"){
                if(empty($dias)){
                    echo "<p style='color: white;'> Dedes alquilar almenos un dia</p>";
    
                }
                else{
                    $total = 350000 * $dias;   
                    echo "<p style='color: white; font-weight: 500;'>El Costo de su alquiler : " . $total . "</p>";
                }
            
              
            }
            if(isset($_POST['cobertura']) && isset($_POST['soyCosteño']) ){
                $descuento= $total *0.90;
                $cobertura= $dias*20000;
                $subtotal= $descuento+$cobertura;
                echo "<p style='color: white; font-weight: 500;'>El Costo de su alquiler si cumple dos dos requisitos: " . $subtotal . "</p>";
            }
            if(isset($_POST['soyCosteño'])){
                $descuento= $total *0.90;
                 echo "<p style='color: white; font-weight: 500;'>El Costo de su alquiler con descuento es: " . $descuento . "</p>";
             }
             if(isset($_POST['cobertura'])){
                $cobertura= $dias*20000;
                $subtotal= $total+$cobertura;
                echo "<p style='color: white; font-weight: 500;'>El Costo de su alquiler con cobertura es: " . $subtotal . "</p>";
                }
    
        
        }
        
        
        ?>
        </div>
        
    </div>


</body>
<script>
function changeImage() {
  var selectElement = document.getElementById("hoverSelect");
  var imageElement = document.getElementById("Image");
  
  if (selectElement.value === "Economico") {
    imageElement.src = "carros/Pequeño.png";
  } else if (selectElement.value === "Mediano") {
    imageElement.src = "carros/Mediano.png";
  } else if (selectElement.value === "Grande") {
    imageElement.src = "carros/Grande.png";
  }
  else if (selectElement.value === "Camioneta") {
    imageElement.src = "carros/Camioneta.avif";
  }
  else if (selectElement.value === "tipodeauto") {
    imageElement.src = "carros/Caribedrive.png";
  }
  
}

</script>

</html>
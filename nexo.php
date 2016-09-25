<?php
		require_once("Clases/Persona.php");

$quehago=$_POST['queHacer'];

		switch ($quehago) {
			case 'Agregar':
				# ...
				$obj=$_POST['persona'];
				var_dump($obj);
				$pers= new persona($obj["nombre"],$obj["apellido"],$obj["dni"]);

				
				persona::Guardar($pers);
				break;
					
			case 'mostrarLista':
			
				$ArrayDePersonas = Persona::TraerTodasLasPersonas();
				//var_dump($ArrayDePersonas);

				$plantilla='<table class="table">
					<thead style="background:rgb(14, 26, 112);color:#fff;">
						<tr>
							<th>  Nombre </th>
							<th>  Apellido    </th>
							<th>  Dni      </th>
							
						</tr> 
					</thead>';   	
				foreach ($ArrayDePersonas as $Personas) {
					//var_dump($Personas);
							$pers = array();
							$pers['nombre']= $Personas->GetNombre();
							$pers['apellido']= $Personas->GetApellido();
							$pers['dni']=$Personas->GetDni();
							$pers = json_encode($pers);

								$plantilla .= "<tr>
								<td>".$Personas->GetNombre()."</td>
								<td>".$Personas->GetApellido()."</td>
								<td>".$Personas->GetDni()."</td>
								</tr>";
						}		
						$plantilla .= '</table>';		
		
		echo $plantilla;
		break;

		}


?>
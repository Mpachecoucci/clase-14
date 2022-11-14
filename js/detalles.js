		
		async function loadEstacion(){
				const response= await fetch("../../../../proyectos/app-estacion/datos.php?chipid=713630");
				const data = await response.json();
				return data;
			}
		loadEstacion().then(estaciones =>{estaciones.forEach(estacion=>{createEstacion(estacion)})})

			function createEstacion(data){
				/*const tpl=tpl_estacion.content;
				const clon=tpl.cloneNode(true);
*/
				const datos = data;
				return datos;

				/*clon.querySelector('.card_title').textContent=data.apodo;
				clon.querySelector('.card_ubicacion').textContent=data.ubicacion;
				clon.querySelector('.card_visitas').textContent=data.visitas;
				clon.querySelector(".btn_estacion").setAttribute("href", "./panel.php?chipid="+data.chipid);*/
				//listado.appendChild(clon);
			}

			 
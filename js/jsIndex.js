loadEstaciones().then(estaciones =>{estaciones.forEach(estacion=>{createEstacion(estacion)})})	

			function createEstacion(data){
				const tpl=tpl_estacion.content;
				const clon=tpl.cloneNode(true);

				console.log(clon);

				clon.querySelector('.card_title').textContent=data.apodo;
				clon.querySelector('.card_ubicacion').textContent=data.ubicacion;
				clon.querySelector('.card_visitas').textContent=data.visitas;
				clon.querySelector(".btn_estacion").setAttribute("href", "./detalle.php?chipid="+data.chipid);
				listado.appendChild(clon);
			}

			async function loadEstaciones(){
				const response= await fetch("../../../../proyectos/app-estacion/datos.php?mode=list-stations");
				const data = await response.json();
				return data;
			}
var dias = new Number();
var hora = new Number();
var minuto = new Number();
var segundo = new Number();
var time 	= new Number();

var diasParcial = new Number();
var horaParcial = new Number();
var minutoParcial = new Number();
var segundoParcial = new Number();
var timeParcial 	= new Number();

function cronometroGeral(aux){
	if(aux == 1){
		hora = parseInt(($('#horas').val() === '' ? 0 : $('#horas').val()));
		minuto = parseInt(($('#minutos').val() === '' ? 0 : $('#minutos').val()));
		segundo = parseInt(($('#segundos').val() === '' ? 0 : $('#segundos').val()));

		diasParcial = 0; 
		horaParcial = 0;
		minutoParcial = 0;
		segundoParcial = 0;
		timeParcial 	= 0;
	}

	if (aux==1 || aux==2) {
		$('#btn').addClass('hide');
		$('#tempo').removeClass('hide');
		$('#parcial').removeClass('hide');
		
		if(segundo>59){
			segundo=0;
			minuto++;
		}
		if(minuto>59){
			minuto=0;
			hora++;
		}
		if(hora>23){
			hota=0;
			dias++;
		}
		
		if(segundo < 10){
			time=":0"+segundo;
		}
		else{
			time=":"+segundo;
		}
		
		if(minuto < 10){
			time=":0"+minuto+time;
		}
		else{
			time=":"+minuto+time;
		}
		
		if(hora < 10){
			time="0"+hora+time;
		}
		else{
			time=""+hora+time;
		}



		if(segundoParcial>59){
			segundoParcial=0;
			minutoParcial++;
		}
		if(minutoParcial>59){
			minutoParcial=0;
			horaParcial++;
		}
		if(horaParcial>23){
			hotaParcial=0;
			diasParcial++;
		}

		if(segundoParcial < 10){
			timeParcial=":0"+segundoParcial;
		}
		else{
			timeParcial=":"+segundoParcial;
		}

		if(minutoParcial < 10){
			timeParcial=":0"+minutoParcial+timeParcial;
		}
		else{
			timeParcial=":"+minutoParcial+timeParcial;
		}

		if(horaParcial < 10){
			timeParcial="0"+horaParcial+timeParcial;
		}
		else{
			timeParcial=""+horaParcial+timeParcial;
		}


		tempo.innerText="Total: "+time;
		parcial.innerText="Parcial: "+timeParcial;
		setTimeout('cronometroGeral(2);',1000);
		
		
		segundo+=1;	
		segundoParcial+=1;
	}
}
window.document.onload = cronometroGeral(1);

function stop(){
	location.reload();
}
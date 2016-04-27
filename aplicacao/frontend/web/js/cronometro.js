var dias = new Number();
var hora = new Number();
var minuto = new Number();
var segundo = new Number();
var time 	= new Number();

function cronometro(){
	$('#btnStop').removeClass('hide');
	$('#btn').addClass('disabled');
	
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
	
	tempo.innerText=time;
	setTimeout('cronometro();',1000);
	
	segundo=segundo+1;	
}

function stop(){
	location.reload();
}
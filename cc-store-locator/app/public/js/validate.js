addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
    var ob1=document.getElementById('addressInput');
    addEvent(ob1,'keypress',presionar,false);
}

function presionar(e)
{
    if (window.event)
    {
        if (window.event.keyCode==13)
        {
            confirmar()
            }// Aqui escribe el nombre tu funcion que hace la busqueda...
    }
    else
    if (e)
    {
        if(e.which==13)
        {
            confirmar()
            }//Igual que arriba
    }
}
	
function addEvent(elemento,nomevento,funcion,captura)
{
    if (elemento.attachEvent)
    {
        elemento.attachEvent('on'+nomevento,funcion);
        return true;
    }
    else  
    if (elemento.addEventListener)
    {
        elemento.addEventListener(nomevento,funcion,captura);
        return true;
    }
    else
        return false;
}

function confirmar(){
    searchLocations();
}
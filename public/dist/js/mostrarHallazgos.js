
var contadorHallazgos = [1, 1, 1, 1, 1, 1, 1];

function mostrarDiv(idIndicador){
    if(contadorHallazgos[idIndicador] == 4){
        alert("Ya se han agregado todos los hallazgos permitidos a este indicador");
        return;
    }

    var div = document.getElementById("Indicador" + idIndicador + "Hallazgo" + contadorHallazgos[idIndicador]);
    div.style.display = 'block';
    contadorHallazgos[idIndicador] = contadorHallazgos[idIndicador] + 1;
}

function ocultarDiv(idIndicador){
    if(contadorHallazgos[idIndicador] == 1){
        alert("Ya no se pueden quitar mas hallazgos a este indicador");
        return;
    }
    contadorHallazgos[idIndicador] = contadorHallazgos[idIndicador] - 1;
    var div = document.getElementById("Indicador" + idIndicador + "Hallazgo" + contadorHallazgos[idIndicador]);
    div.style.display = 'none';
    
}

function eliminarIndicador(){
    
    var indicadoresContainer = document.getElementById("indicadores-container");
    
    var hijos = indicadoresContainer.children;
    if(hijos.length <= 1){
        alert("No se pueden eliminar mas indicadores del documento");
        return;
    }
    hijos[hijos.length-1].remove();
}
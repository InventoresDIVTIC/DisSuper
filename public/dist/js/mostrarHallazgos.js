
var contadorHallazgos = [1, 1, 1, 1, 1, 1, 1];
var contadorIndicadores = 1;

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
    if(hijos.length <= 2){
        alert("No se pueden eliminar mas indicadores del documento");
        return;
    }
    else{
        hijos[hijos.length-1].remove();
    }
    
}

function funcionOptimizacion(x) {
    // Función de optimización (Modelo Matematico)
    return x.reduce((sum, val) => sum + val**2, 0);
}

function enjambreParticulas(funcionOptimizacion, numParticles = 30, dimensions = 2, iterations = 100, c1 = 2.0, c2 = 2.0, w = 0.5) {
    // Inicialización de partículas
    const particlesPosition = Array.from({ length: numParticles }, () =>
        Array.from({ length: dimensions }, () => Math.random() * 10 - 5)
    );
    const particlesVelocity = Array.from({ length: numParticles }, () =>
        Array.from({ length: dimensions }, () => Math.random() * 2 - 1)
    );

    // Inicialización de mejores posiciones personales
    const personalBestPositions = particlesPosition.map(p => [...p]);
    const personalBestValues = particlesPosition.map(p => objectiveFunction(p));

    // Inicialización de la mejor posición global
    let globalBestPosition = [...particlesPosition[personalBestValues.indexOf(Math.min(...personalBestValues))]];
    let globalBestValue = Math.min(...personalBestValues);

    for (let iteration = 0; iteration < iterations; iteration++) {
        for (let i = 0; i < numParticles; i++) {
            // Actualización de velocidad y posición
            const r1 = Math.random();
            const r2 = Math.random();
            const cognitiveComponent = personalBestPositions[i].map((val, idx) =>
                c1 * r1 * (val - particlesPosition[i][idx])
            );
            const socialComponent = globalBestPosition.map((val, idx) =>
                c2 * r2 * (val - particlesPosition[i][idx])
            );
            particlesVelocity[i] = particlesVelocity[i].map((val, idx) =>
                w * val + cognitiveComponent[idx] + socialComponent[idx]
            );
            particlesPosition[i] = particlesPosition[i].map((val, idx) =>
                val + particlesVelocity[i][idx]
            );

            // Evaluación de la nueva posición
            const currentValue = funcionOptimizacion(particlesPosition[i]);

            // Actualización de la mejor posición personal
            if (currentValue < personalBestValues[i]) {
                personalBestValues[i] = currentValue;
                personalBestPositions[i] = [...particlesPosition[i]];
            }

            // Actualización de la mejor posición global
            if (currentValue < globalBestValue) {
                globalBestValue = currentValue;
                globalBestPosition = [...particlesPosition[i]];
            }
        }
    }

    return { bestPosition: globalBestPosition, bestValue: globalBestValue };
}

// Ejemplo de uso



function crearDocumento(){
    const result = particleSwarmOptimization(funcionOptimizacion, 30, 2, 100);
    console.log("Mejor posición:", result.bestPosition);
    console.log("Mejor valor:", result.bestValue);
}
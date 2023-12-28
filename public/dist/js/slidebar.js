$(document).ready(function() {
    // Contador para llevar un seguimiento de los indicadores dinámicos
    var indicadorCount = 1;
    var hallazgosCount = 1;
  

    
   
    // Inicializar el slidebar para el primer indicador estático
    initSlidebarForElement($("#static-indicador")); // Cambiado el selector

    function initSlidebarForElement(element) {
        element.on("input", ".form-range", function() {
            const slider = $(this);
            const output = slider.siblings("output");
            const value = slider.val();

            if (value < 50) {
                slider.css("background", "red");
            } else if (value >= 50 && value <= 70) { 
                slider.css("background", "yellow");
            } else {
                slider.css("background", "green");
            }
            output.text(value);
        });
    }

    function primerIndicador(){
        var nuevoIndicador = `
        <div class="indicador">
            <div class="card">
                <div class="card-header">
                    <label class="col-sm-9 card-title text-info">Indicador ${indicadorCount}</label>
                    <button type="button" class="btn add-btn btn-info " onclick="mostrarDiv(${indicadorCount})" >Agregar Hallazgo</input>
                    <button type="button" class="btn add-btn btn-danger " onclick="ocultarDiv(${indicadorCount})" >Quitar Hallazgo</input>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Indicador</label>
                        <div class="col-md-9">
                            <select name="indicador${indicadorCount}" id="indicador${indicadorCount}" class="form-control">
                            <option value="Productividad">Productividad</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hallazgo 1</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Evidencia 1</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                    <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hallazgo" id="Indicador${indicadorCount}Hallazgo1">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hallazgo 2</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evidencia 2</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                        <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hallazgo" id="Indicador${indicadorCount}Hallazgo2">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hallazgo 3</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evidencia 3</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                        <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hallazgo" id="Indicador${indicadorCount}Hallazgo3">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hallazgo 4</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evidencia 4</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                        <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Sistemas de Referencia</label>
                        <div class="col-md-9">
                            <input type="text" name="Sistemas_Referencia" id= "Sistemas_Referencia" class="form-control" placeholder="Sistemas de Referenciar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Valor Alcanzado</label>
                        <div class="col-md-10">
                            <input type="range" class="form-range" id="rangoValor" name="rangoValor" min="0" max="100" style="width: 90%;">
                            <output id="Valor_Alcanzado" name="Valor_Alcanzado" class="output-range-value">0</output>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Afectaciones</label>
                        <div class="col-md-9">
                            <textarea rows="3" name="Afectaciones" id="Afectaciones" class="form-control" placeholder="Explique las Afectaciones al Indicador"> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Normas Incumplidas</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Normas_Incumplidas" id="Normas_Incumplidas" placeholder="Normas Incumplidas">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;

        // Convertir el nuevo indicador en un elemento jQuery
        var $nuevoIndicador = $(nuevoIndicador);

        //Ocultar los Divs de Hallazgo
        $nuevoIndicador.find('.hallazgo').hide();

        // Agregar el nuevo indicador al contenedor
        $("#indicadores-container").append($nuevoIndicador);

        // Inicializar el slidebar para el nuevo indicador dinámico
        initSlidebarForElement($nuevoIndicador);
    }

    $("#removeIndicador").click(function(){
        if(indicadorCount>1)
            indicadorCount--;
    });

    // Manejar el clic en el botón "Agregar Indicador"
    $("#addIndicador").click(function() {
        if(indicadorCount == 6){
            alert("Ya se ha alcanzado el limite de indicadores por documento");
            return;
        }
        indicadorCount++;
    
        // Crear un nuevo conjunto de campos para el indicador dinámico
        var nuevoIndicador = `
        <div class="indicador">
            <div class="card">
                <div class="card-header">
                <label class="col-sm-9 card-title text-info">Indicador ${indicadorCount}</label>
                <button type="button" class="btn add-btn btn-info " onclick="mostrarDiv(${indicadorCount })" >Agregar Hallazgo</input>
                <button type="button" class="btn add-btn btn-danger " onclick="ocultarDiv(${indicadorCount})" >Quitar Hallazgo</input>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Indicador</label>
                        <div class="col-md-9">
                            <select name="indicador${indicadorCount}" id="indicador${indicadorCount}" class="form-control">
                            <option value="Productividad">Productividad</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hallazgo 1</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Evidencia 1</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                    <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hallazgo" id="Indicador${indicadorCount}Hallazgo1">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hallazgo 2</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evidencia 2</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                        <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hallazgo" id="Indicador${indicadorCount}Hallazgo2">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hallazgo 3</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evidencia 3</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                        <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hallazgo" id="Indicador${indicadorCount}Hallazgo3">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hallazgo 4</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Evidencia 4</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                        <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Sistemas de Referencia</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Sistemas de Referenciar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Valor Alcanzado</label>
                        <div class="col-md-10">
                            <input type="range" class="form-range" min="0" max="100" style="width: 90%;">
                            <output class="output-range-value">0</output>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Afectaciones</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique las Afectaciones al Indicador"> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Normas Incumplidas</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Normas Incumplidas">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;



        // Convertir el nuevo indicador en un elemento jQuery
        var $nuevoIndicador = $(nuevoIndicador);
        //Ocultar los Divs de Hallazgo
        $nuevoIndicador.find('.hallazgo').hide();

        // Agregar el nuevo indicador al contenedor
        $("#indicadores-container").append($nuevoIndicador);

        // Inicializar el slidebar para el nuevo indicador dinámico
        initSlidebarForElement($nuevoIndicador);
    });
    


   

    primerIndicador();
});
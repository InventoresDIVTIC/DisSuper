$(document).ready(function() {
    // Contador para llevar un seguimiento de los indicadores dinámicos
    var indicadorCount = 1;

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
                <label class="col-sm-2 card-title text-info">Indicador ${indicadorCount}</label>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nombre del Indicador ${indicadorCount}</label>
                        <div class="col-md-9">
                            <select name="indicador${indicadorCount}" id="indicador${indicadorCount}" class="form-control">
                                <option value="Productividad">Productividad</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hallazgo ${indicadorCount}</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Evidencia ${indicadorCount}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                    <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Sistemas de Referencia ${indicadorCount}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Sistemas de Referenciar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Valor Alcanzado ${indicadorCount}</label>
                        <div class="col-md-10">
                            <input type="range" class="form-range" min="0" max="100" style="width: 90%;">
                            <output class="output-range-value">0</output>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Afectaciones ${indicadorCount}</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique las Afectaciones al Indicador"> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Normas Incumplidas ${indicadorCount}</label>
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

        // Agregar el nuevo indicador al contenedor
        $("#indicadores-container").append($nuevoIndicador);

        // Inicializar el slidebar para el nuevo indicador dinámico
        initSlidebarForElement($nuevoIndicador);
    }


    // Manejar el clic en el botón "Agregar Indicador"
    $("#addIndicador").click(function() {
        indicadorCount++;
        // Crear un nuevo conjunto de campos para el indicador dinámico
        var nuevoIndicador = `
        <div class="indicador">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Indicador ${indicadorCount}</label>
                        <div class="col-md-9">
                            <select name="indicador${indicadorCount}" id="indicador${indicadorCount}" class="form-control">
                            <option value="Productividad">Productividad</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hallazgo ${indicadorCount}</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Evidencia ${indicadorCount}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile${indicadorCount}">
                                    <label class="custom-file-label" for="customFile${indicadorCount}">Imagen de Evidencia</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Sistemas de Referencia ${indicadorCount}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Sistemas de Referenciar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Valor Alcanzado ${indicadorCount}</label>
                        <div class="col-md-10">
                            <input type="range" class="form-range" min="0" max="100" style="width: 90%;">
                            <output class="output-range-value">0</output>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Afectaciones ${indicadorCount}</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" placeholder="Explique las Afectaciones al Indicador"> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Normas Incumplidas ${indicadorCount}</label>
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

        // Agregar el nuevo indicador al contenedor
        $("#indicadores-container").append($nuevoIndicador);

        // Inicializar el slidebar para el nuevo indicador dinámico
        initSlidebarForElement($nuevoIndicador);
    });

    primerIndicador();
});
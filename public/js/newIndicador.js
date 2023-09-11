const contenedor = document.querySelector('#Indicadores');
const btnAgregar = document.querySelector('#addIndicador');

let contador = 1;

btnAgregar.addEventListener('click', e => {
    let div = document.createElement('div');
    div.innerHTML = '<div class="col-md-6">'
                      +'<label class="col-sm-2 col-form-label"> Nombre del Indicador ${contador++} </label>'
                      +'<div class="col-sm-10">'
                        +'<input type="string" class="form-control" placeholder="Nombre del Indicador">'
                      +'</div>'
                    +'</div>';
    contador.appendChild(div);
})


const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedor.removeChild(divPadre);
    actualizarContador();
};


const actualizarContador = () => {
    let divs = contenedor.children;
    contador = 1;
    for (let i=0; i< divs.length;i++){
        divs[i].children[0].innerHTML = contador++;
    }
};
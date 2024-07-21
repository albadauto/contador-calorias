console.log('carregado')

function abrirpopup(titulo, formulario){
    document.getElementById("exampleModalLabel").innerHTML = titulo;
    let form = document.getElementById('formAdicionarKcal')
    form.setAttribute('action', formulario);
}

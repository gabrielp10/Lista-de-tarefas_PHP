function requisitarPagina(url) {

    document.getElementById('conteudo').innerHTML = ''
    //incluir gif de loading na página
    if(!document.getElementById('loading')){
        let imgLoading = document.createElement('img')
        imgLoading.src = '/assets/img/loading.gif'
        imgLoading.id = 'loading'
        imgLoading.className = 'rounded mx-auto d-block'

        document.getElementById('conteudo').appendChild(imgLoading)
    }

    let ajax = new XMLHttpRequest();
    //requisição não iniciada:  state  = 0 (Ainda não foi feita requisição)
    
    console.log(ajax.readyState) //Verifica o estado atual
    
    ajax.open('GET', url)
    //conexão estebelecida com o servidor, state = 1
    
    console.log(ajax.readyState) //Verifica o estado atual

    //Dispara sempre quando o objeto ajax é modificado e a requisição está completa
    ajax.onreadystatechange = () => {
        if(ajax.readyState = 4 && ajax.status == 200){

            document.getElementById('conteudo').innerHTML = ajax.responseText
            //document.getElementById('loading').remove()

        }

        if (ajax.readyState == 4 && ajax.status == 404){
            document.getElementById('conteudo').innerHTML = 'O recurso solicitado não foi encontrado. Erro: ' + ajax.status
            console.log('Requisição finalizada, porém o recurso solicitado não foi encontrado. Erro: ' + ajax.status)
            //document.getElementById('loading').remove()

        }
    } 


    ajax.send()

    //console.log(ajax)
}

    function editar(id, txt_tarefa) {

        //criar um form de edição
        let form = document.createElement('form')
        form.action = 'tarefa_controller.php?acao=atualizar'
        form.method = 'post'
        form.className = 'row'

        //criar um input para entrada do texto
        let inputTarefa = document.createElement('input')
        inputTarefa.type = 'text'
        inputTarefa.name = 'tarefa'
        inputTarefa.className = 'col-9 form-control'
        inputTarefa.value = txt_tarefa

        //criar um input hidden para guardar o id da tarefa
        let inputId = document.createElement('input')
        inputId.type = 'hidden'
        inputId.name = 'id'
        inputId.value = id

        //criar um button para envio do form
        let button = document.createElement('button')
        button.type = 'submit'
        button.className = 'col-3 btn btn-info'
        button.innerHTML = 'Atualizar'

        //incluir inputTarefa no form
        form.appendChild(inputTarefa)

        //incluir inputId no form
        form.appendChild(inputId)

        //incluir button no form
        form.appendChild(button)

        //teste
        //console.log(form)

        //selecionar a div tarefa
        let tarefa = document.getElementById('tarefa_'+id)

        //limpar o texto da tarefa para inclusão do form
        tarefa.innerHTML = ''

        //incluir form na página
        tarefa.insertBefore(form, tarefa[0])
}

function remover(id){
    location.href = 'todas_tarefas.php?acao=remover&id='+id

}

function marcarRealizada(id){
    location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id
}

function marcarPendente(id){
    location.href = 'todas_tarefas.php?acao=marcarPendente&id='+id
}



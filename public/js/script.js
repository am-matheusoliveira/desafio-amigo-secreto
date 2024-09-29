
// Pegando os botões que usam a classe btn-delete
const btnDelete = document.querySelectorAll('.btn-delete');

// Adicionando o evendo de click em cada botão
btnDelete.forEach(btnDelete => {
    btnDelete.addEventListener('click', (event) =>{
        
        // Se o usuário não confirmar o registro não será excluido
        if(!confirm('Deseja realmente deletar esse registro?')){
            event.preventDefault();
        }
    });
});

/* Função para validar os campos do Formulário */
(function () {
    'use strict'

    const forms = document.querySelectorAll('.requires-validation');

    Array.from(forms).forEach(function (form){

        form.addEventListener('submit', function (event){
            if (!form.checkValidity()){
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
})()
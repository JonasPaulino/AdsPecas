var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") 
    {
        searchData();
    }
});

function searchData()
{
    window.location = './listaUsuarios.php?search='+search.value;
}

$('.btn-del').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
        title: 'Excluir?',
        icon: 'question',
        text: 'Deseja confirmar a exclusão deste usuário?',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        showCloseButton: true
        }).then((result) =>{
            if(result.value){
                document.location.href = href;
            }
        })
})
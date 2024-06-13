
/*iniciar jquery*/
$(document).ready(function () {
    $('.botao_editar').on('click', function (){
        var $task = $(this).closest('.tarefa');
        $task.find('.progresso').addClass('hidden');
        $task.find('.decricao_tarefa').addClass('hidden');
        $task.find('.acoes_tarefas').addClass('hidden');
        $task.find('.editar_tarefa').removeClass('hidden');
    });

    /*add uma classe*/
    $('.progresso').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).addClass('feito');
        } else {
            $(this).removeClass('feito');
        }
    })
    /*
    $('.progresso').on('change', function() {
        const id = $(this).data('task-id');
        const completo = $(this).is(':checked') ? 'true' : 'false';

        $.ajax({
            url: '../../acoes/update-progress.php',
            method: 'POST',
            data: {id: id, completo: completo},
            dataType: 'json',
            success: function(response) {
                if (response.success) {

                } else {
                    alert('Erro ao editar');
                }
            },
            error: function() {
                alert('Ocorreu um erro');
            }


        })
    })*/


});
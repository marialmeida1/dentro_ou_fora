$(document).ready(function () {
    $('#flexSwitchCheckDefault').on('click', function () {
        $('#confirmationModal').modal('show'); // Abre o modal de confirmação quando o botão de switch é clicado
    });

    $('#confirmChange').on('click', function () {
        // Aqui você pode adicionar a lógica para alterar o estado do switch
        $('#confirmationModal').modal('hide'); // Fecha o modal de confirmação
    });
});
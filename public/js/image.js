function exibirImagem() {
    var input = document.getElementById('foto');
    var imagemPreview = document.getElementById('imagemPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imagemPreview.src = e.target.result;
            imagemPreview.style.display = 'block'; // Exibir a imagem
        }

        reader.readAsDataURL(input.files[0]);
    }
}
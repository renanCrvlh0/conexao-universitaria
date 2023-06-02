// Aqui você pode adicionar scripts JavaScript para manipular o formulário, como validar os campos antes de enviar.
// Você pode vincular esse arquivo JavaScript ao seu arquivo HTML usando a tag <script> no final do body ou através de um arquivo externo.

// Exemplo simples de validação do formulário
document.querySelector('form').addEventListener('submit', function(event) {
    var nomeInput = document.getElementById('nome');
    var telefoneInput = document.getElementById('telefone');
    
    if (nomeInput.value.trim() === '' || telefoneInput.value.trim() === '') {
        event.preventDefault();
        alert('Por favor, preencha todos os campos.');
    }
});

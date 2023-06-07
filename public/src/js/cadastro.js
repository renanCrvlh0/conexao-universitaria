import { cadastros } from "./service.js";

const form = document.querySelector('#form-cadastro');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const fileInput = document.getElementById('foto');
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        const fileDataUrl = e.target.result;

        let novoCadastro = {
            nome : form.nome.value,
            telefone : form.telefone.value,
            universidade : form.universidade.value,
            genero : form.genero.value,
            sobre : form.sobre.value,
            foto : fileDataUrl
        };
        console.log(novoCadastro);
        cadastros.add(novoCadastro).then((docRef) => {
            form.reset();
            alert(`Parabéns ${novoCadastro.nome}, seu cadastro foi realizado com sucesso!`)
            window.location.href = "https://conexao-universitaria.web.app/";
        })
            .catch((error) => {
                alert(`Cadastro não pode ser concluido`)
                console.error("Error adding document: ", error);
            });
    };

    reader.readAsDataURL(file);

    
})
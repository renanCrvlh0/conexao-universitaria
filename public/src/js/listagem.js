import { cadastros } from "./service.js";

const listaElemento = document.querySelector('#lista-cadastros');

const criarElemento = (cadastro) => {
    return `
    <li class="item-cadastro">
        <div class="item-conteudo">
            <div class="container-foto">
                <img src="${cadastro.foto}" alt="foto do usuário" class="item-foto">
            </div>
            <h2 class="item-nome">${cadastro.nome}</h2>
            <div class="container-telefone">
                <h3 class="titulo-telefone"><span class="material-symbols-outlined">phone_iphone</span></h3>
                <a href="https://wa.me/${cadastro.telefone}"><p class="item-telefone">${cadastro.telefone}</p></a>
            </div>  
            <div class="container-universidade">          
                <h3 class="titulo-universidade"><span class="material-symbols-outlined">apartment</span></h3>
                <p class="item-universidade">${cadastro.universidade}</p>
            </div>         
            <div class="container-genero">
                <h3 class="titulo-genero"><span class="material-symbols-outlined">transgender</span></h3>
                <p class="item-genero">${cadastro.genero}</p>
            </div>
            <h3 class="titulo-sobre">Sobre mim:</h3>
            <div class="container-sobre">
                <p class="item-sobre">${cadastro.sobre}</p>
            </div>
        </div>
    </li>
    `;
}

const renderizarLista = (arrayCadastros) => {
    listaElemento.innerHTML = arrayCadastros.map((cadastro) => {
        return criarElemento(cadastro);   
    })
}

cadastros.get().then((querySnapshot) => {
    const arrayCadastros = querySnapshot.docs.map(item => item.data());
    renderizarLista(arrayCadastros);
});
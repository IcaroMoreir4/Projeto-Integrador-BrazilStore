// Criação da função para abrir o menu

document.addEventListener('DOMContentLoaded', function() {
    const categoriaLink = document.getElementById('categoriaBtn');
    const categoriaMenu = document.getElementById('categoriaMenu');

    categoriaLink.addEventListener('click', function(event) {
        event.preventDefault(); 
        
        
        if (categoriaMenu.style.display === 'none' || categoriaMenu.style.display === '') {
            categoriaMenu.style.display = 'block';
        } else {
            categoriaMenu.style.display = 'none';
        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const categoriaBtn = document.querySelector('.categoria_btn');
    const categoriaMenu = document.querySelector('.categoria_menu');

    categoriaBtn.addEventListener('click', function() {
        categoriaMenu.classList.toggle('aberto');
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const categoriaBtn = document.getElementById('categoriaBtn');
    const arrowIcon = document.getElementById('arrowIcon');

    categoriaBtn.addEventListener('click', function() {
        arrowIcon.classList.toggle('rotacionado');
    });
});

// Função para abrir o pop-up de login
function openLogin() {
    document.getElementById('popupLogin').style.display = 'block';
    document.getElementById('popupBg').style.display = 'flex'; 
    document.getElementById('popupCadastro').style.display = 'none';
    document.getElementById('popupBgCadastro').style.display = 'none';   
}

// Função para fechar o pop-up de login
function closeLogin() {
    document.getElementById('popupLogin').style.display = 'none';
    document.getElementById('popupBg').style.display = 'none'; 
}

// Função para abrir o pop-up de cadastro
function openCadastro() {
    document.getElementById('popupCadastro').style.display = 'block';
    document.getElementById('popupBgCadastro').style.display = 'flex'; 
    document.getElementById('popupLogin').style.display = 'none';
    document.getElementById('popupBg').style.display = 'none';   
}

// Função para fechar o pop-up de cadastro
function closeCadastro() {
    document.getElementById('popupCadastro').style.display = 'none';
    document.getElementById('popupBgCadastro').style.display = 'none'; 
}

// Função para abrir o pop-up de cadastro loja
function openCadastroLoja() {
    document.getElementById('popupCadastroLoja').style.display = 'block';
    document.getElementById('popupBgCadastroLoja').style.display = 'flex'; 
    document.getElementById('popupLoginLoja').style.display = 'none';
    document.getElementById('popupBgLoja').style.display = 'none';   
}

// Função para fechar o pop-up de cadastro loja
function closeCadastroLoja() {
    document.getElementById('popupCadastroLoja').style.display = 'none';
    document.getElementById('popupBgCadastroLoja').style.display = 'none'; 
}

// Função para abrir o pop-up de login loja
function openLoginLoja() {
    document.getElementById('popupLoginLoja').style.display = 'block';
    document.getElementById('popupBgLoja').style.display = 'flex'; 
    document.getElementById('popupCadastroLoja').style.display = 'none';
    document.getElementById('popupBgCadastroLoja').style.display = 'none';   
}

// Função para fechar o pop-up de login loja
function closeLoginLoja() {
    document.getElementById('popupLoginLoja').style.display = 'none';
    document.getElementById('popupBgLoja').style.display = 'none'; 
}

// Função para abrir o pop-up de cadastro Endereço
function openCadastroEndereço() {
    document.getElementById('popupCadastroEndereço').style.display = 'block';
    document.getElementById('popupBgCadastroEndereço').style.display = 'flex'; 
    document.getElementById('popupLoginEndereço').style.display = 'none';
    document.getElementById('popupBgEndereço').style.display = 'none';   
}

// Função para fechar o pop-up de cadastro Endereço
function closeCadastroEndereço() {
    document.getElementById('popupCadastroEndereço').style.display = 'none';
    document.getElementById('popupBgCadastroEndereço').style.display = 'none'; 
}

document.addEventListener('DOMContentLoaded', function () {
    const listItems = document.querySelectorAll('.abrir-termos');
    
    listItems.forEach(function (item) {
        const arrowTermos = item.querySelector('.arrowTermos'); // Selecionar o ícone de seta dentro de cada item

        item.addEventListener('click', function () {
            const content = this.nextElementSibling;
            content.style.display = content.style.display === 'none' ? 'block' : 'none';

            arrowTermos.classList.toggle('rotacionado');
        });
    });
});

function openPerfil() {
    var perfilMenu = document.getElementById('perfilMenu');
    perfilMenu.classList.toggle('aberto');
}

//adicionar item vendedor
function redirectToAdicionar() {
    window.location.href = 'adicionar.php';
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form'); // Assumindo que o botão está dentro de um formulário
    const button = document.getElementById('adicionarItemBtn');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita o comportamento padrão do formulário

        // Aqui você pode adicionar a lógica de submissão do formulário, como uma chamada AJAX, por exemplo.
        // Se a submissão for bem-sucedida, execute a função de redirecionamento
        
        // Simulação de uma submissão bem-sucedida
        const submissionSuccessful = true; // Altere isso de acordo com a lógica de submissão

        if (submissionSuccessful) {
            redirectToProdutos();
        }
    });
});

function redirectToProdutos() {
    window.location.href = 'meus_produtos.php'; // Altere a URL conforme necessário
}


// editar perfil usuario

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









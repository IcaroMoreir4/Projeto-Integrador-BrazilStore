// Criação da função para abrir o menu

document.addEventListener('DOMContentLoaded', function() {
    const categoriaLink = document.querySelector('.categoria_btn a.cor-12');
    const categoriaMenu = document.getElementById('categoriaMenu');

    categoriaLink.addEventListener('click', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do link (navegar para outra página)
        
        // Verifica o estado atual do menu e alterna entre block e none
        if (categoriaMenu.style.display === 'none' || categoriaMenu.style.display === '') {
            categoriaMenu.style.display = 'block';
        } else {
            categoriaMenu.style.display = 'none';
        }
    });
});

// Animação para abrir o menu

document.addEventListener('DOMContentLoaded', function() {
    const categoriaBtn = document.querySelector('.categoria_btn');
    const categoriaMenu = document.querySelector('.categoria_menu');

    categoriaBtn.addEventListener('click', function() {
        categoriaMenu.classList.toggle('aberto');
    });
});

// Hover da seta na categoriaBtn

document.addEventListener('DOMContentLoaded', function() {
    const categoriaBtn = document.getElementById('categoriaBtn');
    const arrowIcon = document.getElementById('arrowIcon');

    categoriaBtn.addEventListener('click', function() {
        arrowIcon.classList.toggle('rotacionado');
    });
});

// Função para abrir o pop-up de login
function openPopup() {
    document.getElementById('popupLogin').style.display = 'block';
    document.getElementById('popupBg').style.display = 'block';    
}

// Função para fechar o pop-up de login
function closePopup() {
    document.getElementById('popupLogin').style.display = 'none';
    document.getElementById('popupBg').style.display = 'none'; 

}





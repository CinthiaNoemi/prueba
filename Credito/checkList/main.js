document.addEventListener("DOMContentLoaded", function() {
    const checklist = document.getElementById('checklist');

    // Array de requisitos (puedes modificar según tus necesidades)
    const requisitos = [
        'Requisito 1',
        'Requisito 2',
        'Requisito 3',
        'Requisito 4'
        // Agrega más requisitos según necesites
    ];

    // Función para crear dinámicamente los elementos de la lista
    function renderChecklist() {
        requisitos.forEach((requisito, index) => {
            const li = document.createElement('li');
            li.textContent = requisito;
            li.addEventListener('click', function() {
                toggleCompleted(index);
            });
            checklist.appendChild(li);
        });
    }

    // Función para marcar como completado o no completado
    function toggleCompleted(index) {
        const li = checklist.children[index];
        li.classList.toggle('completed');
    }

    // Llamar a la función para renderizar la lista inicial
    renderChecklist();
});

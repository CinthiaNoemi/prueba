document.addEventListener('DOMContentLoaded', function() {
    // Selecciona el combo box usando su ID
    const comboBox = document.getElementById('aval-opcion');

    // Agrega un manejador de eventos para el evento 'change'
    comboBox.addEventListener('change', function() {
        // Obtén el valor seleccionado del combo box
        const selectedValue = comboBox.value;
        
        // Usa una sentencia if para evaluar el valor seleccionado
        if (selectedValue === 'Con Aval ≤ $5,000.00') {
            alert('Se ha seleccionado la Opción 1');
        } else if (selectedValue === 'Con Aval > $5,000.00 o ≤ $10,000.00') {
            this.innerHTML.
        } else if (selectedValue === 'Propiedad > $10,000.00') {
            alert('Se ha seleccionado la Opción 3');
        }
    });
});

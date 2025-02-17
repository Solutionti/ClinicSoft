document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("otra").addEventListener("change", function() {
        let textareaContainer = document.getElementById("observacion_container");
        textareaContainer.style.display = this.checked ? "block" : "none";
    });
});

document.getElementById("contenido").addEventListener("change", function() {
    let detalleContenedor = document.getElementById("detalle_contenedor");
    if (this.value === "Sí") {
        detalleContenedor.style.display = "block";  // Muestra el input
    } else {
        detalleContenedor.style.display = "none";   // Oculta el input
    }
});

document.getElementById("imagenes_expansivas").addEventListener("change", function() {
    let detalleImagenesContenedor = document.getElementById("detalle_imagenes_contenedor");
    detalleImagenesContenedor.style.display = this.value === "Sí" ? "block" : "none";
});

function toggleInput(selectId, inputContainerId) {
    let selectElement = document.getElementById(selectId);
    let inputContainer = document.getElementById(inputContainerId);

    selectElement.addEventListener("change", function() {
        inputContainer.style.display = this.value === "Sí" ? "block" : "none";
    });
}

// Aplicar la función a este nuevo campo
toggleInput("calculos", "detalle_calculos_contenedor");
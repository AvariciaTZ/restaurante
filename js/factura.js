document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnFactura");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.querySelector(".printFacturaPrint"); // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                /* margin: 1, */
                margin: 1,
                filename: 'Factura.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: 'landscape' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err))
            .finally()
            .then(() => { alert('Iniciando la descarga de la Factura en PDF...') })
    });
});
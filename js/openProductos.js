addEventListener('DOMContentLoaded', () => {
    const btnMenu = document.querySelector('.btnNameProducto')
    const btnMenu2 = document.querySelector('.btnNameProducto2')
    const btnMenu3 = document.querySelector('.btnNameProducto3')
    var aumen = 0;

    if (btnMenu) {

        btnMenu.addEventListener('click', () => {
            /* aparece desaparece */
            const menuProductos = document.querySelector('.container__productos')
            var condi = menuProductos.classList.toggle('show')
            /* aumento del fondo */

            /*    if (btnMenu && condi == true) {
                   var fondo = document.getElementById('container__carta-productos')
                   fondo.style.height = (aumen += 100) + 'vh';
                   alert(aumen + " " + condi);
   
   
   
                   menuProductos.classList.remove('show')
                   if (condi) {
                       aumen = 0;
                       var fondo = document.getElementById('container__carta-productos')
                       fondo.style.height = (aumen = aumen - 100) + 'vh';
   
                       alert(aumen + " reduce " + condi);
                   }
               } */

            /*  cambio.style.background = 'url(' + arrayCatFotos[index] + ')';
             cambio.style.backgroundRepeat = "no-repeat !important";
             cambio.style.backgroundSize = "cover !important";
             cambio.style.backgroundPosition = "center !important"; */

            /*    const btnMenu__line = document.querySelector('.btnMenu__line')
               btnMenu__line.classList.toggle('show')
               const btnMenu__line2 = document.querySelector('.btnMenu__line:nth-child(2)')
               btnMenu__line2.classList.toggle('show')
               const btnMenu__line3 = document.querySelector('.btnMenu__line:nth-child(3)')
               btnMenu__line3.classList.toggle('show') */






        }






        )



    }
    /*  */
    if (btnMenu2) {

        btnMenu2.addEventListener('click', () => {



            /* aparece desaparece */
            const menuProductos = document.querySelector('.container__productos2')
            var condi = menuProductos.classList.toggle('show')
            /* aumento del fondo */

            /*   if (btnMenu2 && condi == true) {
                  var fondo = document.getElementById('container__carta-productos')
                  fondo.style.height = (aumen += 100) + 'vh';
                  alert(aumen + " " + condi);
  
                  if (condi !== true) {
                      var fondo = document.getElementById('container__carta-productos')
                      fondo.style.height = (aumen -= 100) + 'vh';
  
                      alert(aumen + " reduce " + condi);
                  }
                  aumen = 0;
  
              } */

        }
        )
    }


    /*  */
    /* Activar mediante el carrito el registro de productos */
    const btnMenu6 = document.querySelector('.nav-item-product2')
    /* Desactivar mediante el carrito el registro de productos */
    const btnMenu7 = document.querySelector('.nav-item-product1')
    /* Desactivar mediante el carrito el paypal */
    const btnMenu8 = document.querySelector('.nav-item-product2')
    /* Desactivar mediante el carrito el paypal */
    const btnMenu9 = document.querySelector('.nav-item-product1')
    if (btnMenu6) {
        btnMenu6.addEventListener('click', () => {
            const regMenuProductos = document.querySelector('.activeRegProCar')
            var activeProCar = regMenuProductos.classList.toggle('showProCar')
        }
        )
    }
    if (btnMenu7) {
        btnMenu7.addEventListener('click', () => {
            const regMenuProductos = document.querySelector('.activeRegProCar')
            var activeProCar = regMenuProductos.classList.remove('showProCar')
        }
        )
    }
    /*  */
    if (btnMenu8) {
        btnMenu8.addEventListener('click', () => {
            const regMenuProductos2 = document.querySelector('.pagoPaypalFac')
            var activeProCar2 = regMenuProductos2.classList.toggle('seePay')
        }
        )
    }
    if (btnMenu9) {
        btnMenu9.addEventListener('click', () => {
            const regMenuProductos2 = document.querySelector('.pagoPaypalFac')
            var activeProCar2 = regMenuProductos2.classList.remove('seePay')
        }
        )
    }












    /*  */
    if (btnMenu3) {

        btnMenu3.addEventListener('click', () => {



            /* aparece desaparece */
            const menuProductos = document.querySelector('.container__productos3')
            var condi = menuProductos.classList.toggle('show')



        }



        )
    }
    /* carta */
    const btnMenu4 = document.querySelector('.container__optionsProdCarrito .inputCarta')
    var condi4, condi5;
    if (btnMenu4) {

        btnMenu4.addEventListener('click', () => {
            const menuProductos4 = document.querySelector('.container__carta-productos')
            condi4 = menuProductos4.classList.toggle('ShowCarta')

            const menuProductos5 = document.querySelector('.carrito')
            condi5 = menuProductos5.classList.remove('ShowCarrito')
        }
        )
    }/* carrito */
    const btnMenu5 = document.querySelector('.container__optionsProdCarrito .inputCarrito')
    if (btnMenu5) {

        btnMenu5.addEventListener('click', () => {
            const menuProductos5 = document.querySelector('.carrito')
            condi5 = menuProductos5.classList.toggle('ShowCarrito')


            const menuProductos4 = document.querySelector('.container__carta-productos')
            condi4 = menuProductos4.classList.remove('ShowCarta')
        }
        )
    }

}
)

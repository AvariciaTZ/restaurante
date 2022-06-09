addEventListener('DOMContentLoaded', () => {
    const btnMenu = document.querySelector('.btnMenu')
    if (btnMenu) {
        btnMenu.addEventListener('click', () => {
            const menuHorizontal__items = document.querySelector('.menuHorizontal__items')
            menuHorizontal__items.classList.toggle('show')

            const btnMenu__line = document.querySelector('.btnMenu__line')
            btnMenu__line.classList.toggle('show')
            const btnMenu__line2 = document.querySelector('.btnMenu__line:nth-child(2)')
            btnMenu__line2.classList.toggle('show')
            const btnMenu__line3 = document.querySelector('.btnMenu__line:nth-child(3)')
            btnMenu__line3.classList.toggle('show')



        })
    }

})

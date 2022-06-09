
addEventListener('DOMContentLoaded', () => {
    /* 1 */
    const btnMenu = document.querySelector('#switch1')
    if (btnMenu) {
        btnMenu.addEventListener('click', () => {
            const btnMenu__line3 = document.querySelector('.loginMsg')
            btnMenu__line3.classList.toggle('visibility')
            const btnMenu__line4 = document.querySelector('.frontbox__iniciarsesion')
            btnMenu__line4.classList.add('moving')
            const btnMenu__line5 = document.querySelector('.signupMsg')
            btnMenu__line5.classList.toggle('visibility')
            const btnMenu__line6 = document.querySelector('.signup')
            btnMenu__line6.classList.toggle('hide')
            const btnMenu__line7 = document.querySelector('.login')
            btnMenu__line7.classList.toggle('hide')
        })
    }
    /* 2 */
    const btnMenu2 = document.querySelector('#switch2')
    if (btnMenu2) {
        btnMenu2.addEventListener('click', () => {
            const btnMenu__line8 = document.querySelector('.loginMsg')
            btnMenu__line8.classList.toggle('visibility')
            const btnMenu__line9 = document.querySelector('.frontbox__iniciarsesion')
            btnMenu__line9.classList.remove('moving')
            const btnMenu__line10 = document.querySelector('.signupMsg')
            btnMenu__line10.classList.toggle('visibility')
            const btnMenu__line11 = document.querySelector('.signup')
            btnMenu__line11.classList.toggle('hide')
            const btnMenu__line12 = document.querySelector('.login')
            btnMenu__line12.classList.toggle('hide')
        })
    }
})


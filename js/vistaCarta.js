let xPos = 0;
let arrayCatFotos = ["/img/img__background/background1.jpg", "/img/img__background/background2.jpg", "/img/img__background/background3.jpg", "/img/img__background/background4.jpg", "/img/img__background/background5.jpg", "/img/img__background/background6.jpg", "/img/img__background/background7.png", "/img/img__background/background8.png", "/img/img__background/background9.webp", "/img/img__background/background10.jpg", "/img/img__background/background11.jpg"];

gsap.timeline()
    .set('.ring', { rotationY: 180, cursor: 'grab' }) //set initial rotationY so the parallax jump happens off screen
    .set('.img', { // apply transform rotations to each image
        rotateY: (i) => i * -36,
        transformOrigin: '50% 50% 500px',
        z: -500,
        /* backgroundImage: (i) => 'url(https://picsum.photos/id/' + (i + 32) + '/600/400/)', */
        /* backgroundImage: (i) => 'url(' + arrayCatFotos[2] + ')', */
        backgroundImage: (i) => getBgDefectoCatFotos(i),
        backgroundPosition: (i) => getBgPos(i),
        backgroundSize: (i) => 'cover',
        backgroundRepeat: (i) => 'no-repeat',
        backfaceVisibility: 'hidden'
    })
    /*  */

    /*  .set('.img:nth-child(1)', {
         backgroundImage: (i) => 'url( ' + arrayCatFotos[0] + ' ) ',
         backfaceVisibility: 'hidden'
     
     }) */
    .set('.img:nth-child(1)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[0] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(2)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[1] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(3)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[2] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(4)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[3] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(5)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[4] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(6)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[5] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(7)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[6] + ' ) ',
        backfaceVisibility: 'hidden'

    })

    .set('.img:nth-child(8)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[7] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(9)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[8] + ' ) ',
        backfaceVisibility: 'hidden'

    })
    .set('.img:nth-child(10)', {
        backgroundImage: (i) => 'url( ' + arrayCatFotos[9] + ' ) ',
        backfaceVisibility: 'hidden'

    })



    /*  */
    .from('.img', {
        duration: 1.5,
        y: 200,
        opacity: 0,
        stagger: 0.1,
        ease: 'expo'
    })
    .add(() => {
        $('.img').on('mouseenter', (e) => {
            let current = e.currentTarget;
            gsap.to('.img', { opacity: (i, t) => (t == current) ? 1 : 0.5, ease: 'power3' })
        })
        $('.img').on('mouseleave', (e) => {
            gsap.to('.img', { opacity: 1, ease: 'power2.inOut' })
        })
    }, '-=0.5')

$(window).on('mousedown touchstart', dragStart);
$(window).on('mouseup touchend', dragEnd);


function dragStart(e) {
    if (e.touches) e.clientX = e.touches[0].clientX;
    xPos = Math.round(e.clientX);
    gsap.set('.ring', { cursor: 'grabbing' })
    $(window).on('mousemove touchmove', drag);
}


function drag(e) {
    if (e.touches) e.clientX = e.touches[0].clientX;

    gsap.to('.ring', {
        rotationY: '-=' + ((Math.round(e.clientX) - xPos) % 360),
        onUpdate: () => { gsap.set('.img', { backgroundPosition: (i) => getBgPos(i) }) }
    });

    xPos = Math.round(e.clientX);
}


function dragEnd(e) {
    $(window).off('mousemove touchmove', drag);
    gsap.set('.ring', { cursor: 'grab' });
}


function getBgPos(i) { //returns the background-position string to create parallax movement in each image
    /* return (100 - gsap.utils.wrap(0, 360, gsap.getProperty('.ring', 'rotationY') - 180 - i * 36) / 360 * 500) + 'px 0px'; */
    /* return 'cover'; */
    return 'center';
}

function getBgDefectoCatFotos(i) {


    /* var cambio = document.getElementById("imglogo"); */
    var index;
    var elementT;

    for (index = 0; index < arrayCatFotos.length; index++) {

        elementT = background = 'url( ' + arrayCatFotos[index] + ' ) ';

    }
    return elementT;
}


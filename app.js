const slide = ['./img/opera.png', './img/eclair.jpg', './img/macarons.jpg']
let numero = 0

const boutonLeft = document.getElementById('btnLeft')
const boutonRight = document.getElementById('btnRight')

const slideFunction = (direction) => {
  if (numero <= slide.length - 1) {
      if (direction === 'gauche') {
        numero = numero - 1
      } else {
        numero = numero + 1
      }
  }
 
  if (numero === slide.length && direction === 'droite') 
    numero = 0

  if (numero < 0 && direction === 'gauche')
    numero = slide.length - 1

  document.getElementById("slide").src = slide[numero]
}

boutonLeft.addEventListener('click', () => slideFunction('gauche')) 
boutonRight.addEventListener('click', () => slideFunction('droite'))
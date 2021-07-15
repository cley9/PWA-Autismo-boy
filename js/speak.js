
var bg_blue = new Audio();
bg_blue.src = "Audios/colores/AZUL.wav";

var bg_red = new Audio();
bg_red.src = "Audios/colores/ROJO.wav";

var bg_orange = new Audio();
bg_orange.src = "Audios/colores/NARANJA.wav";

var bg_green = new Audio();
bg_green.src = "Audios/colores/VERDE.wav";

var bg_yellow = new Audio();
bg_yellow.src = "Audios/colores/AMARILLO.wav";

var bg_black = new Audio();
bg_black.src = "Audios/colores/NEGRO.wav";

var bg_lilac = new Audio();
bg_lilac.src = "Audios/colores/LILA.wav";

var bg_gray = new Audio();
bg_gray.src = "Audios/colores/GRIS.wav";



// ------------
var bg_1 = new Audio();
bg_1.src = "Audios/comida/MACARRON.wav";

var bg_2 = new Audio();
bg_2.src = "Audios/comida/SOPA.wav";

var bg_3 = new Audio();
bg_3.src = "Audios/comida/LENTEJA.wav";

var bg_4 = new Audio();
bg_4.src = "Audios/comida/TORTILLA.wav";

var bg_5 = new Audio();
bg_5.src = "Audios/comida/pescado.wav";

var bg_6 = new Audio();
bg_6.src = "Audios/comida/carne.wav";

var bg_7 = new Audio();
bg_7.src = "Audios/comida/CROQUETAS.wav";

var bg_8 = new Audio();
bg_8.src = "Audios/comida/GARBANZO.wav";
// ------------------------------------------
var bg_9 = new Audio();
bg_9.src = "Audios/animales/perro.wav";

var bg_10 = new Audio();
bg_10.src = "Audios/animales/GATO.wav";

var bg_11 = new Audio();
bg_11.src = "Audios/animales/CONEJO.wav";

var bg_12 = new Audio();
bg_12.src = "Audios/animales/PEZ.wav";

var bg_13 = new Audio();
bg_13.src = "Audios/animales/VACA.wav";

var bg_14 = new Audio();
bg_14.src = "Audios/animales/MARIPOSA.wav";

var bg_15 = new Audio();
bg_15.src = "Audios/animales/LORO.wav";
// -----------------------------------------------
var bg_16 = new Audio();
bg_16.src = "Audios/transporte/TREN.wav";

var bg_17 = new Audio();
bg_17.src = "Audios/transporte/BARCO.wav";

var bg_18 = new Audio();
bg_18.src = "Audios/transporte/COCHE.wav";

var bg_19 = new Audio();
bg_19.src = "Audios/transporte/BICICLETA.wav";

var bg_20 = new Audio();
bg_20.src = "Audios/transporte/AVION.wav";

var bg_21 = new Audio();
bg_21.src = "Audios/transporte/FURGONETA.wav";

var bg_22 = new Audio();
bg_22.src = "Audios/transporte/AUTOBUS.wav";

var bg_23 = new Audio();
bg_23.src = "Audios/transporte/MOTO.wav";
// -----------------------------------------------

var bg_24 = new Audio();
bg_24.src = "Audios/cara/ojo.wav";

var bg_25 = new Audio();
bg_25.src = "Audios/cara/NARIZ.wav";

var bg_26 = new Audio();
bg_26.src = "Audios/cara/OREJA.wav";

var bg_27 = new Audio();
bg_27.src = "Audios/cara/BOCA.wav";

var bg_28 = new Audio();
bg_28.src = "Audios/cara/LENGUA.wav";

var bg_29 = new Audio();
bg_29.src = "Audios/cara/PELO.wav";

var bg_30 = new Audio();
bg_30.src = "Audios/cara/PESTAÑA.wav";

var bg_31 = new Audio();
bg_31.src = "Audios/cara/CEJAS.wav";
// -----------------------------------------------

var bg_32 = new Audio();
bg_32.src = "Audios/ropa/CAMISETA.wav";

var bg_33 = new Audio();
bg_33.src = "Audios/ropa/PANTALÓN.wav";

var bg_34 = new Audio();
bg_34.src = "Audios/ropa/FALDA.wav";

var bg_35 = new Audio();
bg_35.src = "Audios/ropa/ABRIGO.wav";

var bg_36 = new Audio();
bg_36.src = "Audios/ropa/CHALECO.wav";

var bg_37 = new Audio();
bg_37.src = "Audios/ropa/CHAQUETA.wav";

var bg_38 = new Audio();
bg_38.src = "Audios/ropa/SUDADERA.wav";

var bg_39 = new Audio();
bg_39.src = "Audios/ropa/VESTIDO.wav";


document.addEventListener('DOMContentLoaded', () => {
  // Obtener todos los elementos "navbar-burger"
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
// Agrega un evento de clic en cada uno de ellos
  if ($navbarBurgers.length > 0) {
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {
        // Obtener el objetivo del atributo "data-target"
        const target = el.dataset.target;
        const $target = document.getElementById(target);
// Alternar la clase "está activo" tanto en "navbar-burger" como en "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

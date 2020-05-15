/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-1.11.1.min.js');
require('./owl.carousel.min.js');
require('./bootstrap.min.js');
require('./wow.min.js');
require('./typewriter.js');
require('./jquery.onepagenav.js');
require('./main.js');

var banniere = document.getElementById('banniere');
var texte = banniere.firstElementChild;
var tailleTexte = banniere.scrollWidth;

function defile() {
    var pos = texte.style.marginLeft.replace('px', '');
    if (pos-100 < -tailleTexte) {
        pos = 1200;
    }
    pos -= 1;
    texte.style.marginLeft = pos + "px";

    setTimeout(defile, 1);
}
defile();

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
if (banniere != null) {
    var texte = banniere.firstElementChild;
    var tailleTexte = banniere.scrollWidth;

    function defile() {
        var pos = texte.style.left.replace('px', '');
        if (pos - 300 < -tailleTexte) {
            pos = 800;
        }
        pos -= 1;
        texte.style.left = pos + "px";

        setTimeout(defile, 1);
    }

    defile();
}

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
import 'bootstrap';
//const img = document.getElementsByTagName('img');

document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});
const add = document.querySelectorAll(".add");

add.forEach(function(e) {
    e.addEventListener("click", (event) => {
        event.preventDefault();
    }, false);
});

// start the Stimulus application
import './bootstrap';
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
const axios = require('axios').default;
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});
const add = document.querySelectorAll("a.add");
const remove = document.querySelectorAll("a.remove");


add.forEach(function(e) {
    e.addEventListener("click", (event) => {
        event.preventDefault();
        const url = e.href;
        axios.get(url).then((response) => {
            alert('Votre article a été ajouté au panier ! \n quantité : ' + response.data.quantité);
            console.log(response.data.quantité);
        });
    });
});


remove.forEach(function(e) {
    e.addEventListener("click", (event) => {
        event.preventDefault();
        const url = e.href;
        axios.get(url).then((response) => {
            if (response.data.quantité) {
                alert('L\'article à été supprimé');
                console.log(response.data.quantité);

            } else {
                alert('le panier est vide');
                console.log(response.data.quantité);
            }

        });
    });
});

// start the Stimulus application
import './bootstrap';
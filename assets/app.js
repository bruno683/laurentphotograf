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
const amount = document.querySelector("td#total");

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

//----------------------PAYPAL-------------------------------
function initPayPalButton() {
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'paypal',
        },

        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{ "amount": { "currency_code": "EUR", "value": amount.nodeValue, "breakdown": { "item_total": { "currency_code": "EUR", "value": 1 }, "shipping": { "currency_code": "EUR", "value": 17 }, "tax_total": { "currency_code": "EUR", "value": 0.1 } } } }]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {

                // Full available details
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                // Show a success message within this page, e.g.
                const element = document.getElementById('paypal-button-container');
                element.innerHTML = '';
                element.innerHTML = '<h3>Thank you for your payment!</h3>';

                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        },

        onError: function(err) {
            console.log(err);
        }
    }).render('#paypal-button-container');
}
initPayPalButton();

// start the Stimulus application
import './bootstrap';
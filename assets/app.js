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
/*const axios = require('axios').default;
*/
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
})/*
const add = document.querySelectorAll("a.add");
const remove = document.querySelectorAll("a.remove");
const amount = document.querySelector("span#total");
const quantity = document.querySelector("span#quantité");
const name = document.querySelector("span#name");
const element = document.getElementById('paypal-button-container');

add.forEach(function(e) {
    e.addEventListener("click", (event) => {
        event.preventDefault();
        const url = e.href;
        axios.get(url).then((response) => {
            alert('Votre article a été ajouté au panier ! \n quantité : ' + response.data.quantité);
            console.log(response.data);
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
/*function initPayPalButton() {
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'paypal',
        },

        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{ "amount": { "currency_code": "EUR", "value": amount.innerHTML, "breakdown": { "item_total": { "currency_code": "EUR", "value": quantity.innerHTML }, "shipping": { "currency_code": "EUR", "value": 17 }, "tax_total": { "currency_code": "EUR", "value": 0.1 } } } }]
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
initPayPalButton();*/
/*paypal.Buttons({

    // Sets up the transaction when a payment button is clicked
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                reference_id: name.innerHTML,
                amount: {
                    currency_code: "EUR",
                    value: amount.innerHTML, // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                }
            }]               
        });
    },
    // after shipping selection
    
    // Finalize the transaction after payer approval
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments.captures[0];
            //alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
    
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Nous vous remercions de votre achat!</h3>';
            //Or go to another URL:  actions.redirect('thank_you.html');
        });
    }
}).render('#paypal-button-container');*/
//-------------------------------------------------LUMYS--------------------------------------------------------------//

// start the Stimulus application
import './bootstrap';
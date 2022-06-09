/* 
40:51 
https://www.youtube.com/watch?v=Dejpejt1atg */
/* PAYPAL */
paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: TotalPay
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        let url = '../../models/capturaPay.php';
        actions.order.capture().then(function (detalles) {

            alert('Pago Realizado');
            return fetch(url, {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    detalles: detalles
                })
            })
            /* console.log(detalles); Detalles*/
        });
    },
    onCancel: function (data) {
        alert('Pago Cancelado');
    }
}).render('#paypal-button-container');
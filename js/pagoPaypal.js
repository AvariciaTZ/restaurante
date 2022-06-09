/* paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '101'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        actions.order.capture().then(function (detalles) {

            alert('Pago Realizado');
             console.log(detalles); Detalles
        });
    },
    onCancel: function (data) {
        alert('Pago Cancelado');
    }
}).render('#paypal-button-container'); */
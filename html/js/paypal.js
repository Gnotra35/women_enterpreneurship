function initPayPalButton() {
  paypal.Buttons({
    style: {
      shape: "rect",
      color: "gold",
      layout: "vertical",
      label: "paypal",
    },

    createOrder: function (data, actions) {
      const userInput = document.getElementById("donate-amount").value;
      const paypalAmount = parseFloat(userInput) / 100;
      return actions.order.create({
        purchase_units: [
          { amount: { currency_code: "USD", value: paypalAmount } },
        ],
      });
    },

    onApprove: function (data, actions) {
      return actions.order.capture().then(function (orderData) {
        document.getElementById("paypal-button-container").innerHTML =
          "<h3>Thank you for your payment!</h3>";
      });
    },

    onError: function (err) {
      console.error(err);
    },
  }).render("#paypal-button-container");
}

initPayPalButton();

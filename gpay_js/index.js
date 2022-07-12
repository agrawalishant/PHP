 let googlePayClient;
 
function onGooglePayLoaded() {
  googlePayClient = new google.payments.api.PaymentsClient({
    environment: 'TEST'
  });
  
  googlePayClient.isReadyToPay(googlePayBaseConfiguration)
  .then(function(response) {
    if(response.result) {
      createAndAddButton();
    } else {
      alert("Unable to pay using Google Pay");
    }
  }).catch(function(err) {
    console.error("Error determining readiness to use Google Pay: ", err);
  });
  
 
}

const baseCardPaymentMethod = {
  type: 'CARD',
  parameters: {
    allowedCardNetworks: ['VISA','MASTERCARD'],
    allowedAuthMethods: ['PAN_ONLY','CRYPTOGRAM_3DS']
  }
};

const googlePayBaseConfiguration = {
  apiVersion: 2,
  apiVersionMinor: 0,
  allowedPaymentMethods: [baseCardPaymentMethod]
};


function createAndAddButton() {

  const googlePayButton = googlePayClient.createButton({

    // currently defaults to black if default or omitted
    buttonColor: 'default',

    // defaults to long if omitted
    buttonType: 'long',

    onClick: onGooglePaymentsButtonClicked
  });

  document.getElementById('buy-now').appendChild(googlePayButton);
}

function onGooglePaymentsButtonClicked() {
  // TODO: Perform transaction
  const tokenizationSpecification = {
  type: 'PAYMENT_GATEWAY',
  parameters: {
    gateway: 'example',
    gatewayMerchantId: 'gatewayMerchantId'
  }
};

const cardPaymentMethod = {
  type: 'CARD',
  tokenizationSpecification: tokenizationSpecification,
  parameters: {
    allowedCardNetworks: ['VISA','MASTERCARD'],
    allowedAuthMethods: ['PAN_ONLY','CRYPTOGRAM_3DS'],
    billingAddressRequired: true,
    billingAddressParameters: {
      format: 'FULL',
      phoneNumberRequired: true
    }
  }
};

const transactionInfo = {
  totalPriceStatus: 'FINAL',
  totalPrice: '123.45',
  currencyCode: 'USD'
};

const merchantInfo = {
  // merchantId: '01234567890123456789', Only in PRODUCTION
  merchantName: 'Example Merchant Name'
};

const paymentDataRequest = Object.assign({}, googlePayBaseConfiguration, {
  allowedPaymentMethods: [cardPaymentMethod],
  transactionInfo: transactionInfo,
  merchantInfo: merchantInfo   
});

}

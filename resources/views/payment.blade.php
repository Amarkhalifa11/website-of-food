@extends('layouts.main')
@section('content')
    <h3 class="text-center">payment page</h3>

    @if (Session::has('total_price'))
      @if (Session::has('order_id'))
          <h4 style="color: blue; margin-top: 20px ;" class="text-center">total : {{ Session::get('total_price') }} </h4>
               <!-- Set up a container element for the button -->
               <div class="text-center" style="margin-top: 20px" id="paypal-button-container"></div>
      @endif
    @endif



     <!-- Replace "test" with your own sandbox Business account app client ID -->
     <script src="https://www.paypal.com/sdk/js?client-id=AcCG2j9mhEyFwVB1YJxGVvnGLa7G5D6Iw4EgU9zmg-cCl4Fmw-xnJ-ed9LP8PRnMJZplFahHQ_j8oq11&currency=USD"></script>
     <!-- Set up a container element for the button -->
     <div id="paypal-button-container"></div>
     <script>
       paypal.Buttons({
         // Sets up the transaction when a payment button is clicked
         createOrder: (data, actions) => {
           return actions.order.create({
             purchase_units: [{
               amount: {
                 value: '{{Session::get('total_price')}}' // Can also reference a variable or function
               }
             }]
           });
         },
         // Finalize the transaction after payer approval
         onApprove: (data, actions) => {
           return actions.order.capture().then(function(orderData) {
             // Successful capture! For dev/demo purposes:
             console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
             const transaction = orderData.purchase_units[0].payments.captures[0];
             alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);


             window.location.href = "/verify/"+transaction.id;

             
             // When ready to go live, remove the alert and show a success message within this page. For example:
             // const element = document.getElementById('paypal-button-container');
             // element.innerHTML = '<h3>Thank you for your payment!</h3>';
             // Or go to another URL:  actions.redirect('thank_you.html');
           });
         }
       }).render('#paypal-button-container');
     </script>

@endsection

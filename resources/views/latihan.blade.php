<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-6LBEP-uy0zTyNi4b"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <button id="pay-button">Pay!</button>

    <form action="/latihan/home" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json_response" id="json_callback">
        <input type="hidden" name="uname" value="{{request()->get('uname')}}">
        <input type="hidden" name="email" value="{{request()->get('email')}}">
        <input type="hidden" name="number" value="{{request()->get('number')}}">
        <input type="hidden" name="harga_anda" value="{{request()->get('harga_anda')}}">
        <input type="hidden" name="quantity_anda" value="{{request()->get('quantity_anda')}}">
        <input type="hidden" name="nama_makanan" value="{{request()->get('nama_makanan')}}">
    </form>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snap_token}}', {
                onSuccess: function (result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

    </script>

    <script>
        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            // alert(document.getElementById('json_callback').value)
            $('#submit_form').submit();
        }
    </script>
</body>

</html>

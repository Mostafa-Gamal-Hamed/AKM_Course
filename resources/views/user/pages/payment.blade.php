@extends('user.layout')

@section('Title')
    Payment
@endsection

@section('Body')
    {{-- Header --}}
    <h1 class="header text-center mt-5 mb-5">Payment</h1>

    <div class="container mb-5">

    </div>

    {{-- <div id="fawaterkDivId"></div>
    <script src="https://app.fawaterk.com/fawaterkPlugin/fawaterkPlugin.min.js"></script>
    <script>
        var pluginConfig = {
            envType: "live",
            hashKey: "195943343f95806e3a5c289b32506fe7c95b5dc40ec2d62d5d35e8ca7a3c295c",
            requestBody: {
                "cartTotal": "{{ $details['price'] }}",
                "currency": "{{ $details['currency'] }}",
                "customer": {
                    "first_name": "{{ $details['firstName'] }}",
                    "last_name": "{{ $details['lastName'] }}",
                    "email": "{{ $details['email'] }}",
                    "phone": "{{ $details['number'] }}"
                },
                "redirectionUrls": {
                    "successUrl": "https://dev.fawaterk.com/success",
                    "failUrl": "https://dev.fawaterk.com/fail",
                    "pendingUrl": "https://dev.fawaterk.com/pending"
                },
                "cartItems": [{
                        "name": "AKM",
                        "price": "{{ $details['price'] }}",
                        "quantity": "1"
                    }
                ],
                "payLoad": {
                    "custom_field1": "xyz",
                    "custom_field2": "xyz2"
                }
            }
        };

        function generateHashKey($data) {
            $secretKey = "e136c04ddaac6c30fd86f742124e68c8d980cc0a651df9e96f";
            $queryParam = "Domain=https://akmcourse.com/payment&ProviderKey=FAWATERAK.19008";
            $hash = hash_hmac('sha256', $queryParam, $secretKey, false);
            return $hash;
        }
        fawaterkCheckout(pluginConfig);
    </script> --}}
@endsection

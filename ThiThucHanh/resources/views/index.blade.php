<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/zogin/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Aug 2021 15:02:16 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css%2bfont-awesome.min.css%2belegant-icons.css%2bnice-select.css%2bbarfiller.css%2bowl.carousel.min.css%2bslicknav.min.css%2bstyle.css.pagespeed.cc.pxOhNsQAeq.css" type="text/css" />

    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>
<body>

<!--Shopping Cart Section Begin -->
<div class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td class="total-price first-row"><img src="front/img/{{$product->avatar}}"></td>
                            <td>{{$product->product_code}}</td>
                            <td class="cart-title filter-row">{{$product->name}}</td>
                            <td class="p-price filter-row">${{$product->price}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Section End -->



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js%2bjquery.nice-select.min.js%2bjquery.barfiller.js%2bjquery.slicknav.js.pagespeed.jc.TI2FwaBMAf.js"></script><script>eval(mod_pagespeed_KLSdHHJRkq);</script>
<script>eval(mod_pagespeed_u7c5sEkfau);</script>
<script>eval(mod_pagespeed_YlzCvQeR5G);</script>
<script>eval(mod_pagespeed_ZINUlBTRhK);</script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script defer src="../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"683538836f373c8e","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.8.1","si":10}'></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/zogin/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Aug 2021 15:02:30 GMT -->
</html>


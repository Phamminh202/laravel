<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('/')}}">
    <title>Create</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css%2bfont-awesome.min.css%2belegant-icons.css%2bnice-select.css%2bbarfiller.css%2bowl.carousel.min.css%2bslicknav.min.css%2bstyle.css.pagespeed.cc.pxOhNsQAeq.css" type="text/css" />
    <link href="front/css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="top_19">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <h2>Create product</h2>
                </div>
                <div class="col-md-auto">
                    <form action="/search" method="get">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                    </form>
                </div>

            </div>
            <form action="{{route('store')}}" method="post" class="form_19">
                @csrf
                <h5 class="text_19">Fill in product information</h5>
                <div class="row1">
                    <div class="row">
                        <div class="col">
                            <label for="code"><span>Code</span></label><br>
                            <input type="text" name="product_code" required="required" placeholder="Code...">
                        </div>
                        <div class="col">
                            <label for="name"><span>Name</span></label><br>
                            <input type="text" name="name" required="required" placeholder="Name...">
                        </div>

                    </div>
                </div>
                <div class="row2">
                    <div class="row">
                        <div class="col">
                            <label for="price"><span>Price</span></label><br>
                            <input type="text" name="price" required="required" placeholder="Price...">
                        </div>
                        <div class="col">
                            <label for="avatar"><span>Avatar</span></label><br>
                            <input type="file" name="avatar" required="required" placeholder="">
                        </div>

                    </div>
                </div>
                <button class="btn btn-success" style="width: 100px; height:40px; margin-top: 20px">Create</button>
            </form>
        </div>
    </div>
    <br>
    <table class="table table-bordered" style="width: 1170px;margin-left: 120px;margin-top: 20px">
        <thead>
        <tr>
            <th>Product_code</th>
            <th>Name</th>
            <th>Price</th>
            <th>Avatar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->product_code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->avatar}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


</body>
</html>

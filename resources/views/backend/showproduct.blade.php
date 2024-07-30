<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1 col-sm-12">
                <h1 class="text-center text-success">PRODUCT LIST</h1>
                <a href="{{ Route('addproduct') }}" class="btn btn-success my-3">Add Product</a>

                <table class="table table-striped border text-center">
                    <tr>
                        <th>SI No</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $sl = 1; ?>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $sl }}</td>
                        <td>{{ $product->pname }}</td>
                        <td>{{ $product->pdes }}</td>
                        <td>{{ $product->cat }}</td>
                        <td>{{ $product->scat }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if($product->status==1)
                                <a href="{{ Route('status',$product->id) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i></a>
                            @else
                                <a href="{{ Route('status',$product->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-check"></i></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ Route('editproduct',$product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$product->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php $sl++; ?>

                    <!--Delete Modal -->
                    <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="DeleteModalLabel">Confirm</h5>
                                </div>
                                <div class="modal-body">
                                    Do you want to delete this product?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <a href="{{ Route('delete',$product->id) }}" class="btn btn-danger">Yes</a>
                                    <!-- <button type="button" class="btn btn-danger">Yes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-success p-5 mt-5">
            <p>This is the Footer</p>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>

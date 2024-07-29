<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center text-success">EDIT PRODUCT</h1>
                <form action="{{ Route('update',$product->id) }}" method="POST">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="pname">Product Name:</label>
                        <input type="text" name="pname" value="{{ $product->pname }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="pdes">Product Description:</label>
                        <input type="text" name="pdes" value="{{ $product->pdes }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="cat">Category:</label>
                        <input type="text" name="cat" value="{{ $product->cat }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="scat">Sub Category:</label>
                        <input type="text" name="scat" value="{{ $product->scat }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="price">Product Price:</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control">
                            <option disabled>---Select--Status---</option>
                            <option value="1" @if ($product->status==1) selected @endif>Active</option>
                            <option value="2" @if ($product->status==2) selected @endif>Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-success mt-3 form-control">Update Product</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
     <div class="bg-success p-5 mt-5">
            <p>This is the Footer</p>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>

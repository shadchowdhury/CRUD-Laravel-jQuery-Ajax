<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokan Dari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h1>This is Home page</h1>
        
            
        <a href="{{ Route('addproduct') }}" class="btn btn-success">Add Product</a>
        <a href="{{ Route('showproduct') }}" class="btn btn-info">Show Product</a>
        <a href="{{ Route('addemployee') }}" class="btn btn-success">Add Employee</a>
    
        
        
        
    </div>


</body>
</html>
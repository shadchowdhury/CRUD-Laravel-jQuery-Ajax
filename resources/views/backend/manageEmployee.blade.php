<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <h1 class="text-center text-success">ADD EMPLOYEE</h1>

                    <div class="msg">

                    </div>

                    <div class="form-group mt-3">
                        <label for="fName">First Name:</label>
                        <input type="text" id="fName" class="fName form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="lName">Last Name:</label>
                        <input type="text" id="lName" class="lName form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="address">Address:</label>
                        <textarea class="address form-control" id="address" cols="30" rows="2"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" class="phone form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="text" id="email" class="email form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="status">Status:</label>
                        <select id="status" class="status form-control">
                            <option selected disabled>---Select--Status---</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                    </select>
                    </div>
                    <button class="btn btn-success my-5 form-control addemployee">Add Employee</button>

            </div>

            <div class="col-md-8">
                <table class="table table-striped" border="1">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="alldata">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-info text-center mt-2">
        <p class="text-danger p-5">This is footer</p>
    </div>


<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
      </div>
      <div class="modal-body">
        Do You Want To Delete This Employee?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
        <button type="button" class="btnDelete btn btn-danger" value="">Yes</button>
      </div>
    </div>
  </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
      </div>
      <div class="modal-body">
            <div class="form-group mt-2">
                <label for="fName">First Name:</label>
                <input type="text" id="EfName" class="form-control" value="">
            </div>
            <div class="form-group mt-2">
                <label for="lName">Last Name:</label>
                <input type="text" id="ElName" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="address">Address:</label>
                <textarea class="form-control" id="Eaddress" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="phone">Phone Number:</label>
                <input type="text" id="Ephone" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email:</label>
                <input type="text" id="Eemail" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="status">Status:</label>
                <select id="Estatus" class="form-control">
                    <option disabled>---Select--Status---</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
        <button type="button" class="update btn btn-danger" value="">Update</button>
      </div>
    </div>
  </div>
</div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Remove Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <div class="container d-flex justify-content-center pt-5">
        <div class="col-md-9">
            <h2 class="text-center pb-3 text-danger">Add Or Remove Multiple Input Fields In Laravel</h2>

            <form wire:submit.prevent="AddStudent" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table table-bordered" id="table">
                    <tr>
                        <th>Firstname</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="inputs[0][firstname]" placeholder="Enter your firstname" class="form-control"></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
        
                <button type="submit" class="btn btn-primary col-md-2">Save</button>
            </form>
        </div>
    </div>

    {{-- Menambah field input data dan menghapus input field data  --}}
    <script>
        var i = 0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `<tr>
                    <td>
                        <input type="text" name="inputs[`+i+`][firstname]" placeholder="Enter your firstname" class="form-control" />
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                    </td>
                </tr>`
            );
        })

        $(document).on('click','.remove-table-row', function(){
            $(this).parents('tr').remove();
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
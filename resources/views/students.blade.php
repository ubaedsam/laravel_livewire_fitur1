<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
    
    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Students 
                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#studentModal">Tambah Student</a>
                            <a href="#" class="btn btn-danger" id="deleteAllSelectedRecord">Hapus Yang Dipilih</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="chkCheckAll"></th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr id="sid{{ $student->id }}">
                                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $student->id }}"></td>
                                            <td>{{ $student->firstname }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editStudent({{ $student->id }})" class="btn btn-info">Edit</a>
                                                <a href="javascript:void(0)" onclick="deleteStudent({{ $student->id }})" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <!-- Tambah Data Student Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Baru Student</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="studentForm">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Ubah Data Student Modal -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Student</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="studentEditForm">
                    @csrf
                    <input type="hidden" id="id" name="id" />
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname2">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname2">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email2">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone2">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    {{-- Proses Tambah Data Ajax --}}
    <script>
        $("#studentForm").submit(function(e){
            e.preventDefault();

            let firstname = $("#firstname").val();
            let lastname = $("#lastname").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{route('student.add')}}",
                type:"POST",
                data:{
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function(response)
                {
                    if(response)
                    {
                        $("#studentTable tbody").prepend('<tr><td>'+ response.firstname +'</td><td>'+ response.lastname +'</td><td>'+ response.email +'</td><td>'+ response.phone +'</td></tr>');
                        $("#studentForm")[0].reset();
                        $("#studentModal").modal('hide');
                    }
                }
            });
        });
    </script>

    {{-- Proses Ubah Data Ajax --}}
    <script>
        // Mengambil data student berdasarkan id ke dalam box modal
        function editStudent(id)
        {
            $.get('/studentss/'+id,function(student){
                $("#id").val(student.id);
                $("#firstname2").val(student.firstname);
                $("#lastname2").val(student.lastname);
                $("#email2").val(student.email);
                $("#phone2").val(student.phone);
                $("#studentEditModal").modal('toggle');
            });
        }

        // Menyimpan data student yang sudah diubah berdasarkan id
        $("#studentEditForm").submit(function(e){
            e.preventDefault();

            let id = $("#id").val();
            let firstname = $("#firstname2").val();
            let lastname = $("#lastname2").val();
            let email = $("#email2").val();
            let phone = $("#phone2").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url:"{{ route('student.update') }}",
                type:"PUT",
                data:{
                    id:id,
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function(response){
                    $('#sid'+ response.id +' td:nth-child(1)').text(response.firstname);
                    $('#sid'+ response.id +' td:nth-child(2)').text(response.lastname);
                    $('#sid'+ response.id +' td:nth-child(3)').text(response.email);
                    $('#sid'+ response.id +' td:nth-child(4)').text(response.phone);
                    $("#studentEditModal").modal('toggle');
                    $("#studentEditForm")[0].reset();
                }
            })
        })
    </script>

    {{-- Proses Hapus Data --}}
    <script>
        function deleteStudent(id)
        {
            if(confirm("Apakah anda yakin ingin menghapus data student ini ?"))
            {
                $.ajax({
                    url: '/studentss/'+id,
                    type:'DELETE',
                    data:{
                        _token : $("input[name=_token]").val()
                    },
                    success:function(response)
                    {
                        $("#sid"+id).remove();
                    }
                });
            }
        }
    </script>

    {{-- Proses Hapus Data menggunakan checkbox (yang dipilih) --}}
    <script>
        $(function(e){
            $("#chkCheckAll").click(function(){
                $(".checkBoxClass").prop('checked',$(this).prop('checked'));
            });

            $("#deleteAllSelectedRecord").click(function(e){
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{ route('student.deleteSelected') }}",
                    type:"DELETE",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids:allids
                    },
                    success:function(response){
                        $.each(allids,function(key,val){
                            $("#sid"+val).remove();
                        })
                    }
                });
            })
        });
    </script>

</body>
</html>
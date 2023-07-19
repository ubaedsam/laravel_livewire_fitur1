<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daerah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <h1 style="margin-bottom: 15px;">Dropdown Daerah</h1>
            <div class="col-md-8">
                <label for="exampleFormControlInput1" class="form-label">Provinsi</label>
                <select class="form-select" id="provinsi">
                    <option selected>Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <label for="exampleFormControlInput1" class="form-label">Kabupaten</label>
                <select class="form-select" id="kabupaten">
                </select>
            </div>
            <div class="col-md-8">
                <label for="exampleFormControlInput1" class="form-label">Kecamatan</label>
                <select class="form-select" id="kecamatan">
                </select>
            </div>
            <div class="col-md-8">
                <label for="exampleFormControlInput1" class="form-label">Desa</label>
                <select class="form-select" id="desa">
                </select>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $(function(){

                // Untuk menampilkan data kabupaten
                $('#provinsi').on('change',function(){
                    let id_provinsi = $('#provinsi').val();

                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getkabupaten') }}",
                        data : {id_provinsi:id_provinsi},
                        cache : false,

                        success : function(msg){
                            $('#kabupaten').html(msg);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })

                // Untuk menampilkan data kecamatan
                $('#kabupaten').on('change',function(){
                    let id_kabupaten = $('#kabupaten').val();

                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getkecamatan') }}",
                        data : {id_kabupaten:id_kabupaten},
                        cache : false,

                        success : function(msg){
                            $('#kecamatan').html(msg);
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })

                // Untuk menampilkan data desa
                $('#kecamatan').on('change',function(){
                    let id_kecamatan = $('#kecamatan').val();

                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getdesa') }}",
                        data : {id_kecamatan:id_kecamatan},
                        cache : false,

                        success : function(msg){
                            $('#desa').html(msg);
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    })
                })
            })
        })
    </script>
</body>
</html>
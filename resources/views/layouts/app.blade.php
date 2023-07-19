<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    {{-- Digunakan untuk memanggil library livewire --}}
    @livewireStyles

</head>
<body>

    {{-- Digunakan untuk memanggil data inti di dalam program --}}
    {{ $slot }}
    
    {{-- Digunakan untuk memanggil library livewire --}}
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.livewire.on('studentAdded',()=>{
            $('#addStudentModal').modal('hide');
        });

        window.livewire.on('studentUpdated',()=>{
            $('#updateStudentModal').modal('hide');
        });

        window.livewire.on('fileUploaded',()=>{
            $('#form-upload')[0].reset();
        });

        window.livewire.on('imagesUploaded',()=>{
            $('#upload-images')[0].reset();
        });
    </script>
</body>
</html>
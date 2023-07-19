<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asuransi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Ratio</th>
                <th scope="col">Branch</th>
                <th scope="col">Name</th>
                <th scope="col">Premi</th>
                <th scope="col">Target</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($data as $dataAsuransi)
                @foreach ($dataAsuransi as $item)
                @php
                $no++;
            @endphp
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $item['title'] }}</td>
                {{--  <td>{{ $dataAsuransi['BRANCH'] }}</td>
                <td>{{ $dataAsuransi['Name'] }}</td>
                <td>{{ $dataAsuransi['PREMI'] }}</td>
                <td>{{ $dataAsuransi['TARGET'] }}</td>  --}}
            </tr>
                @endforeach
            
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
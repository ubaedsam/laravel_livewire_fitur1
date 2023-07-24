<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="mx-auto mt-4">
                <div class="mb-3">
                  <label class="form-label">Provinsi</label>
                  <select class="form-select" wire:model="selectedProvince">
                    <option selected>Choose Provinsi</option>
                    @foreach ($provincies as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                  </select>
                </div>
                @if (!is_null($regencies))
                <div class="mb-3">
                    <label class="form-label">Kabupaten</label>
                    <select class="form-select" wire:model="selectedRegency">
                      <option selected>Choose Kabupaten</option>
                      @foreach ($regencies as $regency)
                      <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                      @endforeach
                    </select>
                </div>
                @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
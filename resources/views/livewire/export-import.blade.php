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
        <div class="row">
            {{--  <div class="col-md-12 mt-5 mb-5">
                <div class="d-flex justify-content-between">
                    @if ($selectedRows)
                    <div>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option><a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a></option>
                            <option><a wire:click.prevent="markAllAsHRD" class="dropdown-item" href="#">Mark as HRD</a></option>
                            <option><a wire:click.prevent="markAllAsIT" class="dropdown-item" href="#">Mark as IT</a></option>
                        </select>

                        <span class="ml-2">Selected {{ count($selectedRows) }} {{ Str::plural('department', count($selectedRows)) }}</span>
                    </div>
                    @endif
                    
                </div>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input wire:click="filterEmployeesByDepartment" type="radio" class="btn-check {{ is_null($department) ? 'btn-secondary' : 'btn-default' }}" name="btnradio" id="btnradio1" autocomplete="off" checked>
                  <label class="btn btn-outline-primary" for="btnradio1">All {{ $employeesCount }}</label>
                
                  <input wire:click="filterEmployeesByDepartment('HRD')" type="radio" class="btn-check {{ ($department === 'HRD') ? 'btn-secondary' : 'btn-default' }}" name="btnradio" id="btnradio2" autocomplete="off">
                  <label class="btn btn-outline-primary" for="btnradio2">HRD {{ $hrdEmployeesCount }}</label>
                
                  <input wire:click="filterEmployeesByDepartment('IT')" type="radio" class="btn-check {{ ($department === 'IT') ? 'btn-secondary' : 'btn-default' }}" name="btnradio" id="btnradio3" autocomplete="off">
                  <label class="btn btn-outline-primary" for="btnradio3">IT {{ $itEmployeesCount }}</label>
                </div>
            </div>  --}}
            <div class="col-md-12 mt-5">
                <div class="mx-auto">
                    <div class="card">
                        <table class="table">
                            <thead>
                              <tr>
                                {{--  <th>
                                  <div class="icheck-primary d-inline ml-2">
                                    <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                    <label for="todoCheck2"></label>
                                  </div>
                                </th>  --}}
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Department</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($employees as $employee)
                              <tr>
                                {{--  <th style="width: 10px;">
                                  <div class="icheck-primary d-inline">
                                    <input wire:model="selectedRows" type="checkbox" value="{{ $employee->id }}" name="todo2" id="{{ $employee->id }}">
                                    <label for="{{ $employee->id }}"></label>
                                  </div>
                                </th>  --}}
                                {{--  <th scope="row">{{ $loop->iteration }}</th>  --}}
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>
                                  <a href="" wire:click.prevent="confirmEmployeeRemoval({{ $employee->id }})">
                                    Hapus
                                  </a>
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

    <script>
      window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            Livewire.emit('deleteConfirmed');
          }
        })
      });

      window.addEventListener('deleted', event => {
        Swal.fire(
          'Deleted!',
          event.detail.message,
          'success'
        )
      })
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
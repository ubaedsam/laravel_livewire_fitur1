<div>
    <style>
        nav svg{
            height: 20px;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Semua User</h3>
                        </div>
                        <div class="card-body">
                            <form action="/" method="get">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">  
                                    </div>
                                    {{--  <div class="col-sm-3">
                                        <label for="" class="form-label">Min Age</label>
                                        <input name="number" type="number" class="form-control" placeholder="Age" value="{{isset($_GET['age']) ? $_GET['age'] : ''}}">  
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">-</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>  --}}
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

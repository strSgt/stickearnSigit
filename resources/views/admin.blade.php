@extends('layoutsAdmin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Email</th>
                          <th scope="col">Benar</th>
                          <th scope="col">Salah</th>
                          <th scope="col">Nilai</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php $i=1;
                        foreach ($query as $row){ 
                    ?>
                        <tr>
                          <th scope="row">{{ $i }}</th>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email }}</td>
                          <td>{{ $row->benar }}</td>
                          <td>{{ $row->salah }}</td>
                          <td>{{ $row->nilai }}</td>
                          <td><a href="/admin/{{ $row->id }}" class="badge badge-info">Update</a>
                            <a href="/admin_hapus/{{ $row->id }}" class="badge badge-danger">Delete</a></td>
                        </tr>
                        <?php 
                        $i++;
                        }
                        ?>
                      </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
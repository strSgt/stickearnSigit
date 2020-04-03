@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                  <thead class="table-active">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Level</th>
                      <th scope="col">Pertanyaan</th>
                      <th scope="col">Jawaban</th>
                      <th scope="col">Hasil</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php $i=1;
                 foreach ($jawaban as $row){ 
                     ?>
                    <tr>
                      <th scope="row">{{ $i }}</th>
                      <td>{{ $row->level }}</td>
                      <td>{{ $row->klu }}</td>
                      <td>{{ $row->jawaban }}</td>
                      <td>{{ $row->point }}</td>
                  
                    </tr>
                <?php $i++;
                 } ?>
            </tbody>
        </table>

                </div>
                <div class="container">
                    <a href="/profile" class="btn btn-warning">Kembali</a>
                </div>
        </div>
    </div>
</div>
@endsection

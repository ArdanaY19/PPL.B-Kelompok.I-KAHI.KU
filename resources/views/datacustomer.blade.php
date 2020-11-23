@extends('layouts.master')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rekap Data Customer</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Depan</th>
                      <th>Nama Belakang</th>
                      <th>Tanggal Lahir</th>
                      <th>Email</th>
                      <th>NO HP</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Malik</td>
                        <td>Ibrahim</td>
                        <td>1994-06-07</td>
                        <td>malik@gmail.com</td>
                        <td>08771929102</td>
                        <td>Kaduragen</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Walid</td>
                        <td>Sudarso</td>
                        <td>1999-10-05</td>
                        <td>walid@gmail.com</td>
                        <td>082319231829</td>
                        <td>Malang</td>
                    </tr>
                </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection
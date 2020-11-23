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
                        <td>Johan</td>
                        <td>Firmansyah</td>
                        <td>1994-06-05</td>
                        <td>johan@gmail.com</td>
                        <td>08192310122</td>
                        <td>kaudakd</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Weka</td>
                        <td>Dasrsono</td>
                        <td>1995-01-23</td>
                        <td>weka@gmail.com</td>
                        <td>09239418123</td>
                        <td>Banyuwangi</td>
                    </tr>
                </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection
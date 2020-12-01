@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-user"></i> Data Customer </h3>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Tanggal Lahir</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($customers as $customer)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td class="text-uppercase">{{ $customer->nama }}</td>
                                <td class="text-uppercase">{{ $customer->user->username }}</td>
                                <td>{{ $customer->user->email }}</td>
                                <td>{{ $customer->tanggal_lahir }}</td>
                                <td>{{ $customer->no_hp }}</td>
                                <td class="text-uppercase">{{ $customer->alamat }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

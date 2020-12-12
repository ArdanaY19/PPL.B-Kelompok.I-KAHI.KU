@extends('petani.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/petani/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pendapatan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center font-weight-bold">Pendapatan </h3>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Total Produk Terjual</th>
                                <th>Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($data as $d)
                                <tr class="text-center">
                                    <td>{{ number_format($d->produk) }} kg</td>
                                    <td>Rp. {{ number_format($d->total + $d->kodeunik) }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="{{ url('/customer/artikel') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/customer/artikel') }}">Artikel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul_artikel }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('foto_artikel') }}/{{ $artikel->foto_artikel }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6">
                            <h2>{{ $artikel->judul_artikel }}</h2>
                            <table class="table text-justify">
                                <tbody>
                                    <tr>
                                        <td>{{ $artikel->deskripsi_artikel }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
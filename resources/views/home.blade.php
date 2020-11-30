@extends('layouts.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- 404 Error Text -->
  <div class="text-center">
    <div class="error mx-auto" data-text="KAHI.KU">KAHI.KU</div>
    <p class="lead text-gray-800 mb-5">selamat datang {{auth()->user()->username}}</p>
    <p class="text-gray-500 mb-0">silahkan menikmati fitur website kami</p>
  </div>
</div>
<!-- /.container-fluid -->

@endsection
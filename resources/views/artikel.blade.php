@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10">
        <div class="post-preview">
          <a href="{{ route('showartikel') }}">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
      </div>
    </div>
</div>

@endsection
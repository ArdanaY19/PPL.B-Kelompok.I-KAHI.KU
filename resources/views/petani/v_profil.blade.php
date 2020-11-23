<style type="text/css">
  .border{
    border-color: #ebebeb;
    border-style: solid;
    border-width: 0 1px 1px;
    background-color: #EAEAEA;
  }
</style>

@extends('layouts.master')

@section('content')
   <!-- Content -->
   <div id="mission-section" class="ptb ptb-xs-180">
      <div class="container">
         @if(session('message'))
          <div class="alert alert-success" role="alert">
          {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
      @if(session('success'))
        <div class="alert alert-success" role="alert">
         {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
  <!-- End Modal -->
  <div class="row">
          <div class="col-md-12 col-lg-12 dark-bg our-vision light-color">
            <div class="block-title v-line mb-35" style="border-color: #0F8CBF">
              <h1 class="row d-flex align-items-center">
                <span class="col-md-10" style="color: #0000FF">@<span></span>{{auth()->user()->nama_depan}}<span></span>'s Profile</span> 
                <a class="col-md-2" href="/profilku/setting/{{auth()->user()->id}}" style="font-size: 20px;"><i class="fa fa-cog mr4"></i>&nbsp;Edit Profile</a>
                </h1>
              <h3 class="ml-15" style="text-decoration: underline; color: #696969">
               {{auth()->user()->role}}
              </h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 border">
            <div class="about-block clearfix">
              <div class="text-box pt-15 pb-0 pl-70 pl-xs-0 width-75per fl">
                <br>
                <div class="box-title" style="color: #696969">
                  <h1>{{auth()->user()->nama_depan}} {{auth()->user()->nama_belakang}}</h1>
                </div>
                <br>
                <div class="text-content" style="color: #696969">
                  <p><i class="fa fa-address-book"></i>&nbsp;Nama Depan : <span></span>{{auth()->user()->nama_depan}}</p>
                  <p><i class="fa fa-user-circle"></i>&nbsp;Nama Belakang : <span></span>{{auth()->user()->nama_belakang}}</p>
                  <p><i class="fa fa-birthday-cake"></i>&nbsp;Tanggal Lahir : <span></span>{{auth()->user()->tanggal_lahir}}</p>
                  <p><i class="fa fa-envelope"></i>&nbsp;Email : <span></span>{{auth()->user()->email}}</p>
                   <p><i class="fa fa-phone"></i>&nbsp;No HP : <span></span>{{auth()->user()->no_hp}}</p>
                   <p><i class="fa fa-map-marker"></i>&nbsp;Alamat : <span></span>{{auth()->user()->alamat}}</p>
                   <hr>
                </div>
              </div>
              
            </div>
          </div>
          <p style="color: #696969">Bergabung pada {{auth()->user()->created_at}}</p>
        </div>
        
        </div>
         </div>

          </div>
        </div>
      </div>
    </div>
@endsection

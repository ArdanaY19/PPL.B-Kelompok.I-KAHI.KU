@extends(layouts.master')
@section('content')
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <h5>Edit Profile</h5>
                    <form action="/petani/{{auth()->user()->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="Nama Depan" id="nama_depan" name="nama_depan" value="{{auth()->user()->nama_depan}}">
                        <input type="text" placeholder="Nama Belakang" id="nama_belakang" name="nama_belakang" value="{{auth()->user()->nama_belakang}}">
                        <input type=" date" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="{{auth()->user()->tanggal_lahir}}">
                        <input type=" text" placeholder="NO HP" id="no_hp" name="no_hp" value="{{auth()->user()->no_hp}}">
                        <input type=" email" placeholder="Email" id="email" name="email" value="{{auth()->user()->email}}">
                        <input type=" text" placeholder="Alamat" id="alamat" name="alamat" value="{{auth()->user()->pelanggan->alamat}}">
                        <!-- <textarea placeholder=" Message"></textarea> -->
                        <button type="submit" class="site-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

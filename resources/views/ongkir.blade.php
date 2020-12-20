@extends('customer.layouts.master')

@section('header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">
        <div class="col-sm-12 mt-2">
            <h2 class="text-center">Cek Ongkir</h2 class="text-center">
        </div>
      </div>
      <div class="card-body">
          <form action="{{url('/ongkir')}}" method="get">
              @csrf
              <div class="row">
                  <div class="col-sm-6">
                      <h6>Kirim Dari</h6>
                      <div class="form-group">
                          <select name="province_from" id="province" class="form-control">
                              <option value="" holder>Pilih Provinsi</option>
                              @foreach($provinsi as $result)
                                <option value="{{ $result->id }}">{{ $result->province }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="origin" id="origin" class="form-control" required>
                              <option value="" holder>Pilih Kota</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <h6>Kirim Ke</h6>
                      <div class="form-group">
                          <select name="province_to" id="province" class="form-control">
                              <option value="" holder>Pilih Provinsi</option>
                              @foreach($provinsi as $result)
                                <option value="{{ $result->id }}">{{ $result->province }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="destination" id="destination" class="form-control" required>
                              <option value="" holder>Pilih Kota</option>
                          </select>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-sm-6">
                      <h6>Berat Paket</h6>
                      <div class="form-group">
                          <input name="weight" type="number" class="form-control" required>
                          <small>Dalam gram contoh: 1700 = 1,7kg</small>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <h6>Pilih Kurir</h6>
                      <select name="courier" required class="form-control">
                          <option value="" holder>Pilih Kurir</option>
                          <option value="jne">JNE</option>
                          <option value="tiki">TIKI</option>
                          <option value="pos">POS</option>
                      </select>
                  </div>
              </div>

              <div class="row">
                  <div class="col">
                      <button type="submit" class="btn btn-success btn-block">Cek Ongkir</button>
                  </div>
              </div>
          </form>
          @if($cekongkir)
          <div class="row">
              <div class="col-sm-12 mt-5">
                <table class="table table-striped table-bordered table-hovered" width="100%">
                  <thead>
                    <tr>
                      <th>Service</th>
                      <th>Description</th>
                      <th>Harga</th>
                      <th>Estimasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cekongkir as $ongkir)
                    <tr>
                      <td>{{$ongkir['service']}}</td>
                      <td>{{$ongkir['description']}}</td>
                      <td>Rp. {{number_format($ongkir['cost'][0]['value'])}}</td>
                      <td>{{$ongkir['cost'][0]['etd']}} hari</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
          @else

          @endif
      </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<script type="text/javascript">
  $(document).ready(function () {
      $('select[name="province_from"]').on('change', function () {
          var cityId = $(this).val();
          if (cityId) {
              $.ajax({
                  url: 'getCity/ajax/' + cityId,
                  type: "GET",
                  dataType: "json",
                  success: function (data) {
                      $('select[name="origin"]').empty();
                      $.each(data, function (key, value) {
                          $('select[name="origin"]').append(
                              '<option value="' +
                              key + '">' + value + '</option>');
                      });
                  }
              });
          } else {
              $('select[name="origin"]').empty();
          }
      });
      $('select[name="province_to"]').on('change', function () {
        var cityId = $(this).val();
        if (cityId) {
            $.ajax({
                url: 'getCity/ajax/' + cityId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="destination"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="destination"]').append(
                            '<option value="' +
                            key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="destination"]').empty();
        }
    });
  });
</script>

@endsection
@extends('customer.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
              <div class="card-header">
                Cek Ongkir
              </div>
                <div class="card-body">
                    <form action="/customer/ongkir" method="POST" role="form" class="form-horizontal">
                      {{ csrf_field() }}

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Provinsi Tujuan</label>
                            <select name="province_destination" class="form-control">
                              <option value="">--Provinsi--</option>
                              @foreach($provinces as $province => $value)
                              <option value="{{ $province }}">{{ $value }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Kota Tujuan</label>
                            <select name="city_destination" class="form-control">
                              <option>--Kota--</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Kurir</label>
                            <select name="courier" class="form-control">
                              <option value="">--Kurir--</option>
                              @foreach($couriers as $courier => $value)
                              <option value="{{ $courier }}">{{ $value }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Berat (g)</label>
                            <input type="number" name="weight" id="" class="form-control" value="1000">
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    
    $('select[name="pronvice_destination"]').on('change', function() {
      let provinceId = $(this).val();
      if (provinceId) {
        jQuery.ajax({
          url:'rajaongkir/province/'+provinceId+'/cities',
          type:"GET",
          dataType:"json",
          success:function(data) {
            $('select[name="city_destination"]').empty();
            $.each(data, function (key, value) {
              $('select[name="city_destination"]').append('<option value="'+key+'">'+value+'</option>');
            });
          },
        });
      } else {
        $('select[name="city_destination"]').empty();
      }
    });

    
  });
</script>
@endsection
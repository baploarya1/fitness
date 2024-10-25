<?php  $current = now()->format('Y-m-d');   ?>
@extends('layouts.main',['label'=>'Laporan Member'])
  
@section('content')
 
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Laporan Member</h1>
    </div>
    {{-- <div class="card"> --}}
        {{-- <div class="card-body"> --}}
            <form class='mt-2'action="/cetak-application-form" id="myForm" method="POST">

                <div class="card">
                    <div class="card-body">
                            @csrf
                            <div class="row">
                                 
                                @component('components.inputDate',['label'=>'Tanggal Awal',"name"=>"tgl_awal" ,"placeholder"=>"First name", "value"=>$current]) @endcomponent
                                @component('components.inputDate',['label'=>'Tanggal Akhir',"name"=>"tgl_akhir" ,"placeholder"=>"Last name", "value"=>$current]) @endcomponent
                                                    
                            </div>
                    </div>
                </div>
             
                                       <br>                                     
                                      <div class="card">
                                        <div class="card-body">
                                            @component('components.select',['label'=>'Nomor Member',"type"=>"obj","name"=>"nomor_member" ,'key1'=>'nomor_member','key2'=>'nomor_member','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Nomor Member", "options"=>$members])  @endcomponent   
                                            @component('components.select',['label'=>'Nama Member',"type"=>"obj","name"=>"nama_member" ,'key1'=>'nama_member','key2'=>'nama_member','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Nama Member", "options"=>$members])  @endcomponent   
                                            @component('components.select',['label'=>'Kategori',"type"=>"obj","name"=>"kode_kategori" ,'key1'=>'kode_kategori','key2'=>'nama_kategori','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Kategori", "options"=>$kategoris])
                                            @endcomponent
                                            @component('components.select',['label'=>'Paket',"type"=>"obj","name"=>"kode_paket" ,'key1'=>'kode_paket','key2'=>'nama_paket','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Paket", "options"=>$pakets])
                                            @endcomponent
                                            <div class="modal-footer d-flex">
                                              
                                                    
                                                <button  class="btn btn-secondary w-25"  type="submit">Cetak</button>

                                        </div>
                                        </div>
                                      </div>
                                      
           </form>
        {{-- </div> --}}
    {{-- </div> --}}

    </div>
  
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // console.log('okai')
        // $(document).on("change", "#kode_kategori", function () {
        //     let kode_kategori = $(this).val();
        //      $.ajax({
        //         url: '{{ route("ajax.load.paket") }}',  // URL ke route controller            type: 'POST',
        //         data: {
        //             kode_kategori,
        //             _token: '{{ csrf_token() }}'  // Token CSRF untuk keamanan
        //         },
        //         type: 'POST',
        //         success: function(response) {
        //              $("#kode_paket").html(response)
        //          },
        //         error: function(xhr, status, error) {
        //              console.error('Error:', error);
        //         }
        //     });
        // });
        
        
        $("#nomor_member").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Nomor Member --",
        });
        $("#nama_member").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Nama Member --",
        });
        $("#kode_kategori").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Nama Kategori --",
        });
        $("#kode_paket").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Nama Paket --",
        });
        
        
    });
    $(".theSelect").select2();
</script>
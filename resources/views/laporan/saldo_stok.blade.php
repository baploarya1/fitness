<?php  $current = now()->format('Y-m-d');   ?>
@extends('layouts.main',['label'=>'Laporan Saldo Stok'])
  
@section('content')
 
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Laporan Saldo Stok</h1>
    </div>
    {{-- <div class="card"> --}}
        {{-- <div class="card-body"> --}}
            <form class='mt-2'action="/cetak-saldo-stok" id="myForm" method="POST">

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
                                            <h3>Filter</h3>
                                            @component('components.select',['label'=>'Berdasarkan Aksesoris',"type"=>"obj","name"=>"kode_aksesoris" ,'key1'=>'kode_aksesoris','key2'=>'nama_aksesoris','key3'=>'kode_aksesoris', 'key4'=>'satuan','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Aksesoris", "options"=>$aksesoris])  @endcomponent   
                                        
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
        console.log('okai')
       
        
        
        $("#kode_aksesoris").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        
        
    });
    $(".theSelect").select2();
</script>
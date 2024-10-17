<?php  $current = now()->format('Y-m-d'); //var_dump($current); exit; ?>
@extends('layouts.main',['label'=>'Laporan Pembelian'])
  
@php
    // dd($aksesoris->stok_awal);
    // dd(number_format($paket->harga_paket, 0, '.', ','));exit;
@endphp
@section('content')
 
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Aksesoris</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' enctype="multipart/form-data" action="{{ route('aksesoris.store') }}" id="myForm" method="POST">
                @csrf                           
                   
                <input type="hidden"name="id" value="{{$aksesoris->id}}">
                @component('components.inputGroup',['label'=>'Kode aksesoris ',"name"=>"kode_aksesoris","value"=>$aksesoris->kode_aksesoris,"col"=>"col-md-5"]) @endcomponent
                @component('components.inputGroup',['label'=>'Nama aksesoris ',"name"=>"nama_aksesoris","value"=>$aksesoris->nama_aksesoris,"col"=>"col-md-5"]) @endcomponent
               
                
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label  class="col-form-label" for="amount">Harga </label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="harga"value="{{isset($aksesoris->harga)? number_format($aksesoris->harga, 0, '.', ','): 0}}" class="form-control" id="amount" placeholder="0">
                    </div>
                </div>

                @component('components.inputGroup',['label'=>'Barang Masuk ',"type"=>"number","name"=>"barang_masuk","value"=> (int)$aksesoris->barang_masuk,"col"=>"col-md-5"]) @endcomponent
                @component('components.inputGroup',['label'=>' Stok Awal ',"type"=>"number","name"=>"stok_awal","value"=>(int)$aksesoris->stok_awal,"col"=>"col-md-5"]) @endcomponent
                {{-- @component('components.inputGroup',['label'=>' Stok Akhir ',"type"=>"number","name"=>"stok_akhir","value"=>$aksesoris->stok_akhir,"col"=>"col-md-5"]) @endcomponent --}}
                
                     
                    <hr>
                    <div class="row d-flex">
                        <div class="col-md-6 d-flex">
                            
                            <button  class="btn btn-primary w-50"  type="submit">Simpan</button>
                        </div>
                    </div>
                                              
                               
                                      
           </form>
        </div>
    </div>

    </div>
  
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
<script type="text/javascript">

    $(document).ready(function() {
        // console.log('okai')
        $('#amount').on('keyup', function() {
            let value = $(this).val().replace(/[^0-9]/g, '');
            value = parseInt(value).toLocaleString();
            $(this).val(value);
        });

         
        
    });
 </script>
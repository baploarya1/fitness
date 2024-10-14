<?php  $current = now()->format('Y-m-d'); //var_dump($current); exit; ?>
@extends('layouts.main',['label'=>'Laporan Pembelian'])
  
@php
    // dd(number_format($paket->harga_paket, 0, '.', ','));exit;
@endphp
@section('content')
 
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Paket</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' enctype="multipart/form-data" action="{{ route('paket.store') }}" id="myForm" method="POST">
                @csrf                           
                   
                <input type="hidden"name="id" value="{{$paket->id}}">

                @component('components.inputGroup',['label'=>'Kode Paket ',"value"=>$paket->kode_paket,"name"=>"kode_paket","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Nama Paket ',"value"=>$paket->nama_paket,"name"=>"nama_paket","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Kategori ',"value"=>$paket->kategori,"name"=>"kategori","col"=>"col-md-5"]) @endcomponent
                     
                    @component('components.inputTanggal',['label'=>'Tanggal Mulai Berlaku',"value"=>$paket->tanggal_mulai_berlaku,"name"=>"tanggal_mulai_berlaku" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    @component('components.inputTanggal',['label'=>'Tanggal Habis Berlaku',"value"=>$paket->tanggal_habis_berlaku,"name"=>"tanggal_habis_berlaku" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    @component('components.select',['label'=>'Status',"type"=>"arr","value"=>$paket->status,"name"=>"status" ,'key1'=>'nama','key2'=>'nama','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Status", "options"=>[["nama"=>"Aktif"],["nama"=>"Tidak Aktif"]]])
                    @endcomponent
                    @component('components.inputGroup',['label'=>'Jumlah Peserta ',"type"=>"number","value"=>$paket->jumlah_peserta,"name"=>"jumlah_peserta","col"=>"col-md-5"]) @endcomponent
                     
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label  class="col-form-label" for="amount">Harga Paket </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" value="{{isset($paket->harga_paket)? number_format($paket->harga_paket, 0, '.', ','): 0}}" name="harga_paket" class="form-control" id="amount" placeholder="0">
                        </div>
                    </div>
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
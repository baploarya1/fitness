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
                   
                <input type="hidden"name="id" value="{{$pembayaran->id}}">

                    @component('components.inputGroup',['label'=>'Kode Pembayaran ',"value"=>$pembayaran->kode_pembayaran,"name"=>"kode_pembayaran","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Nama Pembayaran ',"value"=>$pembayaran->nama_pembayaran,"name"=>"nama_pembayaran","col"=>"col-md-5"]) @endcomponent
                    @component('components.textarea',['label'=>'Keterangan ',"value"=>$pembayaran->keterangan,"name"=>"keterangan","col"=>"col-md-5"]) @endcomponent

                     
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
<?php  $current = now()->format('Y-m-d'); //var_dump($current); exit; ?>
@extends('layouts.main',['label'=>'Laporan Pembelian'])
  
@section('content')

@push('css')
    <style>
        .dataTables_info {
            display: none;
        }

        #simpan {
            text-decoration: none;
        }

        #simpan:hover {
            opacity: 70%;
            text-decoration: none;
        }

        .select2-container {
            width: 100% !important;
            padding: 0;
        }

        .select2-selection {

            padding: 5px !important;
            height: 40px !important;
        }

        label {
            font-size: 13px;
        }

        input {
            padding: 5px !important;
        }
    </style>
@endpush
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Data Supplier</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' enctype="multipart/form-data" action="{{ route('supplier.store') }}" id="myForm" method="POST">
                @csrf                           
                   
                
                @component('components.inputGroup',['label'=>'Kode Supplier ',"name"=>"kode_supplier","value"=>$supplier->kode_supplier,"col"=>"col-md-5"]) @endcomponent
                @component('components.inputGroup',['label'=>'Nama Supplier ',"name"=>"nama_supplier","value"=>$supplier->nama_supplier,"col"=>"col-md-5"]) @endcomponent
                @component('components.textarea',['label'=>'Alamat ',"name"=>"alamat","value"=>$supplier->alamat,"col"=>"col-md-5"]) @endcomponent
                @component('components.inputGroup',['label'=>'Nomor Handphone ',"name"=>"no_hp","value"=>$supplier->no_hp,"col"=>"col-md-5"]) @endcomponent

                @component('components.inputGroup',['label'=>'Nama Kontak ',"name"=>"nama_kontak","value"=>$supplier->nama_kontak,"col"=>"col-md-5"]) @endcomponent
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
        
        
    });
    $(".theSelect").select2();
</script>
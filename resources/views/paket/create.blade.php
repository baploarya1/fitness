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
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Paket</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' enctype="multipart/form-data" action="{{ route('paket.store') }}" id="myForm" method="POST">
                @csrf                           
                   
                
                @component('components.inputGroup',['label'=>'Kode Paket ',"name"=>"kode_paket","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Nama Paket ',"name"=>"nama_paket","col"=>"col-md-5"]) @endcomponent
                   
                    @component('components.select',['label'=>'Kategori',"type"=>"obj","name"=>"kode_kategori" ,'key1'=>'kode_kategori','key2'=>'nama_kategori','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Kategori", "options"=>$kategoris])
                    @endcomponent
                    @component('components.inputTanggal',['label'=>'Tanggal Mulai Berlaku',"name"=>"tanggal_mulai_berlaku" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    @component('components.inputTanggal',['label'=>'Tanggal Habis Berlaku',"name"=>"tanggal_habis_berlaku" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    @component('components.select',['label'=>'Status',"type"=>"arr","name"=>"status" ,'key1'=>'nama','key2'=>'nama','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Status", "options"=>[["nama"=>"Aktif"],["nama"=>"Tidak Aktif"]]])
                    @endcomponent
                    @component('components.inputGroup',['label'=>'Jumlah Peserta ',"type"=>"number","name"=>"jumlah_peserta","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Durasi (Bulan) ',"type"=>"number","name"=>"durasi","col"=>"col-md-5"]) @endcomponent
                     
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label  class="col-form-label" for="amount">Harga Paket </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="harga_paket" class="form-control" id="amount" placeholder="0">
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

        // console.log($("#pilihexport").val);
        $('#pilihexport').change(function() {
            const selectedValue = $(this).val(); // Mendapatkan nilai yang dipilih
            if (selectedValue == '') {
                $('#printbutton').removeClass('d-block');
                $('#printbutton').addClass('d-none')
            }
            if (selectedValue == 'excel') {
                $('#myForm').attr('action', '/cetak-pembelian-excel'); // Change form action
                $('#printbutton').html('<i class="fas fa-print"></i>&nbsp;Print Excel')
                $('#printbutton').removeClass('d-none');
                $('#printbutton').addClass('d-block')
            }
            if (selectedValue == 'pdf') {
                $('#myForm').attr('action', '/cetak-pembelian'); // Change form action
                $('#printbutton').html('<i class="fas fa-print"></i>&nbsp;Print Pdf')
                $('#printbutton').removeClass('d-none');
                $('#printbutton').addClass('d-block')
            }
             
            // $('#result').text('Kamu memilih: ' + selectedValue); // Menampilkan hasil
        })
        
        $("#gudangstok").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#kodesupplier").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#grup1").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#grup2").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#kodebarang").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#kodesupplier").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#namabarang").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        
    });
    $(".theSelect").select2();
</script>
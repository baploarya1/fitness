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
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Transaksi</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' id="myform" enctype="multipart/form-data" action="{{ route('transaksi.store') }}" id="myForm" method="POST">
             {{-- <form class='mt-2' id="myform" enctype="multipart/form-data" action="{{ route('transaksi.store') }}" id="myForm" method="POST"> --}}
                @csrf                           
                    @component('components.select',['label'=>'Member',"type"=>"obj","name"=>"nomor_member" ,'key1'=>'nomor_member','key2'=>'nama_member','col'=>'col-lg-8 col-sm-6','key3'=>'nomor_member','key4'=>'alamat',"placeholder"=>"Pilih Member", "options"=>$members]) <div class="col-lg-3">
                        <a href="{{ route('member.create') }}"class="btn  btn-login w-75 btn-success">Tambah Member</a>
                      </div> @endcomponent
                    @component('components.inputGroup',['label'=>'Nomor Transaksi ',"name"=>"nomor_transaksi","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputTanggal',['label'=>'Tanggal Transaksi',"name"=>"tanggal_transaksi" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    <div class="mt-3"></div>
                    @component('components.inputTanggal',['label'=>'Tanggal Mulai Berlaku',"name"=>"tanggal_mulai_berlaku" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    {{-- @component('components.inputTanggal',['label'=>'Tanggal Habis Berlaku',"name"=>"tanggal_habis_berlaku" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent --}}
                    
                    @component('components.select',['label'=>'Kategori',"type"=>"obj","name"=>"kode_kategori" ,'key1'=>'kode_kategori','key2'=>'nama_kategori','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Kategori", "options"=>$kategoris])
                    @endcomponent
                    @component('components.select',['label'=>'Paket',"type"=>"obj","name"=>"kode_paket" ,'key1'=>'kode_paket','key2'=>'nama_paket','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Paket", "options"=>$pakets])
                    @endcomponent
                    @component('components.textarea',['label'=>'Keterangan ',"name"=>"keterangan","col"=>"col-md-5"]) @endcomponent
                    @component('components.select',['label'=>'Pembayaran',"type"=>"obj","name"=>"kode_pembayaran" ,'key1'=>'kode_pembayaran','key2'=>'nama_pembayaran','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Pembayaran", "options"=>$pembayarans])
                    @endcomponent
                    @component('components.select',['label'=>'Status',"type"=>"arr","name"=>"status" ,'key1'=>'kode','key2'=>'kode','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Status", "options"=>[["kode"=>"Paid" ],["kode"=>"Unpaid"]]])
                    @endcomponent
                    <hr>
                    <div class="row d-flex">
                        <div class="col-md-6 d-flex" style="gap:5px">
                            
                            {{-- <button  class="btn btn-success w-50" id="cetakbtn" type="submit">Cetak</button> --}}
                            <button  class="btn btn-primary w-50" id="simpanbtn" type="submit">Simpan</button>
                        </div>
                    </div>
                                              
                               
                                      
           </form>
        </div>
    </div>

    </div>
  
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

<script type="text/javascript">
    $(document).ready(function() {
        console.log('okai')
        // console.log($("#pilihexport").val);
        $(document).on("change", "#kode_kategori", function () {
             let kode_kategori = $(this).val();
            // console.log(kode_kategori);
            $.ajax({
                url: '{{ route("ajax.load.paket") }}',  // URL ke route controller            type: 'POST',
                data: {
                    kode_kategori,
                    _token: '{{ csrf_token() }}'  // Token CSRF untuk keamanan
                },
                type: 'POST',
                success: function(response) {
                    // Proses jika request sukses
                    $("#kode_paket").html(response)
                    // console.log('Data berhasil dikirim:', response);
                },
                error: function(xhr, status, error) {
                    // Proses jika terjadi error
                    console.error('Error:', error);
                }
            });
        });
       
        $("#nomor_member").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $("#kode_paket").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        $('#hoverButton').hover(() => {
            $('#myform').attr('disabled', true); // Set the attribute
        } 
            );
    });
    $(".theSelect").select2();
</script>
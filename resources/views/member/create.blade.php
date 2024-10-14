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
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Member</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' enctype="multipart/form-data" action="{{ route('member.store') }}" id="myForm" method="POST">
                @csrf                           
                   
                    @component('components.inputGroup',['label'=>'Nomor Member ',"name"=>"nomor_member","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Nama Member ',"name"=>"nama_member","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Tempat Lahir',"name"=>"tempat_lahir","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputTanggal',['label'=>'Tanggal lahir',"name"=>"tanggal_lahir" ,"placeholder"=>"Last name", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                    @component('components.select',['label'=>'Jenis Kelamin',"type"=>"arr","name"=>"jenis_kelamin" ,'key1'=>'kode','key2'=>'nama','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Jenis Kelamin", "options"=>[["kode"=>"L","nama"=>"Laki-Laki"],["kode"=>"P","nama"=>"Perempuan"]]])
                    @endcomponent
                    @component('components.textarea',['label'=>'Alamat ',"name"=>"alamat","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Nomor Ktp ',"name"=>"nomor_ktp","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>'Nomor Handphone ',"name"=>"nomor_handphone","col"=>"col-md-5"]) @endcomponent
                    @component('components.inputGroup',['label'=>' Pekerjaan ',"name"=>"pekerjaan","col"=>"col-md-5"]) @endcomponent
                    @component('components.select',['label'=>'Status Member',"type"=>"arr","name"=>"status_member" ,'key1'=>'nama','key2'=>'nama','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Status Member", "options"=>[["nama"=>"Aktif"],["nama"=>"Tidak Aktif"]]])
                    @endcomponent
                    @component('components.inputTanggal',['label'=>'Tanggal registrasi',"name"=>"tanggal_registrasi" ,"placeholder"=>"Tanggal registrasi", "col"=>"col-md-5",
                    "value"=>$current]) @endcomponent
                     @component('components.fileinput',['label'=>'Photo Ktp ',"name"=>"photo_ktp","accept"=>"image/*","col"=>"col-md-5"]) @endcomponent
                     @component('components.fileinput',['label'=>'Photo Member ',"name"=>"photo_member","accept"=>"image/*","col"=>"col-md-5"]) @endcomponent
                     @component('components.inputGroup',['label'=>'Nomor Kartu Member ',"name"=>"nomor_kartu_member","col"=>"col-md-5"]) @endcomponent
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
        console.log('okai')
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
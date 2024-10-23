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
    <h1 class="h3 mb-0 text-gray-800">Tambah Data user</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form class='mt-2'action="{{ route('user.store') }}" id="myForm"enctype="multipart/form-data" method="POST">
                @csrf                           
                @component('components.inputGroup',['label'=>'Username','name'=>'username',"col"=>"col-md-5"]) @endcomponent
                    
                @component('components.inputGroup',['label'=>'Email','name'=>'email',"col"=>"col-md-5"]) @endcomponent
                @component('components.select',['label'=>'Role','name'=>'role','key1'=>'text','key2'=>'text',"type"=>"arr","name"=>"role" ,"placeholder"=>"Role ",'col'=>'col-lg-5 col-sm-6', "options"=> [ ['text' => 'Admin' ],['text' => 'Operator' ]]]) 
            
                @endcomponent
                @component('components.inputGroup',['label'=>'Password','name'=>'password','type'=>'password',"col"=>"col-md-5"]) @endcomponent
                @component('components.inputGroup',['label'=>'Ulangi Password','type'=>'password','name'=>'password_confirmation',"col"=>"col-md-5"]) @endcomponent

                    <hr>
                    <div class="row d-flex">
                        <div class="col-md-6 d-flex">
                            
                            <button  class="btn btn-primary w-50"  type="submit">Register</button>
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
        $('#username').on('keyup', function() {
            $(this).val($(this).val().toUpperCase());
        });

         
        $("#namabarang").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select",
        });
        
    });
    $(".theSelect").select2();
</script>
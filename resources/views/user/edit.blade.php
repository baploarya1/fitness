<?php  $current = now()->format('Y-m-d'); //var_dump($current); exit; ?>
@extends('layouts.main',['label'=>'Laporan Pembelian'])
  
@php
    // dd(number_format($user->harga_user, 0, '.', ','));exit;
@endphp
@section('content')
 
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data user</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form class='mt-2'action="{{ route('user.store') }}" id="myForm" method="POST">
                @csrf                           
                    {{-- @component('components.inputGroup',['label'=>'Username',"col"=>"col-md-5","readonly"=>true,"value"=>$user->name]) @endcomponent --}}
                    <div class="form-group row mb-0"  >
                        <div class="col-sm-2">
                                <label for="{{"name"}}" class="col-form-label"> Username</label>      
                        </div>
                                        
                        <div class="col-lg-5 col-sm-6  input-group">
                            <input type="text" readonly class="form-control " value="{{$user->name}}" id="{{"name"}}" name="{{"name"}}" >
                        </div>
                        <br>
                       
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3 text-left mb-2">
                                @error("name")  
                                    <div class="text-danger mb-0" role="alert">  {{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    @component('components.inputGroup',['label'=>'Email',"name"=>"email","col"=>"col-md-5","value"=>$user->email]) @endcomponent
                    @component('components.select',['label'=>'Role',"name"=>"role",'key1'=>'text','key2'=>'text',"type"=>"arr","name"=>"role" ,"placeholder"=>"Role ","value"=>$user->roles[0]->name ,'col'=>'col-lg-5 col-sm-6', "options"=> [ ['text' => 'Admin' ],['text' => 'Operator' ]]]) 
                
                    @endcomponent
                    
                    <hr>
                    <div class="row d-flex">
                        <div class="col-md-6 d-flex">
                            
                            <button  class="btn btn-primary w-50"  type="submit">Edit</button>
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
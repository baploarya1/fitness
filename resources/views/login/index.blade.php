<!DOCTYPE html>
<html lang="en">
@extends('layouts.auth' )

@section('content')
        <form action="/login" method="POST" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                        </div>
                        <div class="form-group">
                            
                            <input type="text" name="name" id="name" class="form-control
                             @error('name') is-invalid @enderror 
                             " onkeyup="this.value = this.value.toUpperCase()" id="name" aria-describedby="name" placeholder="Enter Username ..." required autofocus value="{{ old('name') }}">
                                    @error('name')
                                        <p class=" text-danger mt-2">
                                        {{ $message }}
                                        </p>
                                    @enderror
                                  

                                <!-- <p class="text-danger mt-2">Username Atau Password Salah</p> -->

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control" id="password" placeholder="Password" required>
                            @if(session()->has('loginError'))
                                             <p class=" text-danger mt-2">
                                            {{ session('loginError') }}   
                                             </p>
                            @endif
                        </div>
                        <hr>
                        <!-- <input type="submit" class="btn btn-login btn-primary btn-block" name="submit" value="Login"> -->
                        <!-- <button class="btn btn-login btn-block btn-primary" onsubmit="callme()">LOGIN</button> -->
                        <button  type="submit" class="btn btn-login btn-block btn-secondary" name="sub">Login</button>
                    </div>
                </div>
            </div>
        </form>

@endsection
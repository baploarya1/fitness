<!-- resources/views/pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>My PDF Document</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 0 }
        h1 { color: blue; }
        .m-0 {
            margin: 0px
        }
        .d-flex {
            display: flex
        }
        .underline {
            text-decoration: underline;
        }
        .container{
            display: block;
        }
    </style>
</head>
<body>
     
    
        <img   style="width: 14rem; display:inline; margin-top:5px"  src="{{ public_path('img/emerald.jpg') }}"  />
        <div style="width: 25rem; display:inline; margin-top:-10rem; margin-left:25rem">
            <h1 style=" background-color: black;color: white;  padding:8px ; display:inline" >  APPLICATION FORM </h1>
        </div>
        <br>
        <table>
            <thead >
                <tr> 
                    <th width="17%"  style="font-weight: 300; font-size:15px">MEMBER NUMBER</th>
                    <th width="17%"  style="font-weight: 300; font-size:15px">IDENTITY NUMBER</th>
                    <th width="17%"  style="font-weight: 300; font-size:15px">Gender</th>
              
                </tr>
                
            </thead>
             <tbody  >
                <br>
                <tr >
                    <td style="text-align:center;font-size:15px; border: 2px solid gray; ">  {{$transaksi->nomor_member??''}} </td>
                    <td style="text-align:center;font-size:15px; border: 2px solid gray; "> {{$transaksi->nomor_ktp??''}}    </td>
                    <td style="text-align:center;font-size:15px; border: 2px solid gray; ">  {{$transaksi->jenis_kelamin =="L"?"MALE":"FEMALE"}}     </td>
                </tr>
              
            </tbody>
        </table>
        <div style="margin-top: 5px">FULLNAME</div>
        <div style="text-align:center;font-size:15px; margin-top:0px; border: 2.5px solid gray; "> {{$transaksi->nama_member??''}}</div>
        <div style="margin-top: 5px">HOME ADDRESS</div>
        <div style="text-align:center;font-size:15px; margin-top:0px; border: 2.5px solid gray; ">{{$transaksi->alamat??''}}</div>
       <div style="width: 50%;margin-top: 5px">
        <div>BIRTH DATE</div>
        <div style="text-align:center;font-size:15px; margin-top:0px; border: 2.5px solid gray; ">{{$transaksi->tanggal_lahir??''}}</div>
       </div>
       <div style="width: 50%;margin-top: -3.05rem;margin-left: 25rem">
        <div>BIRTH PLACE</div>
        <div style="text-align:center;font-size:15px; margin-top:0px; border: 2.5px solid gray; "> {{$transaksi->tempat_lahir??''}}</div>
       </div>
       <div style="width: 50%;margin-top: 5px">
        <div>JOB</div>
        <div style="text-align:center;font-size:15px; margin-top:0px; border: 2.5px solid gray; "> {{$transaksi->pekerjaan??''}}</div>
       </div>
       <div style="width: 50%;margin-top: -3.05rem;margin-left: 25rem">
        <div>PHONE NUMBER</div>
        <div style="text-align:center;font-size:15px; margin-top:0px; border: 2.5px solid gray; ">{{$transaksi->nomor_handphone??''}}</div>
       </div>
       
         
        {{-- <p style="font-size:15px;">dasdadsa</p>
        <p style="width:15rem; text-align:center;font-size:15px; border: 3px solid gray; "> Arya    </p> --}}
        <h3>MEMBERSHIP CATEGORY</h3>
        <div style="font-size: 15px">{{$transaksi->nama_paket??''}}</div> 
         
        <div style="margin-left: 35rem; margin-top: -5rem">
            <h3>ADD ON LESSON</h3>
            <div style="font-size: 15px"> - BODY LESSON  </div> 
            <div style="font-size: 15px"> - TENNIS LESSON  </div> 
        </div>
         
        <h3  >PAYMENT</h3>
        <table>
            <thead>
                <tr>
                    <th style="font-weight: 300; text-align:left">CHARGE</th>
                    <th style="width: 1rem"></th>
                    <th> <strong>RP. 0</strong><hr style="width: 100%"></th>
                </tr>
                {{-- <tr>
                    <th style="font-weight: 300; text-align:left">WRIST</th>
                    <th> <strong>RP. 32131231231</strong><hr style="width: 100%"></th>
                </tr>
                <tr>
                    <th style="font-weight: 300; text-align:left">OTHER TOTAL</th>
                    <th> <strong>RP. 32131231231</strong><hr style="width: 100%"></th>
                </tr> --}}
            </thead>
        </table>
        <div style="margin-left: 25rem; margin-top:-7rem">
            <h3  >PAYMENT METHOD</h3>
            <table>
                <thead>
                    <tr>
                        <th style="font-weight: 300; text-align:left">{{$transaksi->nama_pembayaran??''}}</th>
                    <th style="width: 1rem"></th>

                        <th> <strong>{{$transaksi->harga_paket?"Rp" . number_format($transaksi->harga_paket, 0, ',', '.'):0}}</strong><hr style="width: 100%"></th>
                    </tr>
                    
                </thead>
            </table>
        </div>
        <br>
        <h3>MEMBERS INFORMATION</h3>
        <table>
            <thead>
                <tr>
                    <th width="9rem" style="font-weight: 300; text-align:left">MEMBER NO</th>
                    <th width="9rem"> {{$transaksi->nomor_member??''}}   <hr style="width: 90%; padding-top:0"></th>
                    <th width="8rem"></th>

                    <th width="9rem" style="font-weight: 300; text-align:left ;margin-top:15px">OFFICIAL RECEIPT</th>
                    <th width="9rem"> <p style="padding-bottom: 0px">  {{$transaksi->tanggal_mulai_berlaku??''}}</p> <hr style="width: 90%"></th>
                </tr>
                <tr>
                    <th style="font-weight: normal; text-align:left">DATE JOINING</th>
                    <th > {{$transaksi->tanggal_registrasi??''}}  <hr style="width: 90%"></th>
                    <th width="8rem"></th>

                    <th style="font-weight: 300; text-align:left;margin-top:15px">EXPIRED DATE</th>
                    <th  > {{$transaksi->tanggal_habis_berlaku??''}}<hr style="width: 90%"></th>
                </tr>
                
            </thead>
        </table>
        
        <div style="width: 30% ; margin-top:20px">
            <i>*) ALL THE INFORMATION AS MENTIONED ABOVE IS VALID AND AGREED TO TERMS & CONDITIONS OF EMERALD GARDEN FITNESS CENTRE</i>
        </div>
        <div style="width:20%;margin-left: 25rem;  margin-top:-7rem">
            <div style=" border: 2px solid gray; display:flex; justify-content:center; align-items:end ">
                <p style="margin-left:2.5rem;font-size:15px;margin-top:7rem">    MEMBER </p>
            </div>
        </div>
        <div style="width:20%;margin-left: 34.5rem;  margin-top:-9.8rem">
            <div style=" border: 2px solid gray; display:flex; justify-content:center; align-items:end ">
                <p style="margin-left:2.5rem;font-size:15px;margin-top:7rem">    CASHIER </p>
            </div>
        </div>
        {{-- <div class="">
        <div class="">WRIST <strong>RP. </strong>________________________________</div>
        <div class="">OTHER TOTAL <strong>RP. </strong>________________________________</div> --}}
</body>
</html>

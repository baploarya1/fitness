<?php  $current = now()->format('Y-m-d'); //var_dump($current); exit; ?>
@extends('layouts.main',['label'=>'Laporan Pembelian'])
  
@section('content')
  
 <div class="container">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Pembelian</h1>
    </div>
    <div class="card">
        <div class="card-body">
             <form class='mt-2' enctype="multipart/form-data" id="myForm" data-index="create"  >
                @csrf      
                @component('components.select',['label'=>'Aksesoris',"type"=>"obj","name"=>"kode_aksesoris" ,'key1'=>'kode_aksesoris','key2'=>'nama_aksesoris','key3'=>'kode_aksesoris', 'key4'=>'satuan','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Aksesoris", "options"=>$aksesoris]) <div class="col-lg-3">
                    <a href="{{ route('aksesoris.create') }}"class="btn  btn-login w-75 btn-success">Tambah Aksesoris</a>
                  </div> @endcomponent   
                                <input type="hidden" id="nama_barang">
                                <input type="hidden" id="satuan">
                                <input type="hidden" id="faktur" value="{{$faktur??'-'}}">
                @component('components.select',['label'=>'Supplier',"type"=>"obj","name"=>"kode_supplier" ,'key1'=>'kode_supplier','key2'=>'nama_supplier','key3'=>'kode_supplier','key4'=>'alamat','col'=>'col-lg-8 col-sm-6',"placeholder"=>"Pilih Supplier", "options"=>$suppliers])  @endcomponent
                                <input type="hidden" id="nama_supplier">
                
                    @component('components.inputGroup',['label'=>'Jumlah ',"name"=>"jumlah","type"=>"number", "col"=>"col-md-5"]) @endcomponent
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label  class="col-form-label" for="harga">Harga </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="harga" class="form-control" id="harga" placeholder="0"  >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label  class="col-form-label" for="sub_total">Sub Total </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" disabled="true" name="sub_total" class="form-control" id="sub_total" placeholder="0" >
                        </div>
                    </div>
                     
                      
                    <hr>
                    <div class="row d-flex">
                        <div class="col-md-6 d-flex">
                            
                            <button  class="btn btn-success w-50" id="tombol_simpan" type="submit">Tambah Item</button>
                        </div>
                    </div>
                                                         
           </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    @php  $current = now()->format('Y-m-d');  @endphp
                    <div class="row">
                        <div class="col-md-5 mb-3 pl-0">
                            @component('components.inputDate',['label'=>'Tanggal Pembelian',"name"=>"tanggal_pembelian" ,"placeholder"=>"First name", "value"=>$current]) @endcomponent
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="tablePembelian" class="table table-bordered dataTable" id="dataTable" width="100%"
                      cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                          <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                            style="width: 1%;">
                           No
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                            style="width: 57px;">
                            Kode Aksesoris
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                            style="width: 57px;">
                            Nama Supplier
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                            style="width: 57px;">
                            Nama Aksesoris
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                            colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61px;">
                           Harga 
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                            colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49px;">
                            Jumlah
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                            colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">
                            Sub Total
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                            colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">
                            AKSI
                            </th>
                             
                          </tr>
                        </thead>                  
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-12 mb-3">
                        <button  class="btn btn-primary btn-block" id="btn-simpan" type="submit">Simpan</button>
                      {{-- <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                        Showing 1 to 10 of 57 entries
                      </div> --}}
                    </div>
                     
                  </div>
                </div>
              </div>
        </div>
    </div>

    </div>
  
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
<script type="text/javascript">
   
    $(document).ready(function() {
         
        $("#kode_aksesoris").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Aksesoris --",
        });
        $("#kode_supplier").select2({
            theme: 'bootstrap4',
            placeholder: "-- Pilih Supplier --",
        });
        let items = @json($pembelians); // Array untuk menyimpan item
        // console.log(items);
        
        $('#jumlah').on('keyup', function() {
            const jumlah = $(this).val() 
            const harga = $('#harga').val()

            if (harga=='') {
                $('#sub_total').val(formatRupiah(0))    
            } else {
                const hargaint = toNumber(harga)
                const sub_totalint = hargaint * jumlah
                $('#sub_total').val(formatRupiah(sub_totalint) )
            }
        });
        $('#harga').on('keyup', function() {
            var harga = $(this).val().replace(/\D/g, ''); // Menghapus semua karakter non-angka
            $(this).val(formatRupiah(harga));

            const jumlah = $('#jumlah').val()
            
            // console.log(harga);
            const hargaint = Number(harga.replace(/,/g, ''))
            const sub_totalint =hargaint * jumlah
            $('#sub_total').val(formatRupiah(sub_totalint) )
        });
        $('#btn-simpan').on('click', function() {

        if (items.length === 0) {
            alert('Tidak ada item yang ditambahkan.');
            return;
        }
        const tanggal_pembelian = $('input[name="tanggal_pembelian"]').val();

        // Kirim data items melalui AJAX
        $.ajax({ 
            url: "{{ route('pembelian.store') }}",  // URL ke route controller            type: 'POST',
            method: 'POST',
            data: {
                // _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                items: items ,// Kirim array items
                param: $('#faktur').val() , 
                tanggal_pembelian,
                _token: '{{ csrf_token() }}'  // Token CSRF untuk keamanan
            },
            success: function(response) {
                 console.log(response);
                 
                // items = []; // Kosongkan array setelah berhasil disimpan
                // updateTable(); // Perbarui tabel setelah dikosongkan

                window.location.href = "{{ route('pembelian.index') }}"; // Use Laravel's route helper

            },
            error: function(xhr, status, error) {
                console.log(error);
                // alert('Terjadi kesalahan saat menyimpan data.');
            }
        });
    });
        $(document).on("change", "#kode_aksesoris", function () {
          
            const [kode_aksesoris, nama_barang, satuan] = $(this).find('option:selected').text().split('|').map(s => s.trim());
            $('#nama_barang').val(nama_barang)
            $('#satuan').val(satuan)
           
        });
        $(document).on("change", "#kode_supplier", function () {
          
          const arr = $(this).find('option:selected').text().split('|').map(s => s.trim());
        //   console.log(arr);
          
          $('#nama_supplier').val(arr[1])           
        });
        $(document).on("click", ".editLink", function () {
            const dataindex = $(this).data('index');
            const {kode_supplier , harga,jumlah,sub_total, kode_aksesoris} =items[dataindex]
            $('#kode_supplier').val(kode_supplier).trigger('change');  
            $('#kode_aksesoris').val(kode_aksesoris).trigger('change');  
            $('#harga').val(formatRupiah(harga)); 
            $('#jumlah').val(jumlah); 
            $('#sub_total').val(formatRupiah(sub_total)); //formatRupiah 
            $('#myForm').attr('data-index', dataindex);

        });
      
        $(document).ready(function() {
            // $('#kode_aksesoris').val('asdsa')

            updateTable()
            $('#myForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah pengiriman form

                // Mengambil nilai dari input
                const kode_aksesoris = $('#kode_aksesoris').val();
                const nama_barang = $('#nama_barang').val();
                const kode_supplier = $('#kode_supplier').val();
                const nama_supplier = $('#nama_supplier').val();
                const harga = toNumber($('#harga').val()) ;
                const jumlah = $('#jumlah').val();
                const satuan = $('#satuan').val();
                const sub_total = toNumber($('#sub_total').val()) ;

                const dataindex =  $(this).attr('data-index');
                const obj = { kode_aksesoris ,nama_supplier,kode_supplier,nama_barang,harga,jumlah,sub_total,satuan }
                if (dataindex =="create") {
                    items.push(obj);
                } else {
                    items = items.map((val, idx) =>idx == dataindex ? obj : val);
                    // items.map(val => val.id === 2 ? obj : val);
                }

                updateTable();
                $('#kode_aksesoris').val('')
                $('#myForm').attr('data-index', 'create');

                this.reset(); // Mereset form dengan cara ini
            });
        });
        function updateTable() {
            const tbody = $('#tablePembelian tbody');
            tbody.empty(); // Mengosongkan tbody sebelum menambahkan data baru
           

            // Menggunakan map untuk membuat baris tabel
            if (items.length === 0) {
                // console.log('dasdsa');
                // $('#btn-simpan').css('display','none');

                tbody.append(
                    `<tr id="emptyRow">
                        <td colspan="8" style="text-align: center;">Data masih kosong</td>
                    </tr>`
                );
            } else {
                items.map((item, index) => {
                    tbody.append(
                        `<tr class="odd">
                            <td class="sorting_1">${index +1}</td>
                            <td>${item.kode_aksesoris}</td>
                            <td>${item.nama_supplier}</td>
                            <td>${item.nama_barang}</td>
                            <td>${formatRupiah(item.harga)}</td>
                            <td>${formatNumber(item.jumlah)}</td>
                            <td>${formatRupiah(item.sub_total)}</td>
                            <td class=" ">
                                    <a href="#"title="Hapus" class="deleteLink p-2 " data-index="${index}" ><i class="fa fa-trash text-danger"></i>
                                    </a>
                                    <a  title="Edit" href="#" class="editLink   p-2 " data-index="${index}" ><i class="fas fa-pen text-primary"></i> 
                                    </a>
                            </td>
                        </tr>`
                    );
                }); //31,000
            }
        // this.reset();
        $('#kode_aksesoris').val('').trigger('change');  
        $('#kode_supplier').val('').trigger('change');  

            if (items.length == 0) {
                // $('#btn-simpan').css('style', 'display: none;');
                $('#btn-simpan').css('display','none');

            }else{
                $('#btn-simpan').css('display','block');

            }
        }
        $('#tablePembelian').on('click', '.deleteLink', function() {
            var index = $(this).data('index'); // Mendapatkan index dari tombol yang diklik
            items.splice(index, 1); // Menghapus item dari array
            updateTable(); // Memperbarui tabel
        });
        // console.log($("#pilihexport").val);
        function formatRupiah(angka) {
            var formatted = new Intl.NumberFormat('id-ID', { 
                style: 'currency', 
                currency: 'IDR', 
                minimumFractionDigits: 0 
            }).format(angka);
            
            return formatted.replace('Rp', 'Rp. '); // Menambahkan Rp dengan titik
        }
        function toNumber(rupiah) {
            return parseInt(rupiah.replace(/[^,\d]/g, ''), 10);
        }
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!))/g, ",");
        }
       function geturlparam(){

           const url = window.location.href;
   
           const match = url.match(/\/pembelian\/(PMB-\d{8}-\w+)\/edit/);
   
           if (match && match[1]) {
               const pmbCode = match[1];
                return pmbCode
            } else {
                return ''
                console.log("No match found.");
           }
       } 
        
    });
    
 </script>
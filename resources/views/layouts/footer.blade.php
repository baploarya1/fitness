
<script src="{{ asset('assets/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    //GLOBAL SETUP HEADERS
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>
 

<script>
    $('.dataTable').DataTable({
        "pageLength": 25,
    });
</script>

@stack('script')

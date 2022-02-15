// let data = []
// $(document).ready(function () {
//     $('#striped-table').DataTable({
//         "pageLength": 5,
//         "lengthMenu": [
//             [5, 10, 25, 50, 100],
//             [5, 10, 25, 50, 100]
//         ],
//         "bLengthChange": true,
//         "bFilter": true,
//         "bInfo": true,
//         "processing": true,
//         "bServerSide": true,
//         "order": [[1, "asc"]],
//         "ajax": {
//             url: "{{ url('filterdata') }}",
//             type: "POST",
//             data: function (d) {
//                 d._token = "{{csrf_token()}}"
//             }
//         },
//     });
// });

$(function(){
    $('#table-index-portofolio').DataTable({
        scrollX:true,
        processing:true,
        serverSide:true,
        paginate: true,
        bDeferRender: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        responsive: true,
        autoWidth: false,
        pageLength: 5,
        lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        ajax: 'portofolio/json',
        columns:[
            {data:'klien', name:'klien'},
            {data:'perusahaan', name:'perusahaan'},
            {data:'tahun', name:'tahun'},
            {data:'jenis', name:'jenis'},
            {data:'kapasitas', name:'kapasitas'},
            {data:'teknologi', name:'teknologi'},
            {data:'nilai_kontrak', name:'nilai_kontrak'},
            {data:'status', name:'status'},
            {data:'action', name:'action'}
        ]
    });

    $('#simpan').on('click',function(){

        if($(this).text() == 'Simpan Edit'){
            // console.log('Edit');
            edits();
        }
        else
        {
            tambah();
        }

    });


    $(document).on('click', '.edit', function(){
        let id = $(this).attr('id');
        $('#tambah').click();
        $('#simpan').text('Simpan Edit');
        $.ajax({
            url: 'portofolio/edits',
            type: 'post',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(res){
                $('#id').val(res.data.id);
                $('#klien_id').val(res.data.klien_id);
                $('#perusahaan').val(res.data.perusahaan);
                $('#tahun').val(res.data.tahun);
                $('#jenis_id').val(res.data.jenis_id);
                $('#kapasitas').val(res.data.kapasitas);
                $('#teknologi_id').val(res.data.teknologi_id);
                $('#nilai_kontrak').val(res.data.nilai_kontrak);
                $('#status_id').val(res.data.status_id);
            }
        });
    });

    function tambah(){
        $.ajax({
            url: 'portofolio/store',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                klien_id: $('#klien_id').val(),
                perusahaan: $('#perusahaan').val(),
                tahun: $('#tahun').val(),
                jenis_id: $('#jenis_id').val(),
                kapasitas: $('#kapasitas').val(),
                teknologi_id: $('#teknologi_id').val(),
                nilai_kontrak: $('#nilai_kontrak').val(),
                status_id: $('#status_id').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res){
                console.log(res.data);
                swal("Sukses!", "Data berhasil ditambahkan.", "success");
                // alert(res.data.text)
                $('#tutup').click()
                $('#table-index-portofolio').DataTable().ajax.reload();
                $('#klien_id').val(null);
                $('#perusahaan').val(null);
                $('#tahun').val(null);
                $('#jenis_id').val(null);
                $('#kapasitas').val(null);
                $('#teknologi_id').val(null);
                $('#nilai_kontrak').val(null);
                $('#status_id').val(null);
            },
            error: function(xhr){
                // swal("Error deleting!", "Please try again", "error");
                // alert(xhr.responseJSON.text);
            }
        });
    }

    function edits(){
        $.ajax({
            url: 'portofolio/updates',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: $('#id').val(),
                klien_id: $('#klien_id').val(),
                perusahaan: $('#perusahaan').val(),
                tahun: $('#tahun').val(),
                jenis_id: $('#jenis_id').val(),
                kapasitas: $('#kapasitas').val(),
                teknologi_id: $('#teknologi_id').val(),
                nilai_kontrak: $('#nilai_kontrak').val(),
                status_id: $('#status_id').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res){
                console.log(res.data);
                swal("Sukses!", "Data berhasil diperbaharui.", "success");
                // alert(res.data.text)
                $('#tutup').click();
                $('#table-index-portofolio').DataTable().ajax.reload();
                $('#klien_id').val(null);
                $('#perusahaan').val(null);
                $('#tahun').val(null);
                $('#jenis_id').val(null);
                $('#kapasitas').val(null);
                $('#teknologi_id').val(null);
                $('#nilai_kontrak').val(null);
                $('#status_id').val(null);
                $('#simpan').text('Simpan');
            },
            error: function(xhr){
                // swal("Error deleting!", "Please try again", "error");
                // alert(xhr.responseJSON.text);
            }
        });
    }


    $(document).on('click','.hapus', function(){
        let id = $(this).attr('id')
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'portofolio/hapus',
            type: 'post',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(res){
                console.log(res.data);
                swal("Sukses!", "Data berhasil terhapus.", "success");
                $('#table-index-portofolio').DataTable().ajax.reload();
            }
        });
    });

});




$(function(){
    $('#table-server').DataTable({
        scrollX:true,
        processing:true,
        serverSide:true,
        paginate: true,
        bDeferRender: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        responsive: true,
        autoWidth: false,
        pageLength: 5,
        lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        ajax: 'filter/json',
        columns:[
            {data:'klien', name:'klien'},
            {data:'perusahaan', name:'perusahaan'},
            {data:'tahun', name:'tahun'},
            {data:'jenis', name:'jenis'},
            {data:'kapasitas', name:'kapasitas'},
            {data:'teknologi', name:'teknologi'},
            {data:'nilai_kontrak', name:'nilai_kontrak'},
            {data:'status', name:'status'}
        ]
    });
});

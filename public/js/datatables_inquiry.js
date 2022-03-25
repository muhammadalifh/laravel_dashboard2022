
$(function(){
    $('#table-inquiry').DataTable({
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
        ajax: 'data-klien/json',
        columns:[
            {data: 'id', name: 'id'},
            {data:'inquiry_perusahaan', name:'inquiry_perusahaan'},
            {data:'inquiry_alamat', name:'inquiry_alamat'},
            {data:'inquiry_nama', name:'inquiry_nama'},
            {data:'inquiry_no_telp', name:'inquiry_no_telp'},
            {data:'inquiry_email', name:'inquiry_email'},
            {data: 'created_at', name:'created_at'},
            // {data:'inquiry_jenis_kegiatan', name:'inquiry_jenis_kegiatan'},
            // {data:'inquiry_lokasi_kegiatan', name:'inquiry_lokasi_kegiatan'},
            {data:'sumberairlimbah', name:'sumberairlimbah'},
            {data:'inquiry_debit_air_limbah', name:'inquiry_debit_air_limbah'},
            {data:'inquiry_penggunaan_air_bersih', name:'inquiry_penggunaan_air_bersih'},
            {data:'inquiry_jumlah_karyawan', name: 'inquiry_jumlah_karyawan'},
            {data:'inquiry_jumlah_penghuni', name: 'inquiry_jumlah_penghuni'},
            {data:'inquiry_jumlah_kamar', name: 'inquiry_jumlah_kamar'},
            {data:'inquiry_jumlah_bed', name: 'inquiry_jumlah_bed'},
            {data:'inquiry_kapasitas_produksi', name: 'inquiry_kapasitas_produksi'},
            // {data:'inquiry_jumlah_tamu', name: 'inquiry_jumlah_tamu'},
            // {data:'inquiry_upload_data', name:'inquiry_upload_data'},
            {data:'inquiry_luas_lahan_rencana', name:'inquiry_luas_lahan_rencana'},
            {data:'inquiry_keterangan_tambahan', name:'inquiry_keterangan_tambahan'},
            {data: 'action', name:'action'}
        ]
    });



});

$(document).on('click','.hapus_inquiry', function(event){
    let id = $(this).attr('id');
    event.preventDefault();
    swal({
        title: "Apakah Anda yakin?",
        text: "Data yang dihapus tidak dapat di kembalikan lagi!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result)=>{
        if (result) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: 'data-klien/hapus',
                type: 'post',
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(res){
                    console.log(res.data);
                    swal("Sukses!", "Data berhasil terhapus.", "success");
                    $('#table-inquiry').DataTable().ajax.reload();
                },
                error: function(xhr){
                    swal("Error Deleting!", "Please try again", "error");
                    // alert(xhr.responseJSON.text);
                }
            });
        }
    });

});



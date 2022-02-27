
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
            {data:'inquiry_perusahaan', name:'inquiry_perusahaan'},
            {data:'inquiry_alamat', name:'inquiry_alamat'},
            {data:'inquiry_nama', name:'inquiry_nama'},
            {data:'inquiry_no_telp', name:'inquiry_no_telp'},
            {data:'inquiry_email', name:'inquiry_email'},
            {data:'inquiry_jenis_kegiatan', name:'inquiry_jenis_kegiatan'},
            {data:'inquiry_lokasi_kegiatan', name:'inquiry_lokasi_kegiatan'},
            {data:'inquiry_sumber_air_limbah_id', name:'inquiry_sumber_air_limbah_id'},
            {data:'inquiry_debit_air_limbah', name:'inquiry_debit_air_limbah'},
            {data:'inquiry_luas_lahan_rencana', name:'inquiry_luas_lahan_rencana'},
            {data:'inquiry_penggunaan_air_bersih', name:'inquiry_penggunaan_air_bersih'},
            {data: 'inquiry_jumlah_karyawan', name: 'inquiry_jumlah_karyawan'},
            {data: 'inquiry_jumlah_tamu', name: 'inquiry_jumlah_tamu'},
            {data:'inquiry_upload_data', name:'inquiry_upload_data'},
            {data:'inquiry_keterangan_tambahan', name:'inquiry_keterangan_tambahan'},
        ]
    });



});



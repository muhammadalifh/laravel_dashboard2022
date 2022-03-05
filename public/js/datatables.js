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
            {data:'details', name:'details'},
            {data:'tahun', name:'tahun'},
            {data:'jenis', name:'jenis'},
            {data:'kapasitas', name:'kapasitas'},
            {data:'teknologi', name:'teknologi'},
            {data:'nilai_kontrak', name:'nilai_kontrak'},
            {data:'status', name:'status'},
            {data:'gallery', name:'gallery', render: function( data, type, full, meta ) {
                if(data == null)
                {
                    return "<img src='storage/upload/gallery/default.png' width='100px' height='100px'>";
                }
                else
                {
                    return "<img src='storage/upload/gallery/"+data+"' width='100px' height='100px'>";
                }
                // return '<a href="storage/upload/gallery/'+data+'" target="_blank"><i class="fa fa-image"></i></a>';

            }
            },
            {data:'action', name:'action'}
        ]
    });



    $('#simpan').on('click',function(){

        if($(this).text() == 'Update'){
            // console.log('Edit');
            edits();
        }
        // else
        // {
        //     tambah();
        // }

    });

    $('#simpan').on('click',function(){

        if($(this).text() == 'Simpan'){
            // console.log('Edit');
            tambah();
        }
        // else
        // {
        //     tambah();
        // }

    });


    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        // var edit_id = $(this).val();
        let id = $(this).attr('id');
        $('#EditModal').modal('show');
        $.ajax({
            url: 'portofolio/edits/',
            type: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                if(response.status == 404)
                {
                    alert(response.message);
                    $('#EditModal').modal('hide');
                }
                else
                {
                    $('#id').val(id);
                    $('#edit_klien_id').val(response.data.klien_id);
                    $('#edit_inquiry_id').val(response.data.inquiry_id);
                    $('#edit_perusahaan').val(response.data.perusahaan);
                    $('#edit_tahun').val(response.data.tahun);
                    $('#edit_jenis_id').val(response.data.jenis_id);
                    $('#edit_kapasitas').val(response.data.kapasitas);
                    $('#edit_teknologi_id').val(response.data.teknologi_id);
                    $('#edit_nilai_kontrak').val(response.data.nilai_kontrak);
                    $('#edit_status_id').val(response.data.status_id);
                    $('#edit_gallery').html("<img src='storage/upload/gallery/"+response.data.gallery+"' class='img-fluid img-thumbnail' width='100px' height='100px'>");
                }
            }

        // let id = $(this).attr('id');
        // $('#tambah').click();
        // $('#simpan').text('Simpan Edit');
        // $('#formportofoliotambah').text('Form Edit Portofolio');
        // $.ajax({
        //     url: 'portofolio/edits',
        //     type: 'post',
        //     data: {
        //         id: id,
        //         _token: $('meta[name="csrf-token"]').attr('content'),
        //     },
        //     success: function(res){
        //         $('#id').val(res.data.id);
        //         $('#klien_id').val(res.data.klien_id);
        //         $('#perusahaan').val(res.data.perusahaan);
        //         $('#tahun').val(res.data.tahun);
        //         $('#jenis_id').val(res.data.jenis_id);
        //         $('#kapasitas').val(res.data.kapasitas);
        //         $('#teknologi_id').val(res.data.teknologi_id);
        //         $('#nilai_kontrak').val(res.data.nilai_kontrak);
        //         $('#status_id').val(res.data.status_id);
        //         $('#gallery').val(res.data.gallery);
        //     }
        // });
        });
    });

    function edits(){
        $(document).on('submit','#formportofolioupdate',function(e){
        e.preventDefault();
        // let id =$(this).attr('id');
        const EditformData = new FormData($(this)[0]);
        $.ajax({
            url: 'portofolio/update/',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: EditformData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            // data: {
            //     id: $('#id').val(),
            //     klien_id: $('#klien_id').val(),
            //     perusahaan: $('#perusahaan').val(),
            //     tahun: $('#tahun').val(),
            //     jenis_id: $('#jenis_id').val(),
            //     kapasitas: $('#kapasitas').val(),
            //     teknologi_id: $('#teknologi_id').val(),
            //     nilai_kontrak: $('#nilai_kontrak').val(),
            //     status_id: $('#status_id').val(),
            //     gallery: $('#gallery').val(),
            //     _token: $('meta[name="csrf-token"]').attr('content')
            // },
            success: function(response){
                // console.log(response.data);
                swal("Sukses!", "Data berhasil diperbaharui.", "success");
                // alert(res.data.text)
                // $('#tutup').click();
                // $('#table-index-portofolio').DataTable().ajax.reload();
                // $('#klien_id').val(null);
                // $('#perusahaan').val(null);
                // $('#tahun').val(null);
                // $('#jenis_id').val(null);
                // $('#kapasitas').val(null);
                // $('#teknologi_id').val(null);
                // $('#nilai_kontrak').val(null);
                // $('#status_id').val(null);
                // $('#gallery').val(null);
                // $('#simpan').text('Simpan');
                $("#edit_simpan").text('Update');
                $("#formportofolioupdate")[0].reset();
                $("#EditModal").modal('hide');
            }
            // error: function(xhr){
            //     swal("Error Editing!", "Please try again", "error");
            //     // alert(xhr.responseJSON.text);
            // }
        });

        });
    }

    function tambah(){
        // $(document).ready(function(){
            $(document).on('submit','#formportofoliotambah',function(e){
                e.preventDefault();
                let formData = new FormData($(this)[0]);
                $("#simpan").text('Loading...');
                $.ajax({
                    url: 'portofolio/store',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    contentType: false,
                    processData: false,

                    // data: {
                    //     klien_id: $('#klien_id').val(),
                    //     perusahaan: $('#perusahaan').val(),
                    //     tahun: $('#tahun').val(),
                    //     jenis_id: $('#jenis_id').val(),
                    //     kapasitas: $('#kapasitas').val(),
                    //     teknologi_id: $('#teknologi_id').val(),
                    //     nilai_kontrak: $('#nilai_kontrak').val(),
                    //     status_id: $('#status_id').val(),
                    //     gallery: $('#gallery').val(),
                    //     _token: $('meta[name="csrf-token"]').attr('content')
                    // },
                    success: function(res){
                        console.log(res.data);
                        swal("Sukses!", "Data berhasil ditambahkan.", "success");
                        // alert(res.data.text)
                        $('#tutup').click()
                        $("#simpan").text('Simpan');
                        $('#table-index-portofolio').DataTable().ajax.reload();
                        $('#inquiry_id').val(null);
                        $('#klien_id').val(null);
                        $('#perusahaan').val(null);
                        $('#tahun').val(null);
                        $('#jenis_id').val(null);
                        $('#kapasitas').val(null);
                        $('#teknologi_id').val(null);
                        $('#nilai_kontrak').val(null);
                        $('#status_id').val(null);
                        $('#gallery').val(null);
                    },
                    error: function(xhr){
                        swal("Error Creating!", "Please try again", "error");
                        // alert(xhr.responseJSON.text);
                    }
                });
            });
        // });

    }




    $(document).on('click', '.details', function(e){
        e.preventDefault();
        // var edit_id = $(this).val();
        let detail_id = $(this).attr('id');
        $('#DetailModal').modal('show');
        $.ajax({
            url: 'portofolio/details/',
            type: 'get',
            data: {
                detail_id: detail_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                if(response.status == 404)
                {
                    alert(response.message);
                    $('#DetailModal').modal('hide');
                }
                else
                {
                    $('#detail_id').val(detail_id);
                    $('#detail_klien_id').val(response.data.klien_id);
                    // $('#detail_perusahaan').val(response.data.perusahaan);
                    $('#detail_tahun').val(response.data.tahun);
                    $('#detail_jenis_id').val(response.data.jenis_id);
                    $('#detail_kapasitas').val(response.data.kapasitas);
                    $('#detail_teknologi_id').val(response.data.teknologi_id);
                    // $('#detail_nilai_kontrak').val(response.data.nilai_kontrak);
                    $('#detail_status_id').val(response.data.status_id);
                    $('#detail_inquiry_id').val(response.data.inquiry_id);
                    $('#inquiry_perusahaan').val(response.data.inquiry.inquiry_perusahaan);
                    $('#inquiry_alamat').val(response.data.inquiry.inquiry_alamat);
                    $('#inquiry_no_telp').val(response.data.inquiry.inquiry_no_telp);
                    $('#inquiry_email').val(response.data.inquiry.inquiry_email);
                    $('#inquiry_nama').val(response.data.inquiry.inquiry_nama);
                    // console.log(response.data.inquiry_id);
                    // console.log(response.data.inquiry_perusahaan);
                    // console.log(response.data.inquiry_alamat);
                }
            }
        });
    });


    $(document).on('click','.hapus', function(event){
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
                    },
                    error: function(xhr){
                        swal("Error Deleting!", "Please try again", "error");
                        // alert(xhr.responseJSON.text);
                    }
                });
            }
        });

    });

});



$(function(){

    // let perusahaan = $('#filter-perusahaan').val();
    // let tahun = $('#filter-tahun').val();
    let klien = $('#filter-klien').val();
    let jenis = $('#filter-jenis').val();
    let teknologi = $('#filter-teknologi').val();
    let status = $('#filter-status').val();

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
        ajax:{
            url: 'filter/json',
    type: 'post',
            data: function(d){
                // d.perusahaan = $('#filter-perusahaan').val();
                // d.tahun = $('#filter-tahun').val();
                url: 'serverside/json',
                d.klien = $('#filter-klien').val();
                d.jenis = $('#filter-jenis').val();
                d.teknologi = $('#filter-teknologi').val();
                d.status = $('#filter-status').val();
                return d;
            },
        },
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

    $(function(){
        $('#filter-perusahaan').on('change',function(){
            perusahaan = $(this).val();
            console.log(perusahaan);
            $('#table-server').DataTable().ajax.reload(null, false);
        });
    });

    $(function(){
        $('#filter-tahun').on('change',function(){
            tahun = $(this).val();
            console.log(tahun);
            $('#table-server').DataTable().ajax.reload(null, false);
        });
    });


    $(function(){
        $('#filter-klien').on('change',function(){
            klien = $(this).val();
            console.log(klien);
            $('#table-server').DataTable().ajax.reload(null, false);
        });
    });

    $(function(){
        $('#filter-jenis').on('change',function(){
            jenis = $(this).val();
            console.log(jenis);
            $('#table-server').DataTable().ajax.reload(null, false);
        });
    });

    $(function(){
        $('#filter-teknologi').on('change',function(){
            teknologi = $(this).val();
            console.log(teknologi);
            $('#table-server').DataTable().ajax.reload(null, false);
        });
    });

    $(function(){
        $('#filter-status').on('change',function(){
            status = $(this).val();
            console.log(status);
            $('#table-server').DataTable().ajax.reload(null, false);
        });
    });

    $('#reset').click(function(){
        $('#filter-klien').val('');
        $('#filter-jenis').val('');
        $('#filter-teknologi').val('');
        $('#filter-status').val('');
        // $('#table-server').DataTable().destroy();
        $('#table-server').DataTable().ajax.reload(null, false);
    });


    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('nilai_kontrak');
    var edit_dengan_rupiah = document.getElementById('edit_nilai_kontrak');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    edit_dengan_rupiah.addEventListener('keyup', function(e)
    {
        edit_dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
    }

    // var dengan_rupiah = document.getElementById('edit_nilai_kontrak');
    // dengan_rupiah.addEventListener('keyup', function(e)
    // {
    //     dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    // });

    // /* Fungsi */
    // function formatRupiah(angka, prefix)
    // {
    //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
    //         split    = number_string.split(','),
    //         sisa     = split[0].length % 3,
    //         rupiah     = split[0].substr(0, sisa),
    //         ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

    //     if (ribuan) {
    //         separator = sisa ? '.' : '';
    //         rupiah += separator + ribuan.join('.');
    //     }

    //     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    //     return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
    // }

    // $(function(){
    //     $(".filter").on('change', function(){
    //         let klien = $('#filter-klien').val();
    //         let jenis = $('#filter-jenis').val();
    //         let status = $('#filter-status').val();
    //         console.log([klien, jenis, status]);
    //     });
    // });




});

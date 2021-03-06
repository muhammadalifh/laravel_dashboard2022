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
            // {data:'teknologi', name:'teknologi'},
            {data:'nilai_kontrak', name:'nilai_kontrak'},
            {data:'status', name:'status'},
            {data:'gallery', name:'gallery', render: function( data, type, full, meta ) {
                if(data == null)
                {
                    return "<a target='_blank' href='storage/upload/gallery/default.png'><img src='storage/upload/gallery/default.png' width='100px' height='100px'></a>";
                }
                else
                {
                    var img = data.split(",");
                    for(var i=0; i<img.length; i++)
                    {
                        if(img[i] == "")
                        {
                            return "<a target='_blank' href='storage/upload/gallery/default.png'><img src='storage/upload/gallery/default.png' width='100px' height='100px'></a>";
                        }
                        else
                        {
                            // create looping for image gallery and carousel slider bootstrap 5 and it will add to the coulmn table with bootstrap carousel slider and bootstrap 5 carousel slider
                            var html = "<div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel'>";

                            // html += "<ol class='carousel-indicators'>";
                            // for(var j=0; j<img.length; j++)
                            // {
                            //     if(j == 0)
                            //     {
                            //         html += "<li data-target='#carouselExampleIndicators' data-slide-to='"+j+"' class='active'></li>";
                            //     }
                            //     else
                            //     {
                            //         html += "<li data-target='#carouselExampleIndicators' data-slide-to='"+j+"'></li>";
                            //     }
                            // }
                            // html += "</ol>";
                            html += "<div class='carousel-inner'>";
                            for(var k=0; k<img.length; k++)
                            {
                                if(k == 0)
                                {
                                    html += "<div class='carousel-item active'>";
                                    html += "<a target='_blank' href='/"+img[k]+"'><img src='/"+img[k]+"' width='100px' height='100px'></a>";
                                    html += "</div>";
                                }
                                else
                                {
                                    html += "<div class='carousel-item'>";
                                    html += "<a target='_blank' href='/"+img[k]+"'><img src='/"+img[k]+"' width='100px' height='100px'></a>";
                                    html += "</div>";
                                }
                            }
                            html += "</div>";
                            // html += "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>";
                            // html += "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                            // html += "<span class='sr-only'>Previous</span>";
                            // html += "</button>";
                            // html += "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>";
                            // html += "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                            // html += "<span class='sr-only'>Next</span>";
                            // html += "</button>";
                            html += "</div>";
                            $(document).ready(function(){
                                $('.carousel').carousel({
                                    interval: 3000
                                });
                            });

                            $('[id^=carouselExampleIndicators]').click(function(){
                                var id_carousel = $(this).attr('id');
                                var id = id_carousel.substring(id_carousel.length - 1);
                                id = parseInt(id);
                                $('#carouselExampleIndicators').carousel(id);
                                $('[id^=carouselExampleIndicators]').removeClass('active');
                                $('#carouselExampleIndicators'+id).addClass('active');
                            });

                            $('#carouselExampleIndicators').on('slide.bs.carousel', function (e) {
                                var id = $(e.relatedTarget).attr('data-slide-to');
                                id = parseInt(id);
                                $('[id^=carouselExampleIndicators]').removeClass('active');
                                $('#carouselExampleIndicators'+id).addClass('active');
                            });

                            return html;
                            // return "<div class='bxslider'><a href='/"+data+"'><img src='/"+data+"' width='100px' height='100px'></a></div>";
                        }
                    }













                    // var img = data.split(",");
                    // var html = "";
                    // $.each(img, function(index, value) {
                    //     html += "<img src='/"+value+"' width='100px' height='100px'>";
                    // });
                    // return html;

                    // for(var i=0; i<img.length; i++)
                    // {
                    //     if(img[i] == "")
                    //     {
                    //         return "<img src='storage/upload/gallery/default.png' width='100px' height='100px'>";
                    //     }
                    //     else
                    //     {
                    //         do {
                    //             return "<img src='/"+img[i]+"' width='100px' height='100px'>";
                    //         } while (i<img.length);
                    //     }
                    // }
                    // return "<img src='/"+data+"' width='100px' height='100px'>";
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
                    // $('#edit_teknologi_id').val(response.data.teknologi_id);
                    $('#edit_nilai_kontrak').val(response.data.nilai_kontrak);
                    $('#edit_status_id').val(response.data.status_id);
                    $('#edit_gallery').html("<img src='storage/upload/gallery/"+response.data.gallery+"' class='img-fluid img-thumbnail' width='100px' height='100px'>");
                    $('#edit_penawaran').val(response.data.penawaran);
                    $('#edit_spk_po_wo').val(response.data.spk_po_wo);
                    $('#edit_berita_acara_instal').val(response.data.berita_acara_instal);
                    $('#edit_berita_acara_comisioning').val(response.data.berita_acara_comisioning);
                    $('#edit_berita_acara_sampling').val(response.data.berita_acara_sampling);
                    $('#edit_laporan_hasil_uji').val(response.data.laporan_hasil_uji);
                    $('#edit_berita_acara_kerja_tambah').val(response.data.berita_acara_kerja_tambah);
                    $('#edit_berita_acara_serah_terima').val(response.data.berita_acara_serah_terima);
                    $('#edit_gambar_desain').val(response.data.gambar_desain);
                    $('#edit_gambar_asbuilt').val(response.data.gambar_asbuilt);
                    $('#edit_sop').val(response.data.sop);
                    $('#edit_dokumentasi').val(response.data.dokumentasi);
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
                swal("Sukses!", "Data berhasil diperbatui.", "success");
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
                        // $('#teknologi_id').val(null);
                        $('#nilai_kontrak').val(null);
                        $('#status_id').val(null);
                        $('#gallery').val(null);
                        $('#penawaran').val(null);
                        $('#spk_po_wo').val(null);
                        $('#berita_acara_instal').val(null);
                        $('#berita_acara_comisioning').val(null);
                        $('#berita_acara_sampling').val(null);
                        $('#laporan_hasil_uji').val(null);
                        $('#berita_acara_kerja_tambah').val(null);
                        $('#berita_acara_serah_terima').val(null);
                        $('#gambar_desain').val(null);
                        $('#gambar_asbuilt').val(null);
                        $('#sop').val(null);
                        $('#dokumentasi').val(null);
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
                    $('#DetailModal').on('hidden.bs.modal', function (e) {
                        this.click(window.location.reload());
                    });

                    const data = response.data;
                    // const link = document.createElement('a');

                    // DATA ADMIN
                    const penawaran_link = document.createElement('a');
                    const download_penawaran_link = document.createElement('a');
                    const spk_po_wo_link = document.createElement('a');
                    const download_spk_po_wo_link = document.createElement('a');
                    const berita_acara_instal_link = document.createElement('a');
                    const download_berita_acara_instal_link = document.createElement('a');
                    const berita_acara_comisioning_link = document.createElement('a');
                    const download_berita_acara_comisioning_link = document.createElement('a');
                    const berita_acara_sampling_link = document.createElement('a');
                    const download_berita_acara_sampling_link = document.createElement('a');
                    const laporan_hasil_uji_link = document.createElement('a');
                    const download_laporan_hasil_uji_link = document.createElement('a');
                    const berita_acara_kerja_tambah_link = document.createElement('a');
                    const download_berita_acara_kerja_tambah_link = document.createElement('a');
                    const berita_acara_serah_terima_link = document.createElement('a');
                    const download_berita_acara_serah_terima_link = document.createElement('a');


                    // PENAWARAN
                    penawaran_link.href = ('storage'+'/'+data.penawaran);
                    penawaran_link.setAttribute('target', '_blank');
                    penawaran_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.penawaran == null){
                        penawaran_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_penawaran').html(penawaran_link);
                    }

                    download_penawaran_link.href = ('storage'+'/'+data.penawaran);
                    download_penawaran_link.setAttribute('download','PENAWARAN', '_blank');
                    download_penawaran_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.penawaran == null){
                        download_penawaran_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_penawaran').html(download_penawaran_link);
                    }

                    // SPK/PO/WO
                    spk_po_wo_link.href = ('storage'+'/'+data.spk_po_wo);
                    spk_po_wo_link.setAttribute('target', '_blank');
                    spk_po_wo_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.spk_po_wo == null){
                        spk_po_wo_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_spk_po_wo').html(spk_po_wo_link);
                    }

                    download_spk_po_wo_link.href = ('storage'+'/'+data.spk_po_wo);
                    download_spk_po_wo_link.setAttribute('download','SPK/PO/WO', '_blank');
                    download_spk_po_wo_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.spk_po_wo == null){
                        download_spk_po_wo_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_spk_po_wo').html(download_spk_po_wo_link);
                    }

                    // BERITA ACARA INSTAL
                    berita_acara_instal_link.href = ('storage'+'/'+data.berita_acara_instal);
                    berita_acara_instal_link.setAttribute('target', '_blank');
                    berita_acara_instal_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.berita_acara_instal == null){
                        berita_acara_instal_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_berita_acara_instal').html(berita_acara_instal_link);
                    }

                    download_berita_acara_instal_link.href = ('storage'+'/'+data.berita_acara_instal);
                    download_berita_acara_instal_link.setAttribute('download','BERITA ACARA INSTAL', '_blank');
                    download_berita_acara_instal_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.berita_acara_instal == null){
                        download_berita_acara_instal_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_berita_acara_instal').html(download_berita_acara_instal_link);
                    }

                    // BERITA ACARA COMISIONING
                    berita_acara_comisioning_link.href = ('storage'+'/'+data.berita_acara_comisioning);
                    berita_acara_comisioning_link.setAttribute('target', '_blank');
                    berita_acara_comisioning_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.berita_acara_comisioning == null){
                        berita_acara_comisioning_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_berita_acara_comisioning').html(berita_acara_comisioning_link);
                    }

                    download_berita_acara_comisioning_link.href = ('storage'+'/'+data.berita_acara_comisioning);
                    download_berita_acara_comisioning_link.setAttribute('download','BERITA ACARA COMISIOING', '_blank');
                    download_berita_acara_comisioning_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.berita_acara_comisioning == null){
                        download_berita_acara_comisioning_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_berita_acara_comisioning').html(download_berita_acara_comisioning_link);
                    }

                    // BERITA ACARA SAMPLING
                    berita_acara_sampling_link.href = ('storage'+'/'+data.berita_acara_sampling);
                    berita_acara_sampling_link.setAttribute('target', '_blank');
                    berita_acara_sampling_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.berita_acara_sampling == null){
                        berita_acara_sampling_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_berita_acara_sampling').html(berita_acara_sampling_link);
                    }

                    download_berita_acara_sampling_link.href = ('storage'+'/'+data.berita_acara_sampling);
                    download_berita_acara_sampling_link.setAttribute('download','BERITA ACARA SAMPLING', '_blank');
                    download_berita_acara_sampling_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.berita_acara_sampling == null){
                        download_berita_acara_sampling_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_berita_acara_sampling').html(download_berita_acara_sampling_link);
                    }

                    // LAPORAN HASIL UJI
                    laporan_hasil_uji_link.href = ('storage'+'/'+data.laporan_hasil_uji);
                    laporan_hasil_uji_link.setAttribute('target', '_blank');
                    laporan_hasil_uji_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.laporan_hasil_uji == null){
                        laporan_hasil_uji_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_laporan_hasil_uji').html(laporan_hasil_uji_link);
                    }

                    download_laporan_hasil_uji_link.href = ('storage'+'/'+data.laporan_hasil_uji);
                    download_laporan_hasil_uji_link.setAttribute('download','LAPORAN HASIL UJI', '_blank');
                    download_laporan_hasil_uji_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.laporan_hasil_uji == null){
                        download_laporan_hasil_uji_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_laporan_hasil_uji').html(download_laporan_hasil_uji_link);
                    }

                    // BERITA ACARA KERJA TAMBAH
                    berita_acara_kerja_tambah_link.href = ('storage'+'/'+data.berita_acara_kerja_tambah);
                    berita_acara_kerja_tambah_link.setAttribute('target', '_blank');
                    berita_acara_kerja_tambah_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.berita_acara_kerja_tambah == null){
                        berita_acara_kerja_tambah_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_berita_acara_kerja_tambah').html(berita_acara_kerja_tambah_link);
                    }

                    download_berita_acara_kerja_tambah_link.href = ('storage'+'/'+data.berita_acara_kerja_tambah);
                    download_berita_acara_kerja_tambah_link.setAttribute('download','BERITA ACARA KERJA TAMBAH', '_blank');
                    download_berita_acara_kerja_tambah_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.berita_acara_kerja_tambah == null){
                        download_berita_acara_kerja_tambah_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_berita_acara_kerja_tambah').html(download_berita_acara_kerja_tambah_link);
                    }

                    // BERITA ACARA SERAH TERIMA
                    berita_acara_serah_terima_link.href = ('storage'+'/'+data.berita_acara_serah_terima);
                    berita_acara_serah_terima_link.setAttribute('target', '_blank');
                    berita_acara_serah_terima_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.berita_acara_serah_terima == null){
                        berita_acara_serah_terima_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_berita_acara_serah_terima').html(berita_acara_serah_terima_link);
                    }

                    download_berita_acara_serah_terima_link.href = ('storage'+'/'+data.berita_acara_serah_terima);
                    download_berita_acara_serah_terima_link.setAttribute('download','BERITA ACARA SERAH TERIMA', '_blank');
                    download_berita_acara_serah_terima_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.berita_acara_serah_terima == null){
                        download_berita_acara_serah_terima_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_berita_acara_serah_terima').html(download_berita_acara_serah_terima_link);
                    }



                    //DATA TEKNIS
                    const gambar_desain_link = document.createElement('a');
                    const download_gambar_desain_link = document.createElement('a');
                    const gambar_asbuilt_link = document.createElement('a');
                    const download_gambar_asbuilt_link = document.createElement('a');
                    const sop_link = document.createElement('a');
                    const download_sop_link = document.createElement('a');
                    const dokumentasi_link = document.createElement('a');
                    const download_dokumentasi_link = document.createElement('a');

                    // GAMBAR DESAIN
                    gambar_desain_link.href = ('storage'+'/'+data.gambar_desain);
                    gambar_desain_link.setAttribute('target', '_blank');
                    gambar_desain_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.gambar_desain == null){
                        gambar_desain_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_gambar_desain').html(gambar_desain_link);
                    }

                    download_gambar_desain_link.href = ('storage'+'/'+data.gambar_desain);
                    download_gambar_desain_link.setAttribute('download','GAMBAR DESAIN', '_blank');
                    download_gambar_desain_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.gambar_desain == null){
                        download_gambar_desain_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_gambar_desain').html(download_gambar_desain_link);
                    }

                    // GAMBAR DESAIN
                    gambar_asbuilt_link.href = ('storage'+'/'+data.gambar_asbuilt);
                    gambar_asbuilt_link.setAttribute('target', '_blank');
                    gambar_asbuilt_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.gambar_asbuilt == null){
                        gambar_asbuilt_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_gambar_asbuilt').html(gambar_asbuilt_link);
                    }

                    download_gambar_asbuilt_link.href = ('storage'+'/'+data.gambar_asbuilt);
                    download_gambar_asbuilt_link.setAttribute('download','GAMBAR ASBUILT', '_blank');
                    download_gambar_asbuilt_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.gambar_asbuilt == null){
                        download_gambar_asbuilt_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_gambar_asbuilt').html(download_gambar_asbuilt_link);
                    }

                    // SOP
                    sop_link.href = ('storage'+'/'+data.sop);
                    sop_link.setAttribute('target', '_blank');
                    sop_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.sop == null){
                        sop_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_sop').html(sop_link);
                    }

                    download_sop_link.href = ('storage'+'/'+data.sop);
                    download_sop_link.setAttribute('download','SOP', '_blank');
                    download_sop_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.sop == null){
                        download_sop_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_sop').html(download_sop_link);
                    }

                    // DOKUMENTASI
                    dokumentasi_link.href = ('storage'+'/'+data.dokumentasi);
                    dokumentasi_link.setAttribute('target', '_blank');
                    dokumentasi_link.innerHTML = '<i class="far fa-eye"></i>';
                    if(data.dokumentasi == null){
                        dokumentasi_link.innerHTML = '<i disabled class="far fa-eye-slash"></i>';
                    }
                    else
                    {
                        $('#detail_dokumentasi').html(dokumentasi_link);
                    }

                    download_dokumentasi_link.href = ('storage'+'/'+data.dokumentasi);
                    download_dokumentasi_link.setAttribute('download','DOKUMENTASI', '_blank');
                    download_dokumentasi_link.innerHTML = '<i class="fas fa-download"></i>';
                    if(data.dokumentasi == null){
                        download_dokumentasi_link.innerHTML = '<i disabled class="fas fa-download"></i>';
                    }
                    else
                    {
                        $('#download_detail_dokumentasi').html(download_dokumentasi_link);
                    }


                    $('#detail_id').val(detail_id);
                    $('#detail_klien_id').val(response.data.klien_id);
                    // $('#detail_perusahaan').val(response.data.perusahaan);
                    $('#detail_tahun').val(response.data.tahun);
                    $('#detail_jenis_id').val(response.data.jenis_id);
                    $('#detail_kapasitas').val(response.data.kapasitas);
                    // $('#detail_teknologi_id').val(response.data.teknologi_id);
                    // $('#detail_nilai_kontrak').val(response.data.nilai_kontrak);
                    $('#detail_status_id').val(response.data.status_id);
                    $('#detail_inquiry_id').val(response.data.inquiry_id);
                    $('#inquiry_perusahaan').val(response.data.inquiry.inquiry_perusahaan);
                    $('#inquiry_alamat').val(response.data.inquiry.inquiry_alamat);
                    $('#inquiry_no_telp').val(response.data.inquiry.inquiry_no_telp);
                    $('#inquiry_email').val(response.data.inquiry.inquiry_email);
                    $('#inquiry_nama').val(response.data.inquiry.inquiry_nama);

                    //DATA ADMIN
                    // $('#detail_penawaran').val(response.data.penawaran);
                    // $('#detail_spk_po_wo').val(response.data.spk_po_wo);
                    // $('#detail_berita_acara_instal').val(response.data.berita_acara_instal);
                    // $('#detail_berita_acara_comisioning').val(response.data.berita_acara_comisioning);
                    // $('#detail_berita_acara_sampling').val(response.data.berita_acara_sampling);
                    // $('#detail_laporan_hasil_uji').val(response.data.laporan_hasil_uji);
                    // $('#detail_berita_acara_kerja_tambah').val(response.data.berita_acara_kerja_tambah);
                    // $('#detail_berita_acara_serah_terima').val(response.data.berita_acara_serah_terima);


                    // // DATA TEKNIS
                    // $('#detail_gambar_desain').val(response.data.gambar_desain);
                    // $('#detail_gambar_asbuilt').val(response.data.gambar_asbuilt);
                    // $('#detail_sop').val(response.data.sop);
                    // $('#detail_dokumentasi').val(response.data.dokumentasi);



                    // console.log(response.data.inquiry_id);
                    // console.log(response.data.inquiry_perusahaan);
                    // console.log(response.data.penawaran);
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
                        alert(xhr.responseJSON.text);
                        console.log(xhr.responseJSON.text);
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

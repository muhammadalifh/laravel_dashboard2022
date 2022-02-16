
$(function(){
    $('#table-index-user').DataTable({
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
        ajax: 'users/json',
        columns:[
            {data:'name', name:'name'},
            {data:'email', name:'email'},
            {data:'role', name:'role'},
            {data:'action', name:'action'}
        ]
    });

    $('#simpan').on('click',function(){

        if($(this).text() == 'Simpan Edit'){
            // console.log('Edit');
            edits_user();
        }
        else
        {
            tambah_user();
        }

    });


    $(document).on('click', '.edit_users', function(){
        let id = $(this).attr('id');
        $('#tambah').click();
        $('#simpan').text('Simpan Edit');
        $.ajax({
            url: 'users/edits_users',
            type: 'post',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(res){
                $('#id').val(res.data.id);
                $('#nama').val(res.data.name);
                $('#email').val(res.data.email);
                $('#role').val(res.data.role);
                // $('#password').val(res.data.password);
            }
        });
    });

    function tambah_user(){
        $.ajax({
            url: 'users/store_users',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                nama: $('#nama').val(),
                email: $('#email').val(),
                role: $('#role').val(),
                password: $('#password').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res){
                console.log(res.data);
                swal("Sukses!", "Data User berhasil ditambahkan.", "success");
                // alert(res.data.text)
                $('#tutup').click()
                $('#table-index-user').DataTable().ajax.reload();
                $('#nama').val(null);
                $('#email').val(null);
                $('#role').val(null);
                $('#password').val(null);
            }
            // error: function(xhr){
            //     swal("Error Create User!", "Please try again", "error");
            //     // alert(xhr.responseJSON.text);
            // }
        });
    }

    function edits_user(){
        $.ajax({
            url: 'users/updates_users',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: $('#id').val(),
                nama: $('#nama').val(),
                email: $('#email').val(),
                role: $('#role').val(),
                // password: $('#password').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res){
                console.log(res.data);
                swal("Sukses!", "Data berhasil diperbaharui.", "success");
                $('#tutup').click();
                $('#table-index-user').DataTable().ajax.reload();
                $('#nama').val(null);
                $('#email').val(null);
                $('#role').val(null);
                // $('#password').val(null);
                $('#simpan').text('Simpan');
            }
            // error: function(xhr){
            //     swal("Error Editing User!", "Please try again", "error");
            //     // alert(xhr.responseJSON.text);
            // }
        });
    }


    // $(document).on('click','.hapus_users', function(){
    //     let id = $(this).attr('id')
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url: 'users/hapus_users',
    //         type: 'post',
    //         data: {
    //             id: id,
    //             _token: $('meta[name="csrf-token"]').attr('content'),
    //         },
    //         success: function(res){
    //             console.log(res.data);
    //             swal("Sukses!", "Data berhasil terhapus.", "success");
    //             $('#table-index-user').DataTable().ajax.reload();
    //         }
    //     });
    // });

    $(document).on('click','.hapus_users', function(event){
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
                    url: 'users/hapus_users',
                    type: 'post',
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(res){
                        console.log(res.data);
                        swal("Sukses!", "Data berhasil terhapus.", "success");
                        $('#table-index-user').DataTable().ajax.reload();
                    }
                    // error: function(xhr){
                    //     swal("Error Deleting User!", "Please try again", "error");
                    //     // alert(xhr.responseJSON.text);
                    // }
                });
            }
        });

    });

});



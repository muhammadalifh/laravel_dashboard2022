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
    $('#table-striped').DataTable({
        processing:true,
        serverSide:true,
        ajax: 'filter/json',
        columns:[
            {data:'klien_id', name:'klien_id'},
            {data:'perusahaan', name:'perusahaan'},
            {data:'tahun', name:'tahun'},
            {data:'jenis_id', name:'jenis_id'},
            {data:'kapasitas', name:'kapasitas'},
            {data:'teknologi_id', name:'teknologi_id'},
            {data:'nilai_kontrak', name:'nilai_kontrak'},
            {data:'status_id', name:'status_id'}
        ]
    });
});

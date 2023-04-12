$(function (){
    $.ajaxSetup({
        headers: {  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
    });
});


$(function(){
    $('#provinsi').on('change', function(){
        let id_provinsi = $('#provinsi').val();

        $.ajax({
            type : 'POST',
            url : "/get-kabupaten",
            data : {id_provinsi:id_provinsi},
            cache : false,

            success:function(msg){
                $('#kabupaten').html(msg);
                $('#kecamatan').html("<option>- Pilih Kecamatan -</option>");
                $('#kelurahan').html("<option>- Pilih Kelurahan -</option>");
            },
            error: function(data){
                console.log('error : ', data)
            },
        })
    })

    $('#kabupaten').on('change', function(){
        let id_kabupaten = $('#kabupaten').val();

        $.ajax({
            type : 'POST',
            url : "/get-kecamatan",
            data : {id_kabupaten:id_kabupaten},
            cache : false,

            success:function(msg){
                $('#kecamatan').html(msg);
                $('#kelurahan').html("<option>- Pilih Kelurahan -</option>");
            },
            error: function(data){
                console.log('error : ', data)
            },
        })
    })

    $('#kecamatan').on('change', function(){
        let id_kecamatan = $('#kecamatan').val();

        $.ajax({
            type : 'POST',
            url : "/get-kelurahan",
            data : {id_kecamatan:id_kecamatan},
            cache : false,

            success:function(msg){
                $('#kelurahan').html(msg);
            },
            error: function(data){
                console.log('error : ', data)
            },
        })
    })
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



$(document).ready(function(){
    $('#btn-down').click(function(){
        const num = $("#btn-down").val();
        alert(num);
    })
})


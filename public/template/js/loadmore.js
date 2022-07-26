$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function loadMore(){

    const page = $("#page").val();
    console.log(page);
    $.ajax({
        type:"POST",
        dataType:"json",
        data:{page},
        url:'/services/load-product',
        success: function(result){
            if(result.html != ''){
                $('#loadProduct').append(result.html);
                $('#page').val(Number(page)+1);
            }
            else {
                alert('het sp');
                $('#loadMore').hide();
            }
        },
    });
}
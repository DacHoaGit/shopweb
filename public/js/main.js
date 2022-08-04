$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url){
    if(confirm('Are you sure you want to delete?')){
        console.log(111);
        $.ajax({
            type:'DELETE',
            datatype:'json',
            data:{id},
            url:url,
            success:function(result){
                if (result.error==false){
                    alert(result.message);
                    location.reload();
                }
                else{
                    alert('delete failed');
                }
            }
        })
    }
}

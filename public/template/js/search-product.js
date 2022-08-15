function searchProduct(search){
    const q = search.value;
    if(q.length > 2){
        $.ajax({
            type:'get',
            data:{q},
            url:'/search',
            success:function(result){
                if(result['success']==false){
                    $('.display-search').html('');
                }
                $('.display-search').html(result);
            }
        })
    }
    $('.display-search').html('');
}
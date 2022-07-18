
@extends('admin.home')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{$product->name}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Catalog</label>
        <select class="form-control " name="parent_id"   id="parent_id">>
            {{-- <option value="0">Parent list</option> --}}
            
        </select>
    </div>
    <div class="form-row select-location">
        <div class="form-group col-6">
            <label>Price</label>
            <input class="form-control" name="price" value="{{$product->price}}" type="number" min="0" step="any" />
        </div>

        <div class="form-group col-6">
            <label>Price Sale</label>
            <input class="form-control" name="price_sale" type="number" min="0" value="{{$product->price_sale}}"  step="any" />
        </div>
    </div> 

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="2"  name="description">{{$product->description}}</textarea>
    </div>

    <div class="form-group">
        <label>Description Detail</label>
        <textarea class="form-control" rows="5"  name="content">{{$product->content}}</textarea>
    </div>

    <div class="form-group col-3">
        <label>Photo</label>
        <div class="input-group">
            <div class="custom-file">
                <label class="custom-file-label" for="upload_product" id="name_photo"></label>
                <input type="file" class="custom-file-input form-control" id="upload_product"  name="photo_product"  oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                <input type="hidden" name = "file" id = "file" value="{{$product->thumb}}">
            </div>
        </div>
        <img id="pic" height="100" src="{{$product->thumb}}" />
    </div>

    <div class="mt-3">
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" {{$product->active==0 ? 'checked = "checked"' : ''}} name="active" class="custom-control-input" value="0">
            <label class="custom-control-label" for="customRadio1" >Yes</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="active" class="custom-control-input"  {{$product->active==1 ? 'checked = "checked"' : ''}} value= "1">
            <label class="custom-control-label" for="customRadio2" >No</label>
        </div>
    </div> 
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2 mt-2">Update</button>
    </div>  
    @csrf
</form>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        $.ajax({
                url: '{{route('listApi')}}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }} },
                success: function (response) {
                    // console.log(data);
                    response.data.forEach(function (each) {
                        if(each.id=={{$product->menu_id}}){
                            console.log(10);
                            $("#parent_id").append("<option selected value="+each.id+">"+each.name+"</option>");
                        }
                        else{
                            console.log(12);


                            $("#parent_id").append("<option value="+each.id+">"+each.name+"</option>");
                        }
                    });
                    // renderPagination(response.data.pagination);
                },
                error: function (response) {

                    $.toast({

                        heading: 'Import Error',
                        text: response.responseJSON.message,
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        icon: 'error'
                    })
                }
            });
        $('#upload_product').change(function(){
            $("#name_photo").text(this.files[0].name)
            
            
            

            alert('gaga');
            var formData = new FormData();
            formData.append('file', $('#upload_product').get(0).files[0]);
            $.ajax({
                type: "POST",
                url: '{{route('upload')}}',
                data: formData,
                processData: false,
                contentType: false,
                dataType:'json',
                success: function (data) {
                    console.log(data);
                    if(data.error == "false"){
                        console.log(data);
                        $('#file').val(data.url);
                    } 
                    else{
                        $.toast({
                            heading: 'Import Error',
                            text: 'upload file error',
                            showHideTransition: 'slide',
                            position: 'bottom-right',
                            icon: 'error'
                        })
                    }
                }
            })
        })
    });
</script>
@endpush

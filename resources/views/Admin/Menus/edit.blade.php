
@extends('admin.home')
@section('content')



<form action="" method="POST">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('error'))     
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{$menu->name}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Catalog</label>
        <select class="form-control " name="parent_id">
            <option value="0" {{($menu->id==0)? 'selected' : ''}}>Parent list</option>
            @foreach ($menus as $each)
                <option value="{{$each->id}}" {{($each->id==$menu->id)&&($menu->parent_id != 0) ? 'selected' : ''}}>{{$each->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="2">{{$menu->description}}</textarea>
    </div>

    <div class="form-group">
        <label>Detail Description</label>
        <textarea class="form-control"  rows="5" name="content">{{$menu->content}}</textarea>
    </div>

    <div class="form-group">
        <label>Photo</label>
        <div class="input-group">
            <div class="custom-file col-3">
                <label class="custom-file-label" for="upload_product" id="name_photo"></label>
                <input type="file" class="custom-file-input form-control" id="upload_product" name="photo_product" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                <input type="hidden" name = "thumb" id = "file" value="{{$menu->thumb}}">
            </div>
        </div>
        <img id="pic" height="100" src="{{$menu->thumb}}" alt="">
    </div>

    <div class="mt-3">
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="active" {{$menu->active==0 ? 'checked' : ''}} class="custom-control-input" value="0">
            <label class="custom-control-label" for="customRadio1" >Yes</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="active" class="custom-control-input" {{$menu->active==1 ? 'checked' : ''}} value= "1">
            <label class="custom-control-label" for="customRadio2" >No</label>
        </div>
    </div> 
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
    </div>  
    @csrf
</form>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        // alert('gaga');

        $('#upload_product').change(function(){
            $("#name_photo").text(this.files[0].name)
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

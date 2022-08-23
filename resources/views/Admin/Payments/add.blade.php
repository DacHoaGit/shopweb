
@extends('admin.home')

@section('content')
<form action="" method="POST">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label>Name Bank</label>
        <input type="text" name="name_bank" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Bank Number</label>
        <input type="number" name="bank_number" class="form-control">
    </div>
    

    <div class="form-group">
        <label>Photo</label>
        <div class="input-group">
            <div class="custom-file col-3">
                <label class="custom-file-label" for="upload_product" id="name_photo"></label>
                <input type="file" class="custom-file-input form-control" id="upload_product" name="photo_product" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                <input type="hidden" name = "thumb" id = "file">
            </div>
        </div>
        <img id="pic" height="100"/>
    </div>

    <div class="mt-3">
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="active" class="custom-control-input" value="0">
            <label class="custom-control-label" for="customRadio1" >Yes</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="active" class="custom-control-input" checked="checked" value= "1">
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

                    if(data.error == "false"){
                        console.log(data);
                        $('#file').val(data.url);
                        $.toast({
                            heading: 'Import Success',
                            text: 'upload file success',
                            showHideTransition: 'slide',
                            position: 'bottom-right',
                            icon: 'success'
                        })
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


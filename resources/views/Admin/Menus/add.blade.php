
@extends('admin.home')
@section('content')



<form action="" method="POST">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Catalog</label>
        <select class="form-control " name="parent_id">
            <option value="0">Parent list</option>
            @foreach ($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="2"></textarea>
    </div>

    <div class="form-group">
        <label>Detail Description</label>
        <textarea class="form-control" rows="5" name="content"></textarea>
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


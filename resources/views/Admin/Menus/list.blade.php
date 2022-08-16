
@extends('admin.home')
@section('content')

    <div class="input-group col-sm-12 col-md-3">
        <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
    </div>
    <table class="table table-striped table-centered mb-0" id="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Update date</th>
                    <th>Action</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {!!app\Helpers\Helper::menu($menus)!!}
            </tbody>
    </table>
@endsection

@push('js')
<script>

   
</script>
@endpush

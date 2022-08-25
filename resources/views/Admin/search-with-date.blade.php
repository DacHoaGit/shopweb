<div class="row" style="margin-bottom: 20px">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="form-inline" method="get">
                    <span style="margin-right:10px">From</span>
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                            <input type="text" name="date[]" class="date-form form-control"
                                value="{{ date('Y/m/d') }}">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <span style="margin:0 10px 0 10px" >To</span>
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                            <input type="text" name="date[]" class="date-form form-control"
                                value="{{ date('Y/m/d') }}">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">
                        <i class="mdi mdi-magnify search-icon"></i>
                    </button>
                </form>
            </div>

            <div class="page-title-left">
                
            </div>
        </div>
    </div>
</div>
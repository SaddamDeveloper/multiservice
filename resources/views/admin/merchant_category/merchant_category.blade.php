@extends('admin.template.admin_master')
@section('content')
<div class="content-wrapper">

  <div class="row grid-margin">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-info btnMerchantCategory" id="btnMerchantCategory" value="Yes"><i class="mdi mdi-plus-circle-outline" ></i>Add Category Merchant</button>
                <div id="dvPassport" style="display: none">
                  <div id="tempatData"><h4 class="card-title">Add Category Merchant</h4>
                    <br>
                    @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                  {{ Form::open(['method' => 'post','route'=>'admin.store.category']) }}
                    <div class="form-group">
                        <label for="newstitle">Category Name</label>
                        <input type="text" class="form-control" name="category" style="width:60%" value="{{ old('category') }}" required="">
                        @if($errors->has('category'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="">For Service</label>
                    <div class="form-group">
                        <select class="form-control" style="width:60%" name="service">
                          <option value="" selected disabled>--Service--</option>
                          @if(isset($services) && !empty($services))
                            @foreach($services as $service)
                              <option value="{{ $service->id }}" {{old('service') == $service->id?'selected':''}}>{{ $service->name }}</option>
                            @endforeach
                          @endif
                        </select>
                        @if($errors->has('service'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('service') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="">Status</label>
                    <div class="form-group">
                        <select class="form-control" style="width:60%" name="status">
                            <option value="1" {{old('status') == '1'?'selected':''}}>Active</option>
                            <option value="2" {{old('status') == '2'?'selected':''}}>Non Active</option>
                        </select>
                        @if($errors->has('status'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button id="cancel" class="btn btn-light btnMerchantCategory" value="No">Cancel</button>
                        </div>
                    </div></form>
                    <br></div>
                </div>
                <h6 class="card-title">Order status</h6>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="category_list" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl. No</th>
                              <th>Category Name</th>
                              <th>For Service</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>                       
                          </tbody>
                        </table>
                    </div>
                  </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2017 <a href="#">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
@endsection
@push('scripts')
    <script>
      $(function () {
        $(".btnMerchantCategory").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
        var i = 1;
            var table = $('#category_list').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: "50",
                ajax: "{{ route('admin.ajax.category_list') }}",
                columns: [
                    { "render": function(data, type, full, meta) {return i++;}},
                    {data: 'category', name: 'category',searchable: true},
                    {data: 'service', name: 'service',searchable: true},
                    {data: 'status', name: 'status', render:function(data, type, row){
                      if (row.status == '1') {
                        return "<button class='btn btn-success rounded'>Active</a>"
                      }else if(row.status == '2'){
                        return "<button class='btn btn-warning rounded'>Deactive</a>"
                      }
                    }},              
                    {data: 'action', name: 'action',searchable: true}
                ]
            });
    });
    </script>
@endpush

@extends('admin.template.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                  <div>
                    <a class="btn btn-info" href="{{route('admin.vehicle_type')}}"><i class="mdi mdi-plus-circle-outline"></i>Add Vehicle Type</a>
                  </div>
                  <br>
                <h4 class="card-title">Partner Job</h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>Sl. No</th>
                                <th>Icon Map</th>
                                <th>Vehicle Type</th>
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
      </div>
</div>
@endsection
@push('scripts')
     <script type="text/javascript">
         $(function () {
            var i = 1;
            var table = $('#order-listing').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: "50",
                ajax: "{{ route('admin.ajax.vehicle_list') }}",
                columns: [
                    { "render": function(data, type, full, meta) {return i++;}},
                    {data: 'icon_map', name: 'icon_map',searchable: true},
                    {data: 'vehicle_type', name: 'vehicle_type',searchable: true},
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
@extends('admin.template.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="row grid-margin">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Services</h6>
                    <a class="btn btn-info" href="{{route('admin.add_service')}}"><i class="mdi mdi-plus-circle-outline"></i>Add Service</a>
                    <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="service_list" class="table" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Sl. No</th>
                                    <th>Service</th>
                                    <th>Icon</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Unit</th>
                                    <th>Commission</th>
                                    <th>Driver Radius</th>
                                    <th>Max Distance Order</th>
                                    <th>Per KM Charge</th>
                                    <th>Fixed Charge</th>
                                    <th>Job</th>
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
@endsection
@push('scripts')
     <script type="text/javascript">
         $(function () {
            var i = 1;
            var table = $('#service_list').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: "50",
                ajax: "{{ route('admin.ajax.service_list') }}",
                columns: [
                    { "render": function(data, type, full, meta) {return i++;}},
                    {data: 'name', name: 'name',searchable: true},
                    {data: 'icon', name: 'icon',searchable: true},
                    {data: 'price', name: 'price',searchable: true},
                    {data: 'discount', name: 'discount',searchable: true},
                    {data: 'unit', name: 'unit',searchable: true},
                    {data: 'commission', name: 'commission',searchable: true},
                    {data: 'driver_radius', name: 'driver_radius',searchable: true},
                    {data: 'max_distance', name: 'max_distance',searchable: true},
                    {data: 'perkm', name: 'perkm',searchable: true},
                    {data: 'fixed', name: 'fixed',searchable: true},
                    {data: 'vehicle', name: 'vehicle',searchable: true},
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
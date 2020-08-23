@extends('admin.template.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Vehicle Type
                    </h4>
                    @if (Session::has('message'))
                    <div class="alert alert-success" >{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    {{ Form::open(['method' => 'post','route'=>'admin.store_vehicle_type']) }}
                    <div class="form-group">
                        <label for="status_berita">Icon Maps</label>
                        <select class="js-example-basic-single" style="width:100%" name="icon" id="statusjob">
                            @if(isset($icon_maps) && !empty($icon_maps))
                                @foreach($icon_maps as $im)
                                    <option value="{{$im->id}}">{{$im->icon_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Vehicle Type</label>
                        <input type="text" class="form-control" name="driver_job" id="job" placeholder="enter job title" required>
                        @if($errors->has('slider_name'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('slider_name') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_berita">Vehicle Type Status</label>
                        <select class="js-example-basic-single" style="width:100%" name="status_job" id="statusjob">
                        <option value="1">Active</option>
                        <option value="0">NonActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{route('admin.vehicle_type_page') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
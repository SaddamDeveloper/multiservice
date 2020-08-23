@extends('admin.template.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Add Service
                    </h4>
                        @if (Session::has('message'))
                            <div class="alert alert-success" >{{ Session::get('message') }}</div>
                         @endif
                         @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                         @endif
                    {{ Form::open(['method' => 'post','route'=>'admin.store.add_service', 'enctype'=>'multipart/form-data']) }}
                    <div class="form-group">
                        <input type="file" class="dropify" name="icon" data-max-file-size="3mb" required />
                        @if($errors->has('f_name'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('f_name') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newstitle">Name</label>
                        <input type="text" class="form-control" id="newstitle" value="{{ old('name') }}" name="name" required>
                        @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newscategory">Service Type</label>
                        <select class="js-example-basic-single" name="service_type" style="width:100%">
                            <option value="1" {{old('service_type') == '1'?'selected':''}}>Passenger Transportation</option>
                            <option value="2" {{old('service_type') == '2'?'selected':''}}>Shipment</option>
                            <option value="3" {{old('service_type') == '3'?'selected':''}}>Rental</option>
                            <option value="4" {{old('service_type') == '4'?'selected':''}}>Purchasing Service</option>
                        </select>
                        @if($errors->has('service_type'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('service_type') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newstitle">Price</label>
                        <input type="number" data-type="currency" class="form-control" id="price" name="price" value="{{ old('price') }}"  required>
                        @if($errors->has('price'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount (%)</label>
                        <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" placeholder="ex 10%">
                        @if($errors->has('discount'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('discount') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newscategory">Unit</label>
                        <select class="js-example-basic-single" name="unit" style="width:100%">
                            <option value="KM" {{old('unit') == 'KM'?'selected':''}}>Kilometers</option>
                            <option value="Hr" {{old('unit') == 'Hr'?'selected':''}}>An Hour</option>
                        </select>
                        @if($errors->has('unit'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('unit') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newstitle">Commission (%)</label>
                        <input type="text" class="form-control" id="newstitle" name="commission" value="{{ old('commission') }}" placeholder="ex 10%" required>
                        @if($errors->has('commission'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('commission') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newscategory">vechile</label>
                        <select class="js-example-basic-single" name="vehicle" style="width:100%">
                            <option value="" selected disabled>--Vehicle Type--</option>
                            @if(isset($vehicle_type) && !empty($vehicle_type))
                                @foreach ($vehicle_type as $vt)
                                    <option value="{{ $vt->id }}" {{old('vehicle') == $vt->id?'selected':''}}>{{ $vt->vehicle_type }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('vehicle'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('vehicle') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newstitle">Driver Radius</label>
                        <input type="text" class="form-control" id="newstitle" value="{{ old('driver_radius')}}"name="driver_radius" required>
                        @if($errors->has('driver_radius'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('driver_radius') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newstitle">Max Distance Order</label>
                        <input type="text" class="form-control" id="newstitle" name="max_distance" value="{{ old('max_distance') }}" required>
                        @if($errors->has('max_distance'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('max_distance') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="perkm">Per KM Delivery Charge</label>
                        <input type="text" class="form-control" id="perkm" name="perkm" value={{ old('perkm') }} required>
                        @if($errors->has('perkm'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('perkm') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fixed">Fixed Delivery Charge</label>
                        <input type="text" class="form-control" id="fixed" name="fixed" value={{ old('fixed') }} required>
                        @if($errors->has('fixed'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('fixed') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newstitle">Description</label>
                        <input type="text" class="form-control" id="newstitle" name="description" value="{{ old('description') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="newscategory">Status</label>
                        <select class="js-example-basic-single" name="status" style="width:100%">
                            <option value="1" {{old('status') == '1'?'selected':''}}>Nonactive</option>
                            <option value="2" {{old('status') == '2'?'selected':''}}>Active</option>
                        </select>
                        @if($errors->has('status'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="#" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IconMap;
use App\VehicleType;
use DataTables;
use Intervention\Image\Facades\Image;
use App\Service;
use App\Category;
class AdminPagesController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function merchantCategory()
    {
        $services = Service::orderBy('created_at', 'DESC')->get();
        return view('admin.merchant_category.merchant_category', compact('services'));
    }
    public function service()
    {
        return view('admin.service.service');
    }

    public function addService()
    {
        $vehicle_type = VehicleType::orderBy('created_at', 'DESC')->get();
        return view('admin.service.add_service', compact('vehicle_type'));
    }
    public function storeService(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
            'service_type'   => 'required',
            'price'   => 'required',
            'discount'  => 'required',
            'unit'  => 'required',
            'commission'   => 'required',
            'vehicle'   => 'required',
            'driver_radius' => 'required',
            'max_distance'   => 'required',
            'description'   => 'required',
            'perkm'   => 'required|numeric',
            'fixed'   => 'required|numeric',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $name = $request->input('name');
        $service_type = $request->input('service_type');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $unit = $request->input('unit');
        $commission = $request->input('commission');
        $vehicle = $request->input('vehicle');
        $driver_radius = $request->input('driver_radius');
        $max_distance = $request->input('max_distance');
        $description = $request->input('description');
        $perkm = $request->input('perkm');
        $fixed = $request->input('fixed');
        $icon = null;
        if($request->hasfile('icon')){
            $icon_array = $request->file('icon');
            $icon = $this->imageInsert($icon_array, $request, 1);
        }
        $service = new Service;
        $service->name = $name;
        $service->service_type = $service_type;
        $service->price = $price;
        $service->discount = $discount;
        $service->unit = $unit;
        $service->commission = $commission;
        $service->vehicle = $vehicle;
        $service->driver_radius = $driver_radius;
        $service->max_distance = $max_distance;
        $service->description = $description;
        $service->perkm = $perkm;
        $service->fixed = $fixed;
        $service->icon = $icon;
        if($service->save()){
            return back()->with('message', 'Successfully Added');
        }
    }
    public function serviceList()
    {
        return datatables()->of(Service::orderBy('created_at', 'DESC')->get())
        ->addIndexColumn()
        ->addColumn('icon', function($row){
            $icon = '<img src="'.asset('admin/images/service/'.$row->icon).'" alt="icon" width="200">';
            return $icon;
        })
        ->addColumn('action', function($row){
            if($row->status == '1'){
                $action = '<a href="https://ourdevelops.com/ouride/partnerjob/editpartnerjob/13">
                <button class="btn btn-outline-primary">Edit</button></a>
                <a href="https://ourdevelops.com/ouride/partnerjob/deletepartnerjob/13" >
                        <button class="btn btn-outline-danger">Delete</button></a>
                ';
            }
            return $action;
        })
        ->rawColumns(['action', 'icon'])
        ->make(true);
    }

    public function vehicleTypePage()
    {
        return view('admin.vehicle.vehicle_page');
    }

    public function vehicleType()
    {
        $icon_maps = IconMap::orderBy('created_at', 'DESC')->get();
        return view('admin.vehicle.vehicle', compact('icon_maps'));
    }

    public function storeVehicleType(Request $request)
    {
        $this->validate($request, [
            'icon'   => 'required',
            'driver_job'   => 'required',
            'status_job'   => 'required'
        ]);
        $vehicleType = new VehicleType;
        $vehicleType->icon_map_id = $request->input('icon');
        $vehicleType->vehicle_type = $request->input('driver_job');
        $vehicleType->status = $request->input('status_job');
        $vehicleType->save();
        return redirect()->back()->with('message', 'Service Successfully Added');
    }
    public function vehicleList()
    {
        return datatables()->of(VehicleType::orderBy('created_at', 'DESC')->get())
        ->addIndexColumn()
        ->addColumn('icon_map', function($row){
            if($row->icon_map_id == '2'){
                $action = '<img src="'.asset('admin/images/service/sedan.png').'" alt="Vehicle Type" width="200">';
            }else{
                $action = '<a href="#" class="btn btn-danger" disabled>Solved</a>';
            }
            return $action;
        })
        ->addColumn('action', function($row){
            if($row->status == '1'){
                $action = '<a href="https://ourdevelops.com/ouride/partnerjob/editpartnerjob/13">
                <button class="btn btn-outline-primary">Edit</button></a>
                <a href="https://ourdevelops.com/ouride/partnerjob/deletepartnerjob/13" >
                        <button class="btn btn-outline-danger">Delete</button></a>
                ';
            }
            return $action;
        })
        ->rawColumns(['action', 'icon_map'])
        ->make(true);
    }
    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'category'   => 'required',
            'service'   => 'required',
            'status'    => 'required'
        ]);
        $category = new Category;
        $category->category = $request->input('category');
        $category->service = $request->input('service');
        if($category->save()){
            return back()->with('message', 'Category Added Successfully');
        }
    }
    public function categoryList()
    {
        return datatables()->of(Category::orderBy('created_at', 'DESC')->get())
        ->addIndexColumn()
        ->addColumn('service', function($row){
            $service = Service::find($row->service);
            return $service->name;
        })
        ->addColumn('action', function($row){
            if($row->status == '1'){
                $action = '<a href="https://ourdevelops.com/ouride/partnerjob/editpartnerjob/13">
                <button class="btn btn-outline-primary">Edit</button></a>
                <a href="https://ourdevelops.com/ouride/partnerjob/deletepartnerjob/13" >
                <button class="btn btn-outline-danger">Delete</button></a>
                ';
            }
            return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    function imageInsert($image, Request $request, $flag){
        $destination = base_path().'/public/admin/images/service/';
        $image_extension = $image->getClientOriginalExtension();
        $image_name = md5(date('now').time()).$flag.".".$image_extension;
        $original_path = $destination.$image_name;
        Image::make($image)->save($original_path);
        $thumb_path = base_path().'/public/admin/images/service/thumb/'.$image_name;
        Image::make($image)
        ->resize(300, 400)
        ->save($thumb_path);

        return $image_name;
    }
}

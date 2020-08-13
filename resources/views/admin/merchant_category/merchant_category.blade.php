@extends('admin.template.admin_master')
@section('content')
<div class="content-wrapper">

  <div class="row grid-margin">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-info" id="tombolAdd"><i class="mdi mdi-plus-circle-outline"></i>Add Category Merchant</button>
                <h6 class="card-title">Order status</h6>
          <div class="table-responsive">
            <table class="table mt-3 border-top">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Customer</th>
                  <th>Ship</th>
                  <th>Best Price</th>
                  <th>Purchsed Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>50014</td>
                  <td>David Grey</td>
                  <td>Italy</td>
                  <td>$6300</td>
                  <td>$2100</td>
                  <td><div class="badge badge-success badge-fw">Progress</div></td>
                </tr>
                <tr>
                  <td>50015</td>
                  <td>Stella Johnson</td>
                  <td>Brazil</td>
                  <td>$4500</td>
                  <td>$4300</td>
                  <td><div class="badge badge-warning badge-fw">Open</div></td>
                </tr>
                <tr>
                  <td>50016</td>
                  <td>Marina Michel</td>
                  <td>Japan</td>
                  <td>$4300</td>
                  <td>$6440</td>
                  <td><div class="badge badge-danger badge-fw">On hold</div></td>
                </tr>
                <tr>
                  <td>50017</td>
                  <td>John Doe</td>
                  <td>India</td>
                  <td>$6400</td>
                  <td>$2200</td>
                  <td><div class="badge badge-success badge-fw">Progress</div></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
            <p class="mb-3 mb-sm-0">Showing 1 to 20 of 20 entries</p>
            <nav>
              <ul class="pagination pagination-info mb-0">
                <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item"><a class="page-link">4</a></li>
                <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
              </ul>
            </nav>
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
     

@include("backend.include.header")


<body class="sb-nav-fixed">
@include("backend.include.nav")
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                           Product
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                
                            <a class="nav-link" href="{{ route('product') }}">Add Product</a>
                                    <a class="nav-link" href="{{ route('showproduct') }}">Manage Product</a>
                            </nav>
                        </div>
                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div> -->
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                   

         <div class="row">
            <div class="col-md-6 offset-3">
            <h1 class="mt-4">Add Product Form</h1>
                    <ol class="breadcrumb mb-4">
                        
</ol>
<form action="{{ route('update',$edit->id) }}" method="POST" enctype="multipart/
form-data">
  @csrf
  <div class="form-group mt-3"> 
    <label for="name">Product Name</label>
    <input type="text" name="name" class="name form-control" value="{{ $edit->name }}" placeholder="Enter Your Product Name">

</div>
<div class="form-group mt-3"> 
    <label for="cat_name">Product Category Name</label>
    <input type="text" name="cat_name" class="cat_name form-control" value="{{ $edit->cat_name }}"  placeholder="Enter Your Product Category Name">

</div>
<div class="form-group mt-3"> 
    <label for="brand_name"> Product Brand Name</label>
    <input type="text" name="brand_name" class="brand_name form-control" value="{{ $edit->brand_name }}" placeholder="Enter Product Brand Name">

</div>
<div class="form-group mt-3">
<label for="des">Product Description</label>
    <input type="text" name="des" class="des form-control" value="{{ $edit->des }}" placeholder="Enter Product Description">
</div>

<div class="form-group">
            <img src="{{asset('backend/pimage/'.
                            $edit->img )}}" alt="">
        </div>
<div class="form-group mt-3">
<label for="img">Product Image</label>
    <input type="file" name="img" class="des form-control"  placeholder="Enter Product Image">
</div>

<div class="form-group mt-3">
    <select name="status" value="{{ $edit->status }}" class="status form-control">
    <option value=" ">-------Status------</option>
    <option value="1">Active</option>
    <option value="2">Inactive</option>

    </select>
</div>
    <button class="btn btn-sm btn-success mt-3">Update</button>

</form>


</div>
                </main>
                @include("backend.include.footer")
            </div>
        </div>
        
        @include("backend.include.script")
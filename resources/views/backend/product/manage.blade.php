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
                    </div> -->
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                <div class="row mt-3">

                <div class="col-md-10 offset-1">
              
            <h1 class="mt-4"> Product Manage</h1>
                    <ol class="breadcrumb mb-4">
            <table class="table text-center" border="1">

            <thead>
                <tr>
                    <td>#SL</td>
                    <td>Name</td>
                    <td>Category Name</td>
                    <td>Brand Name</td>
                    <td>Description</td>
                    <td>Image</td>
                    <td>Status</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>

            <tbody>
                @php $sl=1; @endphp
                @foreach($products as $product)
                <tr>
                    <td>{{ $sl }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->cat_name }}</td>
                    <td>{{ $product->brand_name }}</td>
                    <td>{{  $product->des }}</td>
                    <td> <img height="30" src="{{asset('backend/pimage/'.
                            $product->img )}}" alt="">
                        </td>
                    <td>@if($product->status==1)
                <a class="btn btn-sm btn-warning" href="{{ Route('active',$product->id) }}">Active </a>
                @else 
                <a class="btn btn-sm btn-secondary" href="{{ Route('inactive',$product->id) }}">Inactive </a>
                @endif</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ Route('edit', $product->id)}}" >Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{ Route('delete', $product->id)}}">Delete</a>

                    </td>
                   


                </tr>
                @php $sl++; @endphp
                @endforeach
            </tbody>
            </table>
        </div>

        </div>
                </main>
                <!-- @include("backend.include.footer") -->
            </div>
        </div>
        
        @include("backend.include.script")
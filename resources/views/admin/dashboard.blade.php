@extends('admin.mlinks.app')

@section('mcontent')

<div class="container-fluid px-4">
    <h3 class="mt-4 mb-3" style="color: rgba(0, 0, 0, 0.805); font-weight:normal;"> Welcome: <small> admin </small> </h3>

<!-- headers cards disply start -->
  <div class="row">

     <div class="col-xl-3 col-md-6">
        <div class="card bg-light text-white mb-4">

            <div class="card-body">
                <h6 class="mb-2" style="color: black; font-weight:initial;">Writters :<span>{{ $writ }}</span> </h6>
                 <small style="color: rgba(0, 0, 0, 0.805); font-weight:initial;">suspended:  <span>{{ $susp }}</span></small>
                </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="#" style="text-decoration: none ;">View Details</a>
                <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-light text-white mb-4">
                <div class="card-body"> <h6 class="mb-2" style="color: black; font-weight:initial;">Projects : <span>{{ $topic }}</span> </h6>
                    <small style="color: rgba(0, 0, 0, 0.805); font-weight:initial;">completed: <span>{{ $comp }}</span> </small>

                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-dark stretched-link" href="#" style="text-decoration: none ;">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-light text-white mb-4">
                <div class="card-body">
                    <h6 class="mb-2" style="color: black; font-weight:initial;"> Bids : <span>{{ $bids }}</span></h6>
                    <small style="color: rgba(0, 0, 0, 0.805); font-weight:initial;">today: <span>{{ $today }}</span></small>

                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-dark stretched-link" href="#" style="text-decoration: none ;">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-md-6">
            <div class="card bg-light text-white mb-4">
                <div class="card-body"><h6 class="mb-2" style="color: black; font-weight:initial;"> Online: 20</h6>
                    <small style="color: rgba(0, 0, 0, 0.805); font-weight:initial;">total visits: 0</small>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-dark stretched-link" href="#" style="text-decoration: none ;">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
<!-- headers cards disply start -->


    <div class="row" style="margin-top:30px;">
        <!-- charts start here-->
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                      <a href="{{ url('dash') }}" style="text-decoration:none; color:black;"> <i class="fas fa-pen"></i> projects</a>
                      <a href="{{ url('dash1') }}" style="text-decoration:none; margin-left:50px; color:black;">  <i class="fa fa-users"></i> writers</a>
                      <a href="{{ url('dash2') }}" style="text-decoration:none; margin-left:50px; color:black;"> <i class="fas fa-chart-area"></i> bids</a>
                      <a href="{{ url('dash3') }}" style="text-decoration:none; margin-left:50px; color:black;"> <i class="fas fa-check"></i> completed</a>
                </div>
                <div class="card-body">
                    <p style="text-align:center; margin-top:30px;">{{ $head }}</p>
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
        <!-- charts ends here -->
    </div>

<!-- headers cards disply ends -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
     var _ydata=JSON.parse('{!! json_encode($months) !!}');
     var _xdata=JSON.parse('{!! json_encode($monthcount) !!}');

</script>

<script src="Admin/assets/demo/chart-area-demo.js"></script>
<script src="Admin/assets/demo/chart-bar-demo.js"></script>


@endsection


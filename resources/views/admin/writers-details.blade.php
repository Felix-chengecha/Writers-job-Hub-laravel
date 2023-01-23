@extends('admin.mlinks.app')

@section('mcontent')

<div class="card mb-4">
    <div class="card-header" >
        <span class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); margin-left:40%;">
            Writers details </span>
    </div>

  <div class="card-body">


    <div class="container" >
        <div class="row border" style="margin-bottom:8px; " >

          <div class="col-7">
            <div class="row">
              <div class="col-2" style="margin-bottom:10px;">
               <small> <i class="fa fa-file-signature"></i> </small>     <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Name  <small>:</small> </small> <br>
               <small>  <i class="fa fa-envelope"></i> </small>          <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Email  :</small> <br>
               <small>  <i class="fa fa-phone"></i> </small>             <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Phone  :</small> <br>
               <small>  <i class="fa fa-hashtag"></i> </small>           <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Rank   :</small> <br>
               <small>  <i class="fa fa-toggle-on"></i> </small>         <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Status :</small> <br>
               <small>  <i class="fa fa-right-to-bracket"></i> </small>  <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Joined  :</small> <br>
              </div>

              <div class="col-3" style="margin-left:-20px; margin-bottom:10px;">
                  @foreach ($det as $dt )
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif; ">{{ $dt->name }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->email }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->phone }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->rank }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->is_banned }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->created_at }}</small> <br>
                @endforeach
              </div>


              <div class="col-3" style="margin-bottom:10px; margin-left:50px;">
                <small>  <i class="fa fa-plus"></i> </small>    <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Bids <small>:</small>  </small> <br>
                <small>  <i class="fa fa-pen"></i> </small>   <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Assigned <small>:</small>  </small> <br>
                <small>  <i class="fa fa-check"></i> </small>      <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  Completed <small>:</small>  </small> <br>
              </div>

              <div class="col-2" style=" margin-bottom:10px; margin-left:-37px;">
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px; font-family: Arial, Helvetica, sans-serif;">{{ $bids }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px; font-family: Arial, Helvetica, sans-serif;">{{ $assigned }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px; font-family: Arial, Helvetica, sans-serif;">{{ $completed }}</small> <br>

            </div>

            </div>
        </div>

    <div class="col-5">

        <div class="mb-3">
             <div class="row">
                <label for="" class="form-label">
                    <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">
                    Change Rank </small></label>
                <div class="col">
                    <select class="form-select form-select-sm" name="category" id="">
                        <option selected> </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                        <option value="3">5</option>
                    </select>
                    <button type="submit" class="btn btn-success btn-sm" style="margin-top:10px;">rank</button> <br>
                    <a href="#" class="btn btn-warning btn-sm" style="margin-top:10px; ">suspend</a>

                </div>
             <div class="col">
             </div>

            </div>
        </div>

    </div>




          </div>

          <div class="row" style="margin-top: 5px;">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
            </div>
            @endif
            @if(session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session()->get('warning')}}
            </div>
            @endif
        </div>


    <div class="row" style="margin-top:8px; ">

           <div class="card-header" >
            <span class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); margin-left:40%;"> Writers projects </span>
        </div>


    <div class="col" style="margin-top:15px;">
            <table id="datatablesSimple" >
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Bid-Date</th>
                    <th>Due-Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Bid-Date</th>
                    <th>Due-Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($proj as $proj)
                        <tr>
                    <td>{{ $proj->category }}</td>
                    <td>{{ $proj->title }}</td>
                    <td>{{ $proj->price }} Kes</td>
                    <td>{{ $proj->status }}</td>
                    <td>{{ $proj->created_at }}</td>
                    <td>{{ $proj->duedate }}</td>
                    <td><a href="#" class="btn btn-success btn-sm" > more</a></td>
                    </tr>
                    @endforeach
                 </tbody>
              </table>
           </div>
        </div>
    </div>
</div>
</div>

@endsection

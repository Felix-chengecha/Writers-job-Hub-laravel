
<!-- sub header start -->
<div class="container fluid">


<div class="row" >

        <div class="col-sm-1 border" style="padding: 10px; background-color: #89CFF0;">
          <a href="{{ url('home') }}" style=" text-decoration: none; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">All</a>
        </div>

        <div class="col-sm-2 border" style="padding: 10px; background-color: #89CFF0;">
            <a href="{{ url('myjobs') }}" style=" text-decoration: none;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"> My jobs </a>
        </div>

        <div class="col-sm-2 border" style="padding: 10px; background-color: #89CFF0;">
          <a href="#" style="text-decoration: none; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" id="dropdownMenuLink" data-bs-toggle="dropdown"> Categories </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{ url('category', 'article') }}">Articles</a></li>
            <li><a class="dropdown-item" href="{{ url('category', 'academic') }}">Academic writting</a></li>
            <li><a class="dropdown-item" href="{{ url('category', 'content') }}">Content writting</a></li>
         </ul>
       </div>

        <div class="col-sm-4 border" style="padding: 10px; background-color: #89CFF0;">
         <form action="{{ url('wsearch') }}" method="GET" >
                @csrf
          <div class="row">
          <div class="col">
          <input type="text" name="search"  class="form-control"  placeholder="Search" style="width:200px;">
          </div>
          <div class="col" style="margin-top:4px;">
          <button type="submit" class="btn btn-success btn-sm" ><h6 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">search</h6> </button>
          </div>
          </div>
          </form>
        </div>
    </div>
<!-- sub header end -->



<!--main container start-->
<div class="row" style="margin-top: 20px;">

<!--display work with pagination start -->
 <div class="col-sm-9">
    @foreach ($dat as $data )
     <div class="row h-auto py-2">

       <div class="col-sm border " style="margin-right: 10px; ">
        <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <b> {{ $data->title }} </b> </span>

    <div class="row h-auto" style="margin-top:6px; ">
        <div class="col-sm-10 " >
            <span style="padding: 2px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $data->subtopic }}</span> <br>
        </div>

        <div class="col-sm-2">
            <a href="{{ url('nav',$data->id) }}" style="text-decoration:none; padding: 2px;"> <i class="fa-solid fa-pen"></i> </a>
            <small style="padding: 2px; margin-left:10px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $data->price }}: KES</small> <br>
            <small style="padding: 2px; margin-left:35px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; "> fixed price </small>
         </div>


        </div>
     </div>
</div>
     @endforeach
<div style="padding-top: 4px; float: right;">
{!!$dat->links('pagination::bootstrap-4') !!}
</div>

</div>
<!--display work with pagination end -->


<!-- side menu items start -->
<div class="col-sm-3  h-50 d-inline-block">

  <div class="row border bg-light">
    <div class="col-sm">
      <ul>
        <h5    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <b> Categories </b> </h5>
        <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">articles</small><br>
        <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">academic</small> <br>
        <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">content</small>
     </ul>
     </div>
  </div>

  <div class="row border bg-light"  style="margin-top:10px;">
    <h5 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-left: 13%;"> <b> My statistics </b> </h5>

        <div class="col-sm" style="margin-left:14px">
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Total-Bids: <span style="margin-left:15px;"> 10</span> </small> <br>
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Pending : <span style="margin-left:22px;">11</span> </small> <br>
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Completed: <span style="margin-left:15px;">8</span> </small>
        </div>
  </div>

 <div class="row bg-light border" style="margin-top: 10px;">
    <h5 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-left: 13%;"> <b> My Details </b> </h5>

        <div class="col-sm" style="margin-left:14px;">
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Name : <span style="margin-left:10px;"> {{ Auth::user()->name }}  </span> </small> <br>
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Mail : <span style="margin-left:12px;"> {{ Auth::user()->email }} </span> </small> <br>
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Phone: <span style="margin-left:10px;"> {{ Auth::user()->phone }} </span> </small> <br>
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Rank : <span style="margin-left:10px;"> {{ Auth::user()->rank }} </span> </small>
        </div>



    </div>

</div>

<!-- side menu items end -->

</div>
<!-- main container end -->

</div>

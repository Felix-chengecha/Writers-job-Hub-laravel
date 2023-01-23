@extends('admin.mlinks.app')

@section('mcontent')

<div class="card mb-4">
    <div class="card-header" >
        <h4 class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);">
        <i class="fas fa-plus"></i>
            Add Project </h4>

    </div>
  <div class="card-body">
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

    <div class="cont border" style="margin-left: 60px; margin-right: 60px; margin-top:-23px;">

      <div class="conte" style="margin-left:10%; margin-right:10%; margin-top:10px;">

        <form action="{{ url('add_project') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Title</label>
              <input type="text" name="title" id="" class="form-control" placeholder="" required>
            </div>

                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select form-select-lg" name="category" id="">
                        <option selected> </option>
                        <option value="article"><small> Article </small></option>
                        <option value="content"> <small> Content Writting </small></option>
                        <option value="academic"> <small> Academic Writting </small></option>
                    </select>
                </div>

              <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" id="" class="form-control" placeholder="" required>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Due date</label>
                        <input type="date" name="duedate" class="form-control" id="" required>
                        <input type="hidden" name="status" id="" value="open">
                    </div>
                </div>
              </div>

            <div class="mb-3">
              <label for="" class="form-label">Topic</label>
              <textarea class="form-control" name="subtopic" id="" rows="4" required></textarea>
            </div>



              <div class="mb-3">
                <button class="btn btn-success btn-lg rounded-pill" style="width:250px; margin-left:28%;"> Submit</button>
              </div>


        </form>
      </div>
    </div>



    </div>
</div>

@endsection

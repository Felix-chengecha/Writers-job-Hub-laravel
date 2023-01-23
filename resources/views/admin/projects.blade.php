@extends('admin.mlinks.app')

@section('mcontent')

<div class="card mb-4">
    <div class="card-header" style="margin-top:10px;">
        <i class="fas fa-table me-1"></i>
             Projects list
    </div>
    <div class="card-body">

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Due-Date</th>
                    <th>Status</th>
                    <th>Bids</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Due-Date</th>
                    <th>Status</th>
                    <th>Bids</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($proj as $proj)
                        <tr>
                    <td>{{ $proj->category }}</td>
                    <td>{{ $proj->title }}</td>
                    <td>{{ $proj->price }} Kes</td>
                    <td>{{ $proj->duedate }}</td>
                    <td>{{ $proj->status }}</td>
                    <td>{{ $proj->bids }}</td>
                    <td>
                        <form action="{{ url('project_details') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $proj->id }}  ">
                        <button type="submit" class="btn btn-success btn-sm" > more</button>
                        </form>
                      </td>


                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>

@endsection

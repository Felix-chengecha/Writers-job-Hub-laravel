@extends('admin.mlinks.app')

@section('mcontent')

<div class="card mb-4">
    <div class="card-header"  style="margin-top:10px; ">
        <i class="fas fa-table me-1"></i>
             Writers list
    </div>
    <div class="card-body" >
        <table id="datatablesSimple"  class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Rank</th>
                    <th>Bids</th>
                    <th>Joined</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Rank</th>
                    <th>Bids</th>
                    <th>Joined</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($user as $wri)
                        <tr>
                    <td>{{ $wri->name }}</td>
                    <td>{{ $wri->email }}</td>
                    <td>{{ $wri->phone }}</td>
                    <td>{{ $wri->rank }}</td>
                    <td>{{ $wri->count }}</td>
                    <td>{{ $wri->created_at }}</td>
                    <td>
                        <form action="{{ url('writer_details') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $wri->id }}  ">
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

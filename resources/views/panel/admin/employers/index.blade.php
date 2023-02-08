@extends('layouts.app')

@section('content')
    <div class="container">
        @include('panel.admin.employers.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('panel.admin.employers.create') }}">Create employer</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Position</th>
                                <th>Permission</th>
                                <th>Date created</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $employer)
                                <tr @if($employer->email_verified_at) style="background-color: #ccc" @endif>
                                    <td>{{ $employer->id }}</td>
                                    <td>{{ $employer->name }}</td>
                                    <td>{{ $employer->surname }}</td>
                                    <td>{{ $employer->position->name }}</td>
                                    <td>{{ $employer->permission->name }}</td>
                                    <td>{{ $employer->created_at ? \Carbon\Carbon::parse($employer->created_at)->format('d.M H:i') : '' }}</td>
                                    <td>
                                        <a href="{{ route('panel.admin.employers.edit' , $employer->id) }}">
                                            <button type="button" class="btn btn-primary">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @php /** @var Illuminate\Pagination\Paginator $paginator */ @endphp
            @if($paginator->hasPages())
                <br>
                <div class="d-flex justify-content-left">
                    {!! $paginator->links() !!}
                </div>
            @endif
        </div>
    </div>
@endsection

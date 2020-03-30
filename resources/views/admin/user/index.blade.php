@extends('template_backend.home')
@section('sub-title', 'User')
@section('content')


@if(Session::has('update'))
    <div class="alert alert-success" role="alert">
    {{Session('update')}}
    </div>
    @endif


            <a href="{{route('user.create')}}" class="btn btn-info"> Tambah Kategori</a>
            <br><br>
            <table class ="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email </th>
                    <th>Tipe User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($user as $hasil => $result)
                <tr>
                    <td>{{ $hasil+ $user->firstitem()}}</td>
                    <td>{{ $result->name}}</td>
                    <td>{{ $result->email}}</td>
                    <td>
                    @if($result->type)
                    <span class="badge badge-primary">Administrator</span> 
                    @else
                    <span class="badge badge-warning">Author</span> 
                    @endif

                    </td>
                    <td>
                    

                     <form action ="{{route('user.destroy' ,$result->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('user.edit' , $result->id)}}" class="btn btn-primary btn-sm">Edit </a>
                        <button type ="submit " class="btn btn-danger btn-sm"> delete </button>
                     </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{$user->links()}}

@endsection
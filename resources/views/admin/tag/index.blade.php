@extends('template_backend.home')
@section('sub-title', 'Tag')
@section('content')


@if(Session::has('update'))
    <div class="alert alert-success" role="alert">
    {{Session('update')}}
    </div>
    @endif


            <a href="{{route('tag.create')}}" class="btn btn-info"> Tambah Tag</a>
            <br><br>
            <table class ="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tag as $hasil => $result)
                <tr>
                    <td>{{ $hasil+ $tag->firstitem()}}</td>
                    <td>{{ $result->name}}</td>
                    <td>
                    

                     <form action ="{{route('tag.destroy' ,$result->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('tag.edit' , $result->id)}}" class="btn btn-primary btn-sm">Edit </a>
                        <button type ="submit " class="btn btn-danger btn-sm"> delete </button>
                     </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{$tag->links()}}

@endsection
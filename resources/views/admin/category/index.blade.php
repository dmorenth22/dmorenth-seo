@extends('template_backend.home')
@section('sub-title', 'Kategori')
@section('content')


@if(Session::has('update'))
    <div class="alert alert-success" role="alert">
    {{Session('update')}}
    </div>
    @endif


            <a href="{{route('category.create')}}" class="btn btn-info"> Tambah Kategori</a>
            <br><br>
            <table class ="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($category as $hasil => $result)
                <tr>
                    <td>{{ $hasil+ $category->firstitem()}}</td>
                    <td>{{ $result->name}}</td>
                    <td>
                    

                     <form action ="{{route('category.destroy' ,$result->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('category.edit' , $result->id)}}" class="btn btn-primary btn-sm">Edit </a>
                        <button type ="submit " class="btn btn-danger btn-sm"> delete </button>
                     </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{$category->links()}}

@endsection
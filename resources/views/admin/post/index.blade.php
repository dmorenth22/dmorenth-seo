@extends('template_backend.home')
@section('sub-title', 'Post')
@section('content')


@if(Session::has('update'))
    <div class="alert alert-success" role="alert">
    {{Session('update')}}
    </div>
    @endif


            <a href="{{route('post.create')}}" class="btn btn-info"> Tambah Post</a>
            <br><br>
            <table class ="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Post</th>
                    <th>Kategori</th>
                    <th>Tag</th>
                    <th>Creator</th>
                    <th>Gambar </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($post as $hasil => $result)
            <tr>
                <td>{{ $hasil+ $post->firstitem()}}</td>
                <td>{{ $result->judul}}</td>
                <td>{{ $result->category['name']}}</td>
                <td>@foreach($result->tags as $tag)
                    <ul>
                    <span class="badge badge-primary">{{$tag->name}}</span>
                    </ul>
                    @endforeach
                <td>{{$result->users->name}}</td>
                </td>
                <td> <img src="{{asset($result->gambar)}}" class="img-fluid" style="width:100px" method="POST"> </td>
                    
                <td>
                     <form action ="{{route('post.destroy' ,$result->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('post.edit' , $result->id)}}" class="btn btn-primary btn-sm">Edit </a>
                        <button type ="submit " class="btn btn-danger btn-sm"> delete </button>
                     </form>
                 </td>
            </tr>
                @endforeach
            </tbody>
            </table>
            {{$post->links()}}

@endsection
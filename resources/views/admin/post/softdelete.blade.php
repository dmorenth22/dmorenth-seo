@extends('template_backend.home')
@section('sub-title', 'Soft Delete Post')
@section('content')


@if(Session::has('update'))
    <div class="alert alert-success" role="alert">
    {{Session('update')}}
    </div>
    @endif


        
            <table class ="table table-striped table-hover table-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Post</th>
                    <th>Kategori</th>
                    <th>Tag</th>
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
                        <li>{{$tag->name}}</li>
                    </ul>
                    @endforeach
                
                </td>
                <td> <img src="{{asset($result->gambar)}}" class="img-fluid" style="width:100px" method="POST"> </td>
                    
                <td>
                     <form action ="{{route('post.kill', $result->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('post.restore', $result->id)}}" class="btn btn-info btn-sm">Restore </a>
                        <button type ="submit " class="btn btn-danger btn-sm"> Delete </button>
                     </form>
                 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{$post->links()}}

@endsection
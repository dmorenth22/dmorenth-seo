@extends('template_backend.home')
@section('sub-title', 'Tambah Post')
@section('content')

    @if(count($errors)>0)
    @foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
    {{$error}}
    </div>
   
    @endforeach
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
    {{Session('success')}}
    </div>
    @endif

    <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul">      
    </div>


    
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="" holder>Select Category </option>
            @foreach($category as $hasil)
            <option value="{{$hasil->id}}">{{$hasil->name}}</option>     
            @endforeach
        </select>  
    </div>

    <div class="form-group">
                      <label>Select Tag</label>
                      <select class="form-control select2" multiple="" name="tags[]">
                      @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                      </select>
     </div>

    <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" name="content"></textarea>  
    </div>

    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file"  name="gambar" class="form-control">       
    </div>
    

<div class="form-group">
     <button class="btn btn-primary btn-block">Simpan</button>
</div>




</form>


@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             
                <div class="card-header">Create Post
                    <a href="/crud">
                        <button class="btn btn-secondary" >CRUD</button>
                    </a>
                </div>
              
                <div class="card-body">
                    <form method="post" action="{{ route('update') }}" enctype="multipart/form-data">
                        @csrf


                        <input type="hidden" value="{{$post->id}}">
                        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}">
                            @if($errors->has('title'))
                            <span class="help-block text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="title">Image/file</label>
                            <input type="file" name="imageName[]" class="form-control" multiple="">
                            @if($errors->has('images'))
                            <span class="help-block text-danger">{{ $errors->first('imageName') }}</span>
                            @endif
                        </div>

                        @foreach ($post->images as $item2)
                        <img src="{{ asset( 'files/'. $item2->imageName)  }}" width="100px">
                                @endforeach

                        <div class="form-group">
                            <label for="title">Body</label>
                            <textarea name="body" class="form-control">{{$post->body}}</textarea>
                            @if($errors->has('body'))
                            <span class="help-block text-danger">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('blogs.global')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('blogs.index')}}" class="btn-primary">Kembali</a>
            </div>
        </div>
    </div>    

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Peringatan!!</strong>Periksa Kembali Input anda
    </div>
    <br>
    @endif

    <form action="{{route('blogs.store')}}" method="post">
        @csrf
        <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group has-feedback{{$errors->has('author') ? 'has-error' : ''}}">
                    <strong>Author</strong>
                    <input class="form-control" type="text" name="author" id="" placeholder="Author"
                    value="{{old('author')}}" required>
                    @if ($errors->has('author'))
                    <div class="is-invalid">
                     {{$errors->first('author')}}
                    </div>                       
                 @endif
                </div>
                <div class="form-group has-feedback{{$errors->has('title') ? 'has-error' : ''}}">
                    <strong>Title</strong>
                    <input class="form-control is-invalid" type="text" name="title" id="" placeholder="title" value="{{old('title')}}" required>
                    @if ($errors->has('title'))
                       <div class="is-invalid">
                        {{$errors->first('title')}}
                       </div>                       
                    @endif
                </div>

                <div class="form-group has-feedback{{$errors->has('paragraph') ? 'has-error' : ''}}">
                    <textarea class="form-control has-feedback{{$errors->has('paragraph') ? 'has-error' : ''}}" name="paragraph" id="" cols="30" rows="10" placeholder="description">{{old('paragraph')}}</textarea>
                    @if ($errors->has('author'))
                    <div class="is-invalid">
                     {{$errors->first('author')}}
                    </div>                       
                 @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button class="btn btn-lg btn-primary" type="submit">
                    Simpan
                </button>
            </div>
        </div>
    </form>


@endsection
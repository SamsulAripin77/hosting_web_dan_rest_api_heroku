@extends('blogs.global')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>check semua blog</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('blogs.create')}}" class="btn btn-success">Buat article baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('status'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

<table class="table table-responsive table-bordered table-striped table-hover table-fit">
    <thead class="th-dark">
        <tr>
            <th widt="3%">No</th>
            <th width="20%">author</th>
            <th width="30%">title</th>
            <th width="40%">description</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$article->author}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->paragraph}}</td>
            <td width="50px">
                <form action="{{route('articles.destroy',$article->id)}}" method="post">
                <a href="{{route('articles.edit',$article->id)}}" class="btn btn-success">edit</a>
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-sm" value="hapus">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$articles->links()}}
@endsection
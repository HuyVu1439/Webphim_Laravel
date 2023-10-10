@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category">
  Thêm nhanh 
</button>

<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route'=>'genre.store','method'=>'POST']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm thể loại phim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">Quản Lý Thể Loại</div>

          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
             
                 
              
                  <div class="form-group">
                      {!! Form::label('title', 'Tên thể loại', []) !!}
                      {!! Form::text('title', isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('slug', 'Đường dẫn', []) !!}
                      {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class'=>'form-control','placeholder'=>'...','id'=>'convert_slug']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('description', 'Mô tả thể loại', []) !!}
                      {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('status', 'Trạng thái', []) !!}
                      {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($genre) ? $genre->status : '', ['class'=>'form-control']) !!}
                  </div>
                  {{-- @if(!isset($genre))
                      {!! Form::submit('Thêm Thể Loại', ['class'=>'btn btn-success']) !!}
                  @else
                      {!! Form::submit('Cập Nhật Thể Loại', ['class'=>'btn btn-success']) !!}
                  @endif --}}
              {{-- {!! Form::close() !!} --}}
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Thêm</button> --}}
        {!! Form::submit('Thêm Thể Loại', ['class'=>'btn btn-primary']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
<table class="table" id="tablephim">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên thể loại</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Đường dẫn</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      @foreach($list as $key => $cate)
      <tr>
        <th scope="row">{{$key}}</th>
        <td>{{$cate->title}}</td>
        <td>{{$cate->description}}</td>
        <td>{{$cate->slug}}</td>
        <td>
          @if($cate->status)
              Hiển thị
          @else
              Không hiển thị
          @endif
        </td>
        <td>
            {!! Form::open(['method'=>'DELETE','route'=>['genre.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
              {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
            <a href="{{route('genre.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
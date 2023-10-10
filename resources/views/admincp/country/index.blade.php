@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category">
  Thêm nhanh 
</button>

<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['route'=>'country.store','method'=>'POST']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm quốc gia phim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">Quản Lý Quốc Gia</div>

          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              
                 
             
                  <div class="form-group">
                      {!! Form::label('title', 'Tên quốc gia', []) !!}
                      {!! Form::text('title', isset($country) ? $country->title : '', ['class'=>'form-control','placeholder'=>'...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('slug', 'Đường dẫn', []) !!}
                      {!! Form::text('slug', isset($country) ? $country->slug : '', ['class'=>'form-control','placeholder'=>'...','id'=>'convert_slug']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('description', 'Mô tả quốc gia', []) !!}
                      {!! Form::textarea('description', isset($country) ? $country->description : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('status', 'Trạng thái', []) !!}
                      {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($country) ? $country->status : '', ['class'=>'form-control']) !!}
                  </div>
                  {{-- @if(!isset($country))
                      {!! Form::submit('Thêm Quốc Gia', ['class'=>'btn btn-success']) !!}
                  @else
                      {!! Form::submit('Cập Nhật Quốc Gia', ['class'=>'btn btn-success']) !!}
                  @endif --}}
             
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Thêm</button> --}}
        {!! Form::submit('Thêm Quốc gia', ['class'=>'btn btn-primary']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

<table class="table" id="tablephim">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên quốc gia</th>
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
            {!! Form::open(['method'=>'DELETE','route'=>['country.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
              {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
            <a href="{{route('country.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection
@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Quản Lý Link Movie</div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="card-body">
                <table class="table" id="tablephim">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên link</th>
                      <th scope="col">Mô tả</th>
                      
                      <th scope="col">Trạng thái</th>
                      <th scope="col">Quản lý</th>
                    </tr>
                  </thead>
                  <tbody class="order_position">
                    @foreach($linkmovie as $key => $movielink)
                    <tr>
                      <th scope="row">{{$key}}</th>
                      <td>{{$movielink->title}}</td>
                      <td>{{$movielink->description}}</td>
                     
                      <td>
                        @if($movielink->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                      </td>
                      <td>
                          {!! Form::open(['method'=>'DELETE','route'=>['linkmovie.destroy',$movielink->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                          {!! Form::close() !!}
                          <a href="{{route('linkmovie.edit',$movielink->id)}}" class="btn btn-warning">Sửa</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              
              </div>
          </div>
         
      </div>
  </div>
</div>


@endsection
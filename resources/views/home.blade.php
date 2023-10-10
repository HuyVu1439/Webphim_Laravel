@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center" style="padding-bottom: 50px;">CHÀO MỪNG ĐẾN TRANG QUẢN TRỊ WEBSITE</h2>
</div>
<div class="container" style="padding-left: 90px;">
  <div class="col_3">
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-file icon-rounded"></i>
                <a href="{{route('category.index')}}">
                <div class="stats">
                  <h5><strong>{{$category_total}}</strong></h5>
                  <span>Danh mục phim</span>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-child user1 icon-rounded"></i>
                <a href="{{route('genre.index')}}">
                <div class="stats">
                  <h5><strong>{{$genre_total}}</strong></h5>
                  <span>Thể loại phim</span>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                <a href="{{route('country.index')}}">
                <div class="stats">
                  <h5><strong>{{$country_total}}</strong></h5>
                  <span>Quốc gia phim</span>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
                <a href="{{route('movie.index')}}">
                <div class="stats">
                  <h5><strong>{{$movie_total}}</strong></h5>
                  <span>Phim</span>
                </div>
                </a>
              </div>
            </div>
            <!-- <div class="col-md-3 widget">
              <div class="r3_counter_box">
                {{-- <i class="pull-left fa fa-users dollar2 icon-rounded"></i> --}}
                <div class="stats">
                  <span style=" color: green;">Đang Online : {{\Tracker::onlineUsers()->count()}}<br/>
                  <span>Tổng Users truy cập : {{$total_users}}<br/>
                  <span>Tổng Users truy cập tuần : {{$total_users_week}}</span><br/>
                  <span>1 Tháng: {{$total_users_month}}</span><br/>
                  <span>3 tháng: {{$total_users_3months}}</span><br/>
                  <span>1 năm : {{$total_users_thisyear}}</span>
                  
                </div>
              </div>
            </div> -->
  </div>
</div>
@endsection

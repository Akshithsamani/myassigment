@extends('layouts.app')
  <style type="text/css">
    body
    {
       background-image: url('img/home-bg.jpg');
    }
  </style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="background-color: transparent; border:none;">
                <br><br>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <table class="table table-dark table-hover table-borered" style="background-color: #f5efef;">
                      <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name (Click on course name to view the details)</th>
                            <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>@php $i = 1;@endphp
                        @foreach($courses['elements'] as $key=>$course)
                        @php 
                        $name = $course['name'];
                        $type = $course['courseType'];
                        $id = $course['id'];
                        $slug = $course['slug'];
                        @endphp
                          <tr>
                              <th scope="row">{{$i}}</th>
                              <td><a data-toggle="collapse" data-target="#{{$course['id']}}">{{$course['name']}}</a>
                                <div id="{{$course['id']}}" class="collapse">
                                  <dl class="row text-center">
                                    <dt><br>
                                      <dd class="col-md-3">Type : {{$course['courseType']}}</dd>
                                      <dd class="col-md-5">ID : {{$course['id']}}</dd>
                                      <dd class="col-md-4">Slug : {{$course['slug']}}</dd>
                                    </dt>
                                  </dl>
                                </div>
                              </td>
                              <td>
                                @if(in_array($id, $myCourses))
                                  <a data-toggle="collapse" data-target="#{{$course['id']}}"><span style="color:green; font-weight: 900;">View</span></a>
                                  <a href="{{url('/deleteCourse/'.$id)}}"><span style="color:red; font-weight: 900;">Delete</span></a>
                                @else
                                  <a href="{{ url('/addCourse/'.$name.'/'.$type.'/'.$id.'/'.$slug)}}">Add</a>
                                @endif
                              </td>
                            </form>
                          </tr>@php $i++;@endphp
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

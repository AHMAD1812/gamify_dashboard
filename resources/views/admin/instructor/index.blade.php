@extends('admin.layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="main-content container-fluid" style="min-height: 80vh;">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class='breadcrumb-header'>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Instructor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Instructor
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Categories</th>
                                    <th>Courses</th>
                                    <th>View Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instructors as $instructor)
                                    <tr>
                                        <td>{{$instructor->full_name}}</td>
                                        <td>{{$instructor->email}}</td>
                                        <td>
                                            @foreach ($instructor->categories as $key => $category)
                                                {{$category->name}} {{$key != count($instructor->categories)-1 ? ',' : ''}}
                                            @endforeach
                                        </td>
                                        <td>{{$instructor->courses_count}}</td>
                                        <td>
                                            <span class="badge bg-success" href="{{ route('admin.profile') }}">View</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
        <div class="clearfix"></div>
    </main><!-- End #main -->
@endsection

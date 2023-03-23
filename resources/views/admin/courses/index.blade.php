@extends('admin.layouts.index')

@section('content')
    <main id="main" class="main">
        <div class="main-content container-fluid" style="min-height : 80vh;">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class='breadcrumb-header'>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Course</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Courses
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Create Name</th>
                                    <th>Categories</th>
                                    <th>Course level</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->creator->full_name }}</td>
                                        <td>
                                           {{$course->categories}}
                                        </td>
                                        <td>{{ $course->course_level }}</td>
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

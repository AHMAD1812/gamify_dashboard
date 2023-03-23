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
                                <li class="breadcrumb-item active" aria-current="page">Student</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Students
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Categories</th>
                                    <th>Courses Enrolled</th>
                                    <th>View Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            @foreach ($student->categories as $key => $category)
                                                {{ $category->name }} {{ $key != count($student->categories) - 1 ? ',' : '' }}
                                            @endforeach
                                        </td>
                                        <td>{{ $student->student_courses_count }}</td>
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

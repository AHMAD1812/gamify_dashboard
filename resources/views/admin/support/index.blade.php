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
                                <li class="breadcrumb-item active" aria-current="page">Support</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Support Queries
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    {{-- <th>View Profile</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supports as $support)
                                    <tr>
                                        <td>{{$support->user->full_name}}</td>
                                        <td>{{$support->title}}</td>
                                        <td>
                                            {{$support->description}}
                                        </td>
                                        {{-- <td>
                                            <span class="badge bg-success" href="{{ route('admin.profile') }}">View</span>
                                        </td> --}}
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

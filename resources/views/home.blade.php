@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Quiz Dashboard') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <!-- Total Quizzes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Quizzes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['total_quizzes'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Participants -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Participants</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['participants'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quiz Submissions -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Uploaded Questions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['total_questions'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- High Scores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Answers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['average_score'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Leaderboard -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Leaderboard</h6>
                </div>
                <div class="card-body">
                    <p>View the top performers for ongoing and completed quizzes.</p>
                    <a href="{{ route('leaderboards.index') }}" class="btn btn-primary">View Leaderboard</a>
                </div>
            </div>

            <!-- Performance Insights -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Performance Insights</h6>
                </div>
                <div class="card-body">
                    <p>Analyze quiz performance and gain insights into participant engagement and scores.</p>
                    <a href="#" class="btn btn-info">View Insights</a>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Quiz Management -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Quizzes</h6>
                </div>
                <div class="card-body">
                    <p>Create, edit, and manage quizzes effortlessly.</p>
                    <a href="{{ route('quizzes.index') }}" class="btn btn-success">Manage Quizzes</a>
                </div>
            </div>

            <!-- Tips for Success -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tips for Success</h6>
                </div>
                <div class="card-body">
                    <p>Ensure questions are well-crafted, scores are calculated accurately, and the system remains fair and
                        engaging for all participants.</p>
                </div>
            </div>

        </div>

    </div>
@endsection

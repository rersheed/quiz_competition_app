@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('About') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow mb-4">

                <div class="card-profile-image mt-4 text-center">
                    <img src="{{ asset('img/logo.jpg') }}" class="rounded-circle" alt="HarFaSoft Academy Ltd-logo"
                        style="width: 150px; height: 150px;">
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h5 class="font-weight-bold">Quiz App</h5>
                            <p>Developed by <strong>HarFaSoft Academy Ltd</strong> for <strong>IMJ Investments</strong>.</p>
                            <p>This application is designed to simplify quiz creation, management, and reporting with an
                                intuitive and user-friendly interface.</p>
                            <p>For more information or inquiries, please visit:</p>
                            <a href="https://harfasoftacademy.com.ng" target="_blank" class="btn btn-primary">
                                <i class="fas fa-globe fa-fw"></i> HarFaSoft Academy Website
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Features</h5>
                            <ul>
                                <li>Secure and efficient quiz management system.</li>
                                <li>Detailed performance tracking and reporting.</li>
                                <li>Responsive design suitable for all devices.</li>
                                <li>Built with Laravel and Bootstrap for scalability and elegance.</li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Credits</h5>
                            <p>This app is built using several open-source libraries and tools:</p>
                            <ul>
                                <li><a href="https://laravel.com" target="_blank">Laravel</a> - A robust PHP framework.</li>
                                <li><a href="https://startbootstrap.com/themes/sb-admin-2" target="_blank">SB Admin 2</a> -
                                    Dashboard template by Start Bootstrap.</li>
                                <li>Custom components and functionality tailored for IMJ Investments.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

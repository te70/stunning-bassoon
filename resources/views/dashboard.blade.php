<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-dash-layout/>
            <body>
                <div class="container-fluid">
                    <div class="row">
                        <x-side-menu/>
                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2">Dashboard</h1>
                            </div>
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">{{$students->count()}}</h5>
                                        <p class="card-text">Total students</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">{{$paidStudents->count()}}</h5>
                                        <p class="card-text">Paid students</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
                        </main>
                    </div>
                </div>
            </body>
        </div>
    </div>
</x-app-layout>

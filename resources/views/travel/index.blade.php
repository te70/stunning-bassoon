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
                                <h1 class="h2">Travel logs</h1>
                            </div>
                            <div class="row text-center">
                                <table id="example" class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Time logged</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($logs as $key=>$log)
                                            <td>{{$log->student_id}}</td>
                                            <td>{{$log->created_at}}</td>
                                            <td> 
                                                <div class="dropup">
                                                <a href="#" role="button" data-bs-toggle="dropdown">
                                                  <i style="color: black;" class="bi bi-three-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                  <form action="{{ route('travel.delete', ['id' => $log->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" href="">Delete</button>
                                                </form> 
                                                </ul>
                                              </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </main>
                    </div>
                </div>
            </body>
            <script type="text/javascript">
                $(document).ready(function() {
                $('#example').DataTable();
              });
            </script>
        </div>
    </div>
    
</x-app-layout>

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
                                <h1 class="h2">Students</h1>
                                <a class="btn btn-sm btn-outline-secondary" href="/student/create">Create student</a>
                            </div>
                            <div class="row text-center">
                                <table id="example" class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Student name</th>
                                            <th>Student ID</th>
                                            <th>Phone number</th>
                                            <th>Emergency number</th>
                                            <th>Pickup</th>
                                            <th>Receipt expiry</th>
                                            <th>Receipt</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($students as $key=>$student)
                                            <td class="text-uppercase">{{$student->student_name}}</td>
                                            <td>{{$student->student_id}}</td>
                                            <td>{{$student->phone_number}}</td>
                                            <td>{{$student->emergency_number}}</td>
                                            <td>{{$student->pickup}}</td>
                                            <td>{{$student->receipt_expiry}}</td>
                                            <td><a class="badge text-bg-primary" href="{{ asset('receipts/'.$student->receipt_image) }}" target="_blank">View receipt</a></td>
                                            <td> 
                                                <div class="dropup">
                                                <a href="#" role="button" data-bs-toggle="dropdown">
                                                  <i style="color: black;" class="bi bi-three-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                  <form action="{{ route('student.delete', ['id' => $student->id]) }}" method="POST">
                                                    @csrf
                                                    <a class="dropdown-item" href="{{route('student.edit',['id'=>$student->id])}}">Update</a>
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

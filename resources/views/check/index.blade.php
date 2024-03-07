<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-dash-layout/>
            <body>
                <div class="container-fluid">
                    <div class="row">
                        <x-side-menu/>
                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> 
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                                <h1 class="h2">Check Payment status</h1>
                            </div> 
                            <div class="row text-center ml-3">
                                @if(session('success'))
                                    <div id="successAlert" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @elseif(session('fail'))
                                    <div id="failAlert" class="alert alert-danger">
                                        {{ session('fail') }}
                                    </div>
                                @else
                                    {{-- <div id="errorAlert" class="alert alert-secondary">There must be an error</div> --}}
                                @endif
                                <form action="/check/store" method="POST" enctype="multipart/form-data" class="row g-3 w-75 bg-white p-4 rounded-lg">
                                    @csrf
                                  <div class="col-mb-3">
                                      <label for="studentID" class="form-label">Student ID</label>
                                      <input type="text" class="form-control" id="studentID" name="student_id">
                                    </div>
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary font-black">Check status</button>
                                    </div>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
            </body>
        </div>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById('successAlert').style.display = 'none';
            document.getElementById('failAlert').style.display = 'none';
            document.getElementById('errorAlert').style.display = 'none';
        }, 5000); 
    </script>
    
</x-app-layout>

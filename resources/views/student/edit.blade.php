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
                                <h1 class="h2">Update student</h1>
                            </div>           
                            <div class="row text-center">
                                <form action="{{ route('student.update', $id)}}" method="POST" enctype="multipart/form-data" class="row g-3 w-75 bg-white p-4 rounded-lg">
                                    @csrf
                                    @method('PUT')
                                  <div class="col-md-6">
                                      <label for="receiptImage" class="form-label">Receipt image</label>
                                      <input type="file" class="form-control" id="receiptImage" name="receipt_image">
                                    </div>
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary font-black">Update student</button>
                                    </div>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
            </body>
        </div>
    </div>
</x-app-layout>

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
                                <h1 class="h2">Update mileage</h1>
                            </div>           
                            <div class="row text-center">
                                <form action="{{ route('mileage.update', $id)}}" method="POST" enctype="multipart/form-data" class="row g-3 w-75 bg-white p-4 rounded-lg">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-6">
                                        <label for="morningReading" class="form-label">Morning reading</label>
                                        <input type="text" class="form-control" id="morningReading" name="morning_reading" value={{$log->morning_reading}}>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="eveningReading" class="form-label">Evening reading</label>
                                        <input type="text" class="form-control" id="eveningReading" name="evening_reading" value={{$log->evening_reading}}>
                                      </div>
                                      <div class="col-md-6">
                                          <label for="numberPlate" class="form-label">Number plate</label>
                                          <input type="text" class="form-control" id="numberPlate" name="number_plate" value={{$log->number_plate}}>
                                        </div>
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary font-black">Update log</button>
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

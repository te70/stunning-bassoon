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
                                <h1 class="h2">Create Student</h1>
                            </div> 
                            <div class="row text-center ml-3">
                                <form action="/student/store" method="POST" enctype="multipart/form-data" class="row g-3 w-75 bg-white p-4 rounded-lg">
                                    @csrf
                                  <div class="col-md-6">
                                      <label for="studentName" class="form-label">Student name</label>
                                      <input type="text" class="form-control" id="studentName" name="student_name">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="studentId" class="form-label">Student ID</label>
                                      <input type="text" class="form-control" id="studentId" name="student_id">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="pickup" class="form-label">Pickup</label>
                                      <input type="text" class="form-control" id="pickup" name="pickup">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="phoneNumber" class="form-label">Phone number</label>
                                      <input type="text" class="form-control" id="phoneNumber" name="phone_number">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="emergencyNumber" class="form-label">Emergency number</label>
                                      <input type="text" class="form-control" id="emergencyNumber" name="emergency_number">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="receiptExpiry" class="form-label">Receipt expiry</label>
                                      <input type="date" class="form-control" id="receiptExpiry" name="receipt_expiry">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="receiptImage" class="form-label">Receipt image</label>
                                        <input type="file" class="form-control" id="receiptImage" name="receipt_image">
                                    </div>
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary font-black">Create job</button>
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

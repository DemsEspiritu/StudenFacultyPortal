

<div class="modal fade" id="ModalView{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Infromation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
              {{ csrf_field() }}
              <div class="card-body">

              <div class="m-2">
                  <div class="row g-3">
                      <div class="col-5">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="First Name" value="{{$info->name}}">
                          <span style="color:red; font-size:10px;">@error('name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-5">
                          <label>Last Name</label>
                          <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $info->last_name }}">
                          <span style="color:red; font-size:10px;">@error('last_name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-2">
                          <label>Gender</label>
                          <input type="gender" name="sex" class="form-control" placeholder="Gender" value="{{ $info->sex }}">
                          <span style="color:red; font-size:10px;">@error('sex'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-12">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $info->address }}">
                          <span style="color:red; font-size:10px;">@error('address'){{ $message}} @enderror</span> 
                        </div>
                      <div class="col-md-6">
                        <label>Phone Number</label>
                          <input type="number" name="phone" class="form-control" placeholder="Phone Number" value="{{ $info->phone }}">
                          <span style="color:red; font-size:10px;">@error('phone'){{ $message}} @enderror</span> 
                        </div>
                        <div class="col-md-6">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $info->email }}">
                          <span style="color:red; font-size:10px;">@error('email'){{ $message}} @enderror</span> 
                        </div>
                      <div class="col-6">
                          <label>Grade</label>
                          <input type="grade" name="grade" class="form-control" placeholder="Email" value="{{ $info->grade }}">
                              <span style="color:red; font-size:10px;">@error('grade'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-6">
                          <label>Type</label>
                          <input type="Type" name="user_type" class="form-control" placeholder="Type"
                           value="@if($info->user_type==3)Student
                                  @else
                                  None
                                  @endif">
                              <span style="color:red; font-size:10px;">@error('user_type'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-md-4">
                              <label>Age</label>
                              <input type="number" name="age" class="form-control" placeholder="Age" value="{{ $info->age }}">
                              <span style="color:red; font-size:10px;">@error('age'){{ $message}} @enderror</span> 
                      </div>
                  </div>
               </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete Request</button>
        <button type="button" class="btn btn-primary">Accept Student</button>
      </div>
    </div>
  </div>
</div>
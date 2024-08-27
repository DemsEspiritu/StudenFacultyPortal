


<!--                                          Modal View Student                           -->


<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Student Information</h4>
                    <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    <div class="m-2">
                        <div class="row g-3">
                            <div class="m-2">
                          <div class="row g-3">

                              <div class="col-4">
                                  <label style="font-weight: bold;">First Name:  {{$value->name}}</label>
                              </div>
                              <div class="col-4">
                                  <label style="font-weight: bold;">Last Name:  {{$value->last_name}}</label>
                              </div>

                              <div class="col-3">
                                  <label style="font-weight: bold;">Middle Name:  {{$value->middle_name}}</label>
                              </div>

                              <hr>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Email:  {{$value->email}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Birth Date:  {{$value->birthdate}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Age:  {{$value->age}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Gender:  {{$value->gender}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Place of Birth:  {{$value->place_bdate}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Address:  {{$value->address}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">Phone:  {{$value->phone_number}}</label>
                              </div>

                              <div class="col-5">
                                  <label style="font-weight: bold;">LRN:  {{$value->lrn}}</label>
                              </div>

                
                           </div>
                       </div>
                    </div>

                  </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</form>

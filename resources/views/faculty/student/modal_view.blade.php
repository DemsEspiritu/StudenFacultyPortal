


<!--                                          Modal View Student                           -->


<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$student->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="row g-2">
                            <div class="m-2">
                          <div class="row g-2">

                            <div class="col-5">
                                  <label style="font-weight: bold;">LRN: {{$student->lrn}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">First Name: {{$student->name}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Last Name: {{$student->last_name}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Middle Name: {{$student->middle_name}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Email: {{$student->email}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Date of Birth: {{$student->birthdate}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Address: {{$student->address}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Age: {{$student->age}}</label><p></p>
                            </div>

                            
                            <div class="col-5">
                                  <label style="font-weight: bold;">Gender: {{$student->gender}}</label><p></p>
                            </div>

                            
                            <div class="col-5">
                                  <label style="font-weight: bold;">Grade: {{$student->grade}}</label><p></p>
                            </div>

                            <hr>
                            <h6>Parents Information</h6>
                        
                            <div class="col-5">
                                  <label style="font-weight: bold;">Mother Name: {{$student->mother_name}}</label><p></p>
                            </div>
                            
                            <div class="col-5">
                                  <label style="font-weight: bold;">Phone: {{$student->mother_phone}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Father Name: {{$student->father_name}}</label><p></p>
                            </div>

                            <div class="col-5">
                                  <label style="font-weight: bold;">Phone: {{$student->father_phone}}</label><p></p>
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

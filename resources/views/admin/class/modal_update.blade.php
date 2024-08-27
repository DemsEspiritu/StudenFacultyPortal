<!--                                          Modal Add Student                           -->


<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEditClass{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Class</h4>
                    <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    <div class="m-2">
                    <div class="row g-3">
                        <div class="col-5">
                            <label>Class</label>
                          <select class="form-select" name="name" value="{{$value->name}}">
                              <option></option>
                              <option value="Grade 7">Grade 7</option>
                              <option value="Grade 8">Grade 8</option>
                              <option value="Grade 9">Grade 9</option>
                              <option value="Grade 10">Grade 10</option>
                          </select>
                            <span style="color:red; font-size:10px;">@error('name'){{ $message}} @enderror</span> 
                        </div>
                        <div class="col-5">
                        <label>Section</label>
                          <select class="form-select" name="section" value="{{$value->section}}">
                              <option></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                          </select>
                        </div>
                    </div>
                </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update Class</button>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</form>


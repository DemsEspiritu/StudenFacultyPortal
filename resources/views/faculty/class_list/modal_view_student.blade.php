


<!--                                          Modal View Student                           -->


<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$classCount->class_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Student List</h4>
                    <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body"> 
                 
                                  <label style="font-weight: bold;">Class: {{$classCount->name}}</label><p></p>
   
                                  <label style="font-weight: bold;">Section: {{$classCount->section}}</label><p></p>
  
                    <hr>

                    @foreach($classCount->students as $student)
                            <p>{{ $student->name }}, {{ $student->last_name }} {{ $student->middle_name }}.</p>
                    @endforeach
                  

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

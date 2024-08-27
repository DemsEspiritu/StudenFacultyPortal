

<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="Delete{{$value->form_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    <div class="m-2">
                       <h4>Are You Sure to Accept this Request?</h4>
                    </div>

                  </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <a href="{{ url('faculty/request/list/approved'.$value->form_id) }}" class="btn btn-success btn-sm">Approved</a>
                            <button type="button"class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</form>
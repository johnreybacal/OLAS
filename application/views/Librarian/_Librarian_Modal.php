<div class="modal modal-center fade" id="modal-librarian" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Librarian</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-librarian-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="LibrarianId"/>
                        
                        <div class="row mb-2">
                            <div class="col-md-2 col-sm-2">
                                <label>Librarian Role</label>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <select id="LibraryRoleid" name="LibrarianId" class="form-control align-center">
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Librarian Name</label>
                            </div>
                            <div class="col-md-9">
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Username</label>
                            </div>
                            <div class="col-md-9">
                                <input id="Username" name="Username" type="text" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Password</label>
                            </div>
                            <div class="col-md-9">
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>

                        <!-- <div class="row" id="rowActive">
                            <div class="col-sm-2 col-md-2">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-8 col-md-8">
                                <div class="form-group">
                                    <label class="switch switch-info">
                                        <input type="checkbox" id="IsActive" name="IsActive" checked />
                                        <span class="switch-indicator"></span>
                                        <label>Active</label>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                      
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!--  <button-- class="btn btn-label btn-primary"><label><i class="fa fa-edit"></i></label> Save Changes</button-->
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Librarian_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Librarian_Modal = {
        data: function () {
            return {
                LibrarianId: $('#LibrarianId').val(),
                Name: $('#Name').val(),
                LibraryRoleid: $('#LibraryRoleid').find(":selected").text(),
                //Active: $('#IsActive').prop("checked")
            }
        },

        init: function () {
            $('#modal-librarian-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
        },

        new: function () {
            $('#LibrarianId').val('0');
            $('.modal-title').text('Update');
            $('#rowActive').addClass('invisible');
            $('#modal-librarian').modal('show');
            Librarian_Modal.init();
        },

        validate: function () {
            
        }
    }


</script>
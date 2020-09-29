<div class="modal fade" id="kt_scrollable_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add New  Permission </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" >
                <div class="scroll scroll-pull" data-scroll="true" data-height="300">
                    <form  method="post" action="{{route('admin.roles.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" name="role" value="" class="form-control form-control-lg"  placeholder="Role Name"/>
                            @error('role')<label class="btn-danger"> {{$message}}</label>@enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-form-label">Check Permission Needed</label>
                            <div class="col-12 col-form-label">
                                <div class="checkbox-inline">
                                    @foreach($permissions as $permission)
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox"  name="permission[]" value="{{$permission->name}}"/>
                                        <span></span>
                                        {{$permission->name}}
                                    </label>
                                    @endforeach
                                    @error('permission') <label class="btn-danger"></br>{{$message}}</label>@enderror
                                </div>
                                <span class="form-text text-muted">Don't Miss to Check required Permissions</span>
                            </div>
                        </div>
                        @error('permission')<label class="btn-danger"> {{$message}}</label>@enderror
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" >Close</button>
                        <input type="submit" value="Submit" class="btn btn-primary" id="kt_blockui_4_1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Start Edit Modal-->
<div class="modal fade" id="edit_kt_scrollable_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add New  Permission </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" >
                <div class="scroll scroll-pull" data-scroll="true" data-height="300">
                    <form  method="post" id="edit-form">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" name="role" id="edit-name"  value="" class="form-control form-control-lg"  placeholder="Role Name"/>
                            @error('role')<label class="btn-danger"> {{$message}}</label>@enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-form-label">Check Permission Needed</label>
                            <div class="col-12 col-form-label">
                                <div class="checkbox-inline">
                                    @foreach($permissions as $permission)
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" class="check-permission" data-value="{{$permission->id}}" name="permission[]" value="{{$permission->name}}"/>
                                            <span></span>
                                            {{$permission->name}}
                                        </label>
                                    @endforeach
                                    @error('permission') <label class="btn-danger"></br>{{$message}}</label>@enderror
                                </div>
                                <span class="form-text text-muted">Don't Miss to Check required Permissions</span>
                            </div>
                        </div>
                        @error('permission')<label class="btn-danger"> {{$message}}</label>@enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" >Close</button>
                        @can('create')
                            <input type="submit" value="Submit" class="btn btn-primary" id="kt_blockui_4_1">
                        @endcan
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Edit Modal-->


<div  id="UpdateModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">office verification module</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group row ">
                <div class="ml-3">
                    <input type="checkbox" name="is_admin" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
{{--                    @if($firm->verified) checked @endif"--}}
                </div>
                <div class="text-primary">
                    <h3>Verified company</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-5" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Verified</button>
            </div>
        </div>
    </div>
</div>


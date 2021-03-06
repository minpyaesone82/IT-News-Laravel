
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    Launch static backdrop modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade " id="updateInfo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateInfoLabel">Update User Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('profile.updateInfo')}}" method="post" id="infoUpdate">
                @csrf
                <div class="form-group">
                    <label>
                        <i class="mr-1 feather-phone"></i>
                        Your Phone
                    </label>
                    <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}" required>
                    @error("phone")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label >
                        <i class="mr-1 feather-map"></i>
                        Address
                    </label>
                    <textarea name="address" class="form-control" rows="5" required></textarea>
                    @error("address")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary " form="infoUpdate">Update</button>
        </div>
      </div>
    </div>
  </div>
    <script>
        $("#updateInfo").modal("show");

        // setInterval(function(){
        //     $("#updateInfo").modal("show");
        // },5000);
    </script>

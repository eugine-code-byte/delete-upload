<!-- Modal -->
<div class="modal fade" id="edit-new-account-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row p-2">
            <div class="col-5">
                <label for="account_id">Account ID</label>
            </div>
            <div class="col-7">
                <input type="text" name="accountid" id="account_id" class="form-control">
                <input type="text" name="search_id" id="search_id" hidden>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-5">
                <label for="account_name">Account Name</label>
            </div>
            <div class="col-7">
                <input type="text" name="accountname" id="account_name" class="form-control">
            </div>
          </div>
          <div class="row p-2">
            <div class="col-5">
                <label for="bank_name">Bank Name</label>
            </div>
            <div class="col-7">
                <input type="text" name="bankname" id="bank_name" class="form-control">
            </div>
          </div>
          <div class="row p-2">
            <div class="col-5">
                <label for="current_balance">Current Balance</label>
            </div>
            <div class="col-7">
                <input type="text" name="currentbalance" id="current_balance" class="form-control">
            </div>
          </div>
          <div class="row p-2">
            <div class="col-5">
                <label for="date_opened" disabled>Date Opened</label>
            </div>
            <div class="col-7">
                <input type="date" name="dateopened" id="date_opened" class="form-control" >
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="edit-account">Update</button>
        </div>
      </div>
    </div>
  </div>

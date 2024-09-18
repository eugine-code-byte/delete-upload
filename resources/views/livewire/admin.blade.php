<div>
    <div class="card">
        <div class="card-header">
            <div class="row p-2 ">
                <div class="col-4 text-end">
                    <input type="text" name="search" id="" class="form-control" wire:model.live.debounce.100ms="searchAccount">
                </div>
                <div class="col-4 text-end">
                    <button class="btn btn-primary" id="add-account" >Add Account</button>
                </div>
                <div class="col-4">
                    <select name="" id="sort" class="form-control" wire:model.live.debounce="searchAccount">
                        <option value="" selected>All</option>
                        <option value="bpi">BPI</option>
                        <option value="eastwest">East West</option>
                        <option value="bdo">BDO</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row p-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Account Number</th>
                            <th>Account Name</th>
                            <th>Bank Name</th>
                            <th>Current Balance</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->accountid }}</td>
                                <td>{{ $data->accountname }}</td>
                                <td>{{ $data->bankname }}</td>
                                <td>{{ $data->currentbalance }}</td>
                                <td>
                                    <button class="btn btn-success" id="edit" data-id="{{ $data->accountid }}" data-name="{{ $data->accountname }}" data-bank="{{ $data->bankname }}" data-balance="{{ $data->currentbalance }}" data-date="{{ $data->dateopened }}">Edit</button>
                                    <button class="btn btn-danger" id="delete" data-id="{{ $data->accountid }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('addNewAccountModal')
    @include('modals.editAccountModal')
</div>

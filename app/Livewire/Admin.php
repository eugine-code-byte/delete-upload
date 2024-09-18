<?php

namespace App\Livewire;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Admin extends Component
{

    protected $listeners = ['refreshAdminPage' => '$refresh'];
    public $searchAccount = '';
    public function create(Request $request)
    {
        $save = Account::create($request->objectAccount);
        return response()->json([
            "success" => $save ? true : false,
            "msg" => $save ? "Account added" : "Failed to add account"
        ]);
    }
    public function render()
    {
        $datas = DB::table("accounts")
            ->where('accountid', 'like', '%' . $this->searchAccount . '%')
            ->orWhere('accountname', 'like', '%' . $this->searchAccount . '%')
            ->orWhere('bankname', 'like', '%' . $this->searchAccount . '%')
            ->get();
        return view('livewire.admin', ['datas' => $datas]);
    }

    public function update(Request $request)
    {
        $search = $request->objectAccount['search_id'];
        $up = DB::table('accounts')
            ->where('accountid', $search)
            ->update([
                'accountid' => $request->objectAccount['accountid'],
                'accountname' => $request->objectAccount['accountname'],
                'bankname' => $request->objectAccount['bankname'],
                'currentbalance' => $request->objectAccount['currentbalance']
            ]);
        return response()->json([
            "success" => $up ? true : false,
            "msg" => $up ? "Account updated" : "Failed to update account"
        ]);
    }

    public function delete(Request $request)
    {
        $search = $request->objectAccount['search_id'];
        $del = DB::table('accounts')
            ->where('accountid', $search)
            ->delete();
        return response()->json([
            "success" => $del ? true : false,
            "msg" => $del ? "Account deleted" : "Failed to delete account"
        ]);
    }
}

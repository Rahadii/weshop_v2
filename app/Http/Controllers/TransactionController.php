<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use SweetAlert;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transactions = Transactions::groupBy('code')->orderBy('id','DESC')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function status($code, $status)
    {
        // mengubah status
        if($status == 0){
            $change = '1';
        }else {
            $change = '0';
        }
        
        $transactions = Transactions::where('code', $code)->pluck('id')->toArray();
        // return $transactions;
        Transactions::whereIn('id', $transactions)->update(['status' => $change]);

        alert()->info(' ', 'Status Pembayaran telah di perbarui!');

        return redirect('admin/transactions');
    }

    public function detail($code){
        // menampilkan 
        $transactions = Transactions::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $transactionsDetail = Transactions::orderBy('id','ASC')->where('code',$code)->get();
        // 
        return view('admin.transactions.detail', compact('transactions','transactionsDetail'));
    }

    public function cetakPDF($code){
        $data['transactions'] = Transactions::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $data['transactionsDetail'] = Transactions::orderBy('id','ASC')->where('code',$code)->get();
        $pdf = PDF::loadView('admin.transactions.cetakPDF', $data);
        return $pdf->download('invoice.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use App\Imports\TransactionsImport;
use App\Models\Transaction;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('app.index', compact('transactions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx' // Ensure the uploaded file is an Excel file
        ]);

        try {
            DB::beginTransaction();


            Excel::import(new TransactionsImport, request()->file('file')); // Import the uploaded file
            DB::commit();
            return redirect()->back()->with('success', 'Fichier importé avec succès!');
        } catch (\Exception $e) {
            // Handle any errors during the import
            return redirect()->back()->with('error', 'Erreur lors de l\'importation du fichier: ' . $e->getMessage());
        }
    }
}

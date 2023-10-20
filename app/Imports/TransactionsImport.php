<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class TransactionsImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Transaction([
            'operation' => $row[0],        // "operation" est la première colonne
            'contact' => $row[1],          // "contact" est la deuxième colonne
            'amount' => floatval($row[2]), // "amount" est la troisième colonne
            'transaction_date' => Carbon::parse($row[3]), // "transaction_date" est la quatrième colonne
        ]);
    }
}

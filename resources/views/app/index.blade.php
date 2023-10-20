@extends('layouts.app')
@section('content')


@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Importer le fichier </h4>
                <form class="cmxform" id="signupForm" method="POST" action="{{ route('transactions.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <fieldset>

                        <div class="form-group">
                            <label for="service">Fichier *( XLS, XLSX, )</label>
                            <input class="form-control" type="file" id="formFile" name="file" required>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Importer">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Liste des Transactions

                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Operation</td>
                                <td>Contact</td>
                                <td>Montant</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)


                            <tr>
                                <td>{{ $transaction->operation }}</td>
                                <td>{{ $transaction->contact }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->transaction_date}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
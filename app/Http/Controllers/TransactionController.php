<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Any;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'bookedEvent']);
        // Successful payment
        if (request()->filled('filter') && request('filter') == 'successful') {
            $transactions = $transactions->where('payment_status', 'success');
        }
        // Incomplete payment
        if (request()->filled('filter') && request('filter') == 'incomplete') {
            $transactions = $transactions->where('payment_status', '!=', 'success');
        }
        // Installment
        if (request()->filled('filter') && request('filter') == 'installment') {
            $transactions = $transactions->whereHas('bookedEvent', function ($query) {
                $query->where('payment_type', 'installment');
            });
        }
        // Full payment
        if (request()->filled('filter') && request('filter') == 'full') {
            $transactions = $transactions->whereHas('bookedEvent', function ($query) {
                $query->where('payment_type', 'full_payment');
            });
        }

        // Search transactions 
        if (request()->filled('search')) {
            $transactions = $this->search($transactions, request('search'));
        }

        // Get the latest data and paginate
        $transactions = $transactions
            ->latest()
            ->paginate(10);

        // return $transactions;
        return view(
            'dashboard.pages.transactions.index',
            [
                'transactions' => $transactions,
                'filter' => request('filter') ?? null,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function myTransactions()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->with(['user', 'bookedEvent'])->latest()->paginate(10);
        return view('dashboard.pages.transactions.my-transactions', ['transactions' => $transactions]);
    }

    // Search transactions and it's relationships
    private function search($transaction, $search)
    {
        $search = ($search == 'full payment') ? 'full_payment' : $search;
        $search = strtolower($search);
        $transactions = $transaction->whereHas('user', function ($query) use ($search) {
                $query->whereAny([
                    'name',
                    'email',
                    'phone',
                    'address',
                    'city',
                    'state',
                    'country',
                    'first_name',
                    'last_name',
                    'middle_name',
                ], 'like', '%' . $search . '%');
            })
            ->orWhereHas('bookedEvent', function ($query) use ($search) {
                $query->whereAny([
                    'user_id', 'event_id',
                    'payment_type', 'approved_by',
                    'payment_amount', 'status', 'paid'
                ], 'like', '%' . $search . '%');
            });

        return $transactions;
    }

    /**
     * Filter transactions by date range.
     */
    public function filterByDate()
    {
        $startDate = request('start_date');
        $endDate = request('end_date');

        $transactions = Transaction::with(['user', 'bookedEvent'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->latest()
            ->paginate(10);

        return view('dashboard.pages.transactions.index', ['transactions' => $transactions, 'filter' => null]);
    }
}

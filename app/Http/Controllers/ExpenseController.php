<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\AccountTotal;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $accountBalance =  AccountTotal::latest()->first();
        $expenses =  Expense::with('user')->get();
        return view('expenses.index',compact('expenses','accountBalance'));
    }

    public function create()
    {

        $accountBalance =  AccountTotal::latest()->first();
        return view('expenses.create',compact('accountBalance'));

    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);
    
        // Fetch the last account balance
        $lastAccountBalance = AccountTotal::latest()->first();
    
        // Store a new expense
        $expense = Expense::create([
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'user_id' => auth()->user()->id,
            // Add other fields as needed
        ]);
    
        // Subtract the expense amount from the account balance
        $newAccountBalance = $lastAccountBalance->balance - $expense->amount;
    
        // Create a new account balance record
        AccountTotal::create([
            'balance' => $newAccountBalance,
            // Add other fields as needed
        ]);
    
        // Redirect or perform other actions after successfully storing the expense
        return redirect()->route('expenses.index')->with('success', 'Expense created successfully');
    }

    public function getSalaries(){
        $employees= Teacher::all();
        return view('expense.salary',compact('employees'));

    }

    public function show($id)
    {
        // Your logic to show a specific expense
    }


    public function edit($id)
    {
        // Your logic for showing the edit form
    }


    public function update(Request $request, $id)
    {
        // Your logic to update the expense
    }

   
    public function destroy($id)
    {
        // Your logic to delete the expense
    }
}

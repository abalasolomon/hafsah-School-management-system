<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\AccountTotal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    // CheckoutController.php
    public function checkout(Request $request, $studentId)
    {
        // Validate the request data as needed

        // Fetch cart items for the student
        $cartItems = Cart::where('student_id', $studentId)->with('inventory')->get();

        // Create a new sales record
        $sales = Sale::create([
            'student_id' => $studentId,
            'sales_person_id' => auth()->user()->id,
            'sold_by' => auth()->user()->id,
            'total_amount' => $this->calculateTotalAmount($cartItems),
            // Add other fields as needed
        ]);

        // Create sales items based on the cart items
        foreach ($cartItems as $cartItem) {
            if (!$cartItem->inventory || !$cartItem->quantity) {
                continue;  // Skip this item - it is no longer in stock or has been removed
                }
                // update the inventory quantity
                $cartItem->inventory->update(['quantity' => $cartItem->inventory->quantity
                 - $cartItem->quantity]);

                // Associate each inventory item with its sale
                SaleItem::create([
                    'sale_id' => $sales->id,
                    'name' => $cartItem->inventory->name,
                    'price' => $cartItem->inventory->price,
                    'quantity' => $cartItem->quantity,
                    'amount' => $cartItem->quantity * $cartItem->inventory->price,
                ]);

        }

            // Read the last account balance
        $lastAccountBalance = AccountTotal::latest()->first();

        // Calculate the new account balance
        $newAccountBalance = $lastAccountBalance->balance + $sales->total_amount;
        // Create a new account total record
        $accountBalance = AccountTotal::create([
            'total_amount' => $newAccountBalance,
            // Add other fields as needed
        ]);

        // Clear the cart for the student
        Cart::where('student_id', $studentId)->delete();

        // Redirect or respond as needed

        return redirect()->route('sales.index')
            ->with('success', 'Checkout Completed');
    }

    // Helper method to calculate total amount from cart items
    private function calculateTotalAmount($cartItems)
    {
        return $cartItems->sum(function ($cartItem) {
            return $cartItem->quantity * $cartItem->inventory->price;
        });
    }

}

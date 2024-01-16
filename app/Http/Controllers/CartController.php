<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Student;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index', compact('carts'));
    }

    public function create()
    {
        $students = Student::all();
        $inventoryItems = Inventory::all();
        return view('carts.create', compact('students','inventoryItems'));
        // Add logic if needed
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'nullable|exists:students,id',
            'inventory_id' => 'required|exists:inventory,id',
            'quantity' => 'required|integer|min:1',
            // Add other validation rules as needed
        ]);

        Cart::create($request->all());

        return redirect()->route('carts.index')
            ->with('success', 'Item added to cart successfully');
    }

    public function show(Cart $cart)
    {
        return view('carts.show', compact('cart'));
    }

    public function edit(Cart $cart)
    {
        // Add logic if needed
    }

    public function update(Request $request, Cart $cart)
    {
        // Add logic to update the cart item
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('carts.index')
            ->with('success', 'Item removed from cart successfully');
    }
    public function getStudentCart($studentId)
    {
        try {
            $cartData = Cart::where('student_id', $studentId)
                ->with('inventory') // Assuming a relationship between Cart and Inventory
                ->get();

            // Return the cart data as JSON
            return response()->json($cartData);
        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error($e);

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function searchItems(Request $request)
    {
        $searchQuery = $request->input('search');

        // Perform a query to fetch items based on the search query
        $results = Inventory::where('name', 'like', '%' . $searchQuery . '%')->get();

        return response()->json($results);
    }

    public function addItemToCart(Request $request)
    {
        $studentId = $request->input('student_id');
        $itemId = $request->input('item_id');
    
        // Check if the item already exists in the student's cart
        if (Cart::where(['student_id' => $studentId, 'inventory_id' => $itemId])->exists()) {
            return response()->json(['error' => 'Item already exists in the cart for this student']);
        }
    
        // Fetch item details based on $itemId
        $item = Inventory::find($itemId);
    
        // Check if the item is available in the inventory
        if ($item && $item->status != 'available') {
            return response()->json(['error' => 'Item is not available in the inventory']);
        }
    
        // Add the item to the cart table
        Cart::create([
            'student_id' => $studentId,
            'inventory_id' => $itemId,
            'quantity' => 1, // Default quantity
            'price' => $item->price,
        ]);
    
        return response()->json(['message' => 'Item added to cart successfully']);
    }

    public function updateCart(Request $request)
    {
        $studentId = $request->input('student_id');
        $itemId = $request->input('item_id');
        $action = $request->input('action');

        // Find the cart entry
        $cartEntry = Cart::where(['student_id' => $studentId, 'inventory_id' => $itemId])->first();

        if (!$cartEntry) {
            return response()->json(['error' => 'Item not found in the cart']);
        }

        // Adjust quantity based on the action (increase or decrease)
        if ($action === 'increase') {
            $cartEntry->quantity += 1;
        } elseif ($action === 'decrease') {
            $cartEntry->quantity = max(1, $cartEntry->quantity - 1);
        }

        // Save the updated cart entry
        // $cartData = Cart::where('student_id', $studentId)
        //         ->with('inventory') // Assuming a relationship between Cart and Inventory
        //         ->get();
        //     return response()->json($cartData);
        return response()->json(['message' => 'Cart updated successfully','cartItems' => $cartEntry]);
    }

    public function removeItem(Request $request)
    {
        $studentId = $request->input('student_id');
        $itemId = $request->input('item_id');

        // Find and delete the cart entry
        Cart::where(['student_id' => $studentId, 'inventory_id' => $itemId])->delete();

        return response()->json(['message' => 'Item removed from cart successfully']);
    }

    public function getCartTotal(Request $request)
    {
        $studentId = $request->input('student_id');

        // Retrieve the cart items for the student
        $cartItems = Cart::where('student_id', $studentId)->with('inventory')->get();

        // Calculate the total
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->inventory->price;
        });

        return response()->json(['total' => $total]);
    }
    

}

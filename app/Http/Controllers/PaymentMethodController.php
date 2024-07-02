<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $method = PaymentMethod::all();
        return view('pages.paymentMethod.index', [
            'methods' => $method
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.paymentMethod.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'method_name' => 'required|string|max:15|min:1'
        ]);

        PaymentMethod::create($validated);

        return redirect()->route('methods.index')->with('success', 'Metode ini berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('pages.paymentMethod.edit', [
            'method' => $paymentMethod
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'method_name' => 'required|string|max:15|min:1,|unique:payment_methods,method_name'
        ]);

        PaymentMethod::findOrFail($id)->update($validated);

        return redirect()->route('methods.index')->with('success', 'Metode ini berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PaymentMethod::destroy($id);

        return redirect()->route('methods.index')->with('success', 'Metode ini berhasil dihapus');
    }
}

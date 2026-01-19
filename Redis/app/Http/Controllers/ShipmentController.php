<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShipmentController extends Controller
{



    public function index()
    {

        $page = request('page', 1);

        $shipments = Cache::remember("shipments.pending.page.$page", 300, function () {
            return Shipment::where('status', 'pending')
                ->latest()
                ->paginate(6);
        });


        return view('shipments.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shipments.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewShipmentRequest $request)
    {
        Shipment::create($request->validated());

        Cache::flush();

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}

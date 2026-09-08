<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Models\Shipment;
use App\Models\ShipmentDocuments;
use App\Models\User;
use App\Traits\HandlesImageUpload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ShipmentController extends Controller
{
    use HandlesImageUpload;



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

        $shipment = Shipment::create($request->validated());

        $fileTypes = [

            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        foreach ($request->file('documents') as $document) {
            if (str_starts_with($document->getMimeType(), 'image/')) {

                $name = $this->uploadImage($document, "documents/$shipment->id",);

                $name = $shipment->id . "/" . $name;

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $name,
                ]);
            } elseif (in_array($document->getMimeType(), $fileTypes)) {

                $extension = $document->getClientOriginalExtension();

                $filename = uniqId() . '.' . $extension;

                $path = $document->storeAs("documents/{$shipment->id}", $filename, 'public');

                $path = str_replace('documents/', '', $path);

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $filename,
                ]);
            }
        }




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

<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactsResourse;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $limit = $request['limit'] ?? 5;
        $page = request('page', 1);
        $items = Contact::paginate($limit);
        return response()->json([
            'data' => $items->items(),
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
            ],
            'links' => [
                'first_page_url' => $items->url(1),
                'last_page_url' => $items->url($items->lastPage()),
                'prev_page_url' => $items->previousPageUrl(),
                'next_page_url' => $items->nextPageUrl(),
            ]
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact =  Contact::create([
            'name' => 'Vladyslav',
            'surname' => 'Test',
            'email' => 'test@test.com',
            'phone' => '1234567890',
            'isFavorite' => false,
            'image' => ''
        ]);
        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadImage(Request $request)
    {

       $contact = Contact::findOrFail($request['id']);

        Storage::disk('public')->deleteDirectory('/images/avatars/' . $request['id']);
       $path = Storage::disk('public')->put('/images/avatars/'.$request['id'], $request->file('image'));

        if ($contact) {
            $contact->image = $path;
            $contact->save();
        }

       return url('storage/' .$path);
    }
}

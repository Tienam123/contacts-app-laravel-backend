<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts\ContactRequest;
use App\Http\Resources\Contacts\ContactsResourse;
use App\Http\UseCases\Contacts\ContactService;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    private ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request['limit'] ?? 5;
        $items = Contact::paginate($limit);
        return response()->json([
            'data' => ContactsResourse::collection($items->items()),
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
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {

        $data = $request->validated();

        $contact = Contact::create($data);

        if ($request->hasFile('image')) {
            $url = $this->contactService->uploadImg($contact->id, $request->file('image'));
            $contact->image = $url;
            $contact->save();
        }

        return response(ContactsResourse::make($contact)->resolve(), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            return ContactsResourse::make($contact)->resolve();
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {
        $data = $request->validated();
        $contact = Contact::find($id);
        if ($contact) {
            $contact->update($data);
            return ContactsResourse::make($contact)->resolve();
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->noContent();
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }

    public function updateUserImage(Request $request)
    {
        if ($request->hasFile('image')) {
            return $this->contactService->uploadImg();
        }
    }
}

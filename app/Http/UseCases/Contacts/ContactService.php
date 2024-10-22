<?php

namespace App\Http\UseCases\Contacts;

use App\Models\Contact;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ContactService
{
    public function uploadImg($id, UploadedFile $file): string
    {
        Storage::disk('public')->deleteDirectory('/images/avatars/' . $id);
        $path = Storage::disk('public')->put('/images/avatars/' . $id, $file);

        return url('storage/' . $path);
    }
}

<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\TemporaryFile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UsersController extends Controller
{

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user = User::find($id);
        $tmpFile = TemporaryFile::all()->first();

        if ($tmpFile) {
            $mediaItem = $user->media->first();
            if ($mediaItem){
                $mediaItem->delete();
            }
                $user->addMedia(storage_path('app/private/tmp/' . $tmpFile->folder . '/' . $tmpFile->filename))
                    ->toMediaCollection('avatar');
                $tmpFile->delete();
                File::deleteDirectory(storage_path('app/private/tmp/' . $tmpFile->folder));
            }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        if($request->admin) {
            return redirect()->route('admin.profile')->with('success', 'Changes saved');
        }else{
            return redirect()->route('profile')->with('success', 'Changes User saved');
        }


    }


}

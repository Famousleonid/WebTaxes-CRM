<?php

namespace App\Http\Controllers\Cabinet;

use App\Firm;
use App\Http\Controllers\Controller;
use App\TemporaryFile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class MediaController extends Controller
{

    public function filepondStoreScan(Request $request) // загрузка во временную директорию + BD Temporary_files
    {

        $keys = request()->request->keys();
        $key = $keys[0];

        if ($request->hasFile($key)) {

            $file = $request->file($key);
            $filename = $file->getClientOriginalName();
            $folder = uniqid('', true) . '-' . now()->timestamp;

            $file->storeAs('tmp/' . $folder, $filename, 'private');

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
            return $folder;
        }
        return '';
    }

    public function filepondDeleteScan(Request $request) // удаление из временной директории - BD Temporary_files
    {

        $folder = request()->getContent();
        $temporaryFile = TemporaryFile::where('folder', $folder)->first();

        if ($temporaryFile) {
            $path = storage_path('app/private/tmp/' . $folder);

            File::deleteDirectory($path);

            $temporaryFile->delete();
        }

    }

    public function addMediaScan($firmId, Request $request) // добавление в BD Media c удалением temporary_files
    {

        $firm = Firm::find($firmId);
        $listTmpFiles = TemporaryFile::all();
        $name = $request->name_doc;

        if ($listTmpFiles) {
            foreach ($listTmpFiles as $tmpFile) {

                $firm->addMedia(storage_path('app/private/tmp/' . $tmpFile->folder . '/' . $tmpFile->filename))
                    ->toMediaCollection($name);

                $tmpFile->delete();

                File::deleteDirectory(storage_path('app/private/tmp/' . $tmpFile->folder));

            }
        }

        return redirect()->back();
    }

    public function mediaDelete($firmId, $mediaId) //  удаление из BD Media
    {
        $firm = Firm::find($firmId);
        $mediaItem = $firm->media->find($mediaId);
        $mediaItem->delete();

        return redirect()->back();

    }

    public function showAvatar ( $userId )
    {

        $user = User::find($userId);
        $media = $user->getMedia('avatar')->first();

        return response()->file($media->getPath());

    }  // показать avatar

    public function showThumb($mediaId, $firmId, $mediaName)
    {

        $firm = Firm::find($firmId);
        $media = $firm->getMedia($mediaName)->where('id', $mediaId)->first();

        return response()->file($media->getPath('thumb'));

    }  // показать thumb

    public function showBigPicture($mediaId, $firmId, $mediaName)
    {

        if (Auth::user()) {
            $firm = Firm::find($firmId);
            $media = $firm->getMedia($mediaName)->where('id', $mediaId)->first();
        }

        return response()->file($media->getPath(''));


    } // показать картинку полностью

    public function downloadMediaFile($mediaId, $firmId, $mediaName)
    {
        $firm = Firm::find($firmId);
        $media = $firm->getMedia($mediaName)->where('id', $mediaId)->first();
        $filePath = Storage::disk('private')->getAdapter()->getPathPrefix() . $mediaId . '/' . $media->file_name;

        return response()->download($filePath);

    } // скачать на компьютер

    public function verifiedMediaFile($mediaId)
    {
        $current = Media::find($mediaId);
        if ($current->verified == 0 ) {
            $current->verified = 1;
            $current->save();
        } else {
            $current->verified = 0;
            $current->save();
        }
        return redirect()->back();
    }


}

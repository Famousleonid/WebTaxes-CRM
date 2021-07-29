<?php

namespace App\Http\Controllers\Cabinet;

use App\Firm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{

    public function invoicesIndex($firmId)  // загрузка таблицы сканированных чеков
    {

        $firm = Firm::find($firmId);
        $invoices = $firm->getMedia('invoices');

        return view('cabinet.profile.add-scan-invoice', compact('firm', 'invoices'));

    }

    public function edit_constituent_documents($firmId)
    {
        $firm = Firm::find($firmId);
        $articles_incorporation = $firm->getMedia('articles_incorporation');
        $business_number_registration = $firm->getMedia('business_number_registration');
        $shareholders = $firm->getMedia('shareholders');
        $director_information = $firm->getMedia('director_information');
        $resolutions = $firm->getMedia('resolutions');
        $articles_amalgamation = $firm->getMedia('articles_amalgamation');
        $notice_change_address = $firm->getMedia('notice_change_address');
        $last_t2 = $firm->getMedia('last_t2');

        return view('cabinet.profile.add-scan-doc', compact(
            'firm',
            'articles_incorporation',
            'business_number_registration',
            'shareholders',
            'director_information',
            'resolutions',
            'articles_amalgamation',
            'notice_change_address',
            'last_t2'
        ));
    } // загрузка аккордеона редактирования constituent_documents с выводом из Media


}

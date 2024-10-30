<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function index()
    {
        $agencies = Agency::all();
        return view('admin.Agency.index',compact('agencies'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')){
            try {

            }catch (\Exception $e){
                return $this->exception_message($e);
            }

        }
        return view('admin.Agency.add');

    }
}

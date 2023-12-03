<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\CertificationProf;
class certificationController extends Controller
{
    public function Store(Request $request)
    {
        $fileName = time().'.'.$request->file('attestation')->getClientOriginalExtension();
        $path = $request->file('attestation')->storeAs('attestation',$fileName,'public');
        $requestDataAttestaion['attestation'] = '/storage/'.$path;
        $CertificationProf = CertificationProf::create([
            'certification'    => $requestDataAttestaion['attestation'],
            'iduser'           => Auth::user()->id,
        ]);
    }
}

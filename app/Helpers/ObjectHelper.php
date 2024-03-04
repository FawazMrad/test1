<?php

use App\Models\subject;
use \Illuminate\Http\Request;
function getObject(Request $request)
    {
        $object = subject::where('id',$request->get('id'))->first() ;
       if($object)
        return $object;
       return response()->json(['message'=>'object not found'],404);
    }

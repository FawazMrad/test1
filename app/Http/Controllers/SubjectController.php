<?php

namespace App\Http\Controllers;

//use App\Models\subject;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function Laravel\Prompts\select;

class SubjectController extends Controller
{
    public function add(Request $request)
    {
        $subject = subject::Create(['name_ar' => $request->get('name_ar'), 'name_en' => $request->get('name_en')]);
        $subject->save();
        return response()->json(['message' => (__('subject.add'))], 201);
    }

    public function get(Request $request)
    {
        $lang = App::getLocale();
        $subjects = subject::all('name_' . $lang);
        return response()->json([$subjects]);
    }

    public function search(Request $request)
    {
        $preferedLang = preferedLang($request);
        $bodyLang = checkLang($request);
        if ($preferedLang === $bodyLang) {
            $subject = Subject::where('name_' . $preferedLang, $request->get('subject'))->first();

            if ($subject) return response()->json(['subject' => $subject], 200);
            return response()->json(['message' => (__('subject.notfound'))], 404);

        }

        return response()->json(['message' => (__('subject.languageError')) . $preferedLang ], 400);

    }
    public function update(Request $request)
    {
        $preferedLang=preferedLang($request);
        $bodyLang=checkLang($request);
        if($bodyLang===$preferedLang)
        {
            $object=getObject($request);
            $name='name_'.$preferedLang;
            $oldName=$object->$name;
            $object->$name=$request->get('newName');
            $object->save();
            return response()->json(['oldName'=>$oldName,'newName'=>$request->get('newName')],200);
        }
        return response()->json(['message' => (__('subject.languageError')) . $preferedLang], 400);


    }
}

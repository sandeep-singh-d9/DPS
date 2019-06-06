<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreEditor;

class HomeController extends Controller
{
    /**
     * Clear css cache.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function fileVersion($uri){
        $file = $_SERVER['DOCUMENT_ROOT'].'/'.$uri;
        if (!file_exists($file)) return $file;

        return $uri.'?v='.filemtime ( $file );
    }


    public function save(Request $request)
    {
        $data = StoreEditor::first();
        if ($data) {
            StoreEditor::where('id', 1)->update([
                'editor_data' => $request->get('editor_data')
            ]);
        } else {
            StoreEditor::create([
                'editor_data' => $request->get('editor_data')
            ]);
        }
        

        return response()->json([
            'success' => true,
        ], 201);
    }

    public function getData()
    {
        $data = StoreEditor::first();
        return response()->json([
            'success' => true,
            'data'    => $data
        ], 200);
    }
}

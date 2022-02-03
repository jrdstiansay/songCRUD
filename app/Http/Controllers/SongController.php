<?php

namespace App\Http\Controllers;

use App\Models\Song;

use Illuminate\Http\Request;
use DataTables;

class SongController extends Controller
{
    public function index()
    {
        $data = Song::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($req) {
                return $req->created_at->format('Y-m-d'); // human readable format
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" class="edit btn btn-warning mb-1" id="edit' . $row["id"] . '"><i class="bi bi-pencil"></i></a> <a href="javascript:void(0)" class="del btn btn-danger mb-1" id="del' . $row["id"] . '"><i class="bi bi-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function show($id)
    {
        return Song::find($id)->toJson();
    }
    public function store(Request $req)
    {
        $song = new Song;
        $song->title = $req->title;
        $song->artist = $req->artist;
        $song->lyrics = $req->lyrics;
        $song->save();
        return "true";
    }
    public function update(Request $req, $id)
    {
        $song = Song::findOrFail($id);
        $song->title = $req->title;
        $song->artist = $req->artist;
        $song->lyrics = $req->lyrics;
        $song->save();
        return "true";
    }

    public function delete(Request $request, $id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return "true";
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\ProjectFile;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepositoryController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ['listing_id' => $request->project_id];

        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $data['file_path'] = $file->store('repository-1000' . Auth::id(), 'public');
                $data['file_name'] = $file->getClientOriginalName();
                ProjectFile::create($data);
            }
        }

        return redirect(route('repository.show', $request->project_id))->with('message', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('repository.index', [
            'project_files' => ProjectFile::where('listing_id', $id)->orderBy('created_at', 'desc')->get(),
            'folders' => Folder::where('listing_id', $id)->orderBy('created_at', 'desc')->get(),
            'project_id' => $id
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id)
            ProjectFile::destroy($id);

        return redirect()->back()->with('message', 'Project deleted successfully!');
    }

    public function createFolder(Request $request)
    {
        Folder::create([
            'folder_name' => $request->folder,
            'listing_id' => $request->project_id]
        );

        return redirect(route('repository.show', $request->project_id))->with('message', 'Folder created successfully!');
    }
}

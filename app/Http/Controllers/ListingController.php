<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function __construct()
    {
        // Optional function authorized only user to login to access this contoller
        // if(auth()->user()->id == auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'title' => 'Larafinds',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ];

        return view('listings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create Project'
        ];

        return view('listings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectFormRequest $request)
    {
        $request->validated();

        $project = [
            'user_id' => Auth::id(),
            'project_name' => $request->project_name,
            'website' => $request->website,
            'developer' => $request->developer,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'tags' => $request->tags,
            'description' => $request->description
        ];
        
        if ($request->hasFile('logo')) {
            $project['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($project);

        return redirect(route('listing.index'))->with('message', 'Listing created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'listing' => Listing::findOrFail($id)
        ];

        return view('listings.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Listing Edit',
            'listing' => Listing::where('id', $id)->first()
        ];

        return view('listings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectFormRequest $request, $id)
    {
        $projectField = $request->validated();

        if ($request->hasFile('logo')) {
            $projectField['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::where('id', $id)->update($projectField);

        return back()->with('message', 'Listing edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listing::destroy($id);

        return redirect(route('listing.index'))->with('message', 'Listing deleted successfully!');
    }

    public function manage() {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    } 
}

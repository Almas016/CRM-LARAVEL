<?php

namespace App\Http\Controllers\Admin\Prospects;

use App\Models\Prospect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prospects\StoreProspectRequest;
use App\Http\Requests\Prospects\UpdateProspectRequest;
use App\Http\Requests\Prospects\UpdateProfileImageRequest;
use Illuminate\Support\Facades\Storage;

class ProspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.prospects.index', ['prospects' => Prospect::latest()->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prospects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProspectRequest $request)
    {
        $prospect = Prospect::create($request->only('name', 'email'));
        if ($request->hasFile('profile_image')) {
            $path = $request->profile_image->store('public/prospects/profiles/images');
            $prospect->update(['profile_image' => $path]);
        }
        return redirect()->route('admin.prospects.contacts.create', $prospect->id)->with('success', 'Successfully created a New Prospect');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect $prospect)
    {
        return $prospect->load('contact');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospect $prospect)
    {
        return view('admin.prospects.edit', compact('prospect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProspectRequest $request, Prospect $prospect)
    {
        $prospect->update($request->validated());

        return back()->with('success', 'Successfully updated prospect details!');
    }
    public function updateProfileImage(UpdateProfileImageRequest $request, Prospect $prospect)
    {
        if ($prospect->profile_image) {
            Storage::delete($prospect->profile_image);
        }
        $path = $request->image->store('public/prospects/profiles/images');

        $prospect->update(['profile_image' => $path]);

        return back()->with('success', 'Successfully updated profile image!');
    }
    public function destroyProfileImage(Prospect $prospect)
    {
        if($prospect->profile_image){
            Storage::delete($prospect->profile_image);

            $prospect->update(['profile_image' => null]);
        }

        return back()->with('success', 'Successfully deleted profile image!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        if($prospect->profile_image){
            Storage::delete($prospect->profile_image);
        }

        $prospect->delete();

        return redirect()->route('admin.prospects.dashboard')->with('success', 'Successfully deleted prospect!');
    }
}

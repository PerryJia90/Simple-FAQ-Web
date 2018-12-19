<?php
namespace App\Http\Controllers;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\Unit\profileTest;
use Storage;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = new Profile();
        $edit = FALSE;
        return view('profileForm', ['profile' => $profile, 'edit' => $edit]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'body' => 'required',
        ], [
            'fname.required' => ' First is required',
            'lname.required' => ' Last is required',
            'body.required' => ' Body is required',
        ]);
        $input = request()->all();
        $profile = new Profile($input);
        $profile->user()->associate(Auth::user());
        $profile->save();
        return redirect()->route('home')->with('message', 'Profile Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$user)
    {
        $user = User::find($user);
        $profile = $user->profile;
        return view('profile',compact('user'))->with('profile', $profile);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user, $profile)
    {
        $user = User::find($user);
        $profile = $user->profile;
        $edit = TRUE;
        return view('profileForm', ['profile' => $profile, 'edit' => $edit]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user, $profile)
    {
        $input = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
        ], [
            'fname.required' => ' First is required',
            'lname.required' => ' Last is required',
        ]);
        $profile = Profile::find($profile);
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->body = $request->body;
        $profile->save();
        return redirect()->route('home')->with('message', 'Updated Profile');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request)
    {
        if ($request->isMethod('POST')){
            $file = $request->file('source');
            if($file->isValid()){
                $originalname = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                return back()->with('message', 'file uploaded');
            }
            exit;
        }
        return view('upload');
    }

}
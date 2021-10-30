<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use DB;
use Hash;
use Illuminate\Support\Arr;
    
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = Invoice::orderBy('id','DESC')->with('getUser')->paginate(15);
        return view('admin.invoice.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }
    // ------------------------------------------------------------------------
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view('admin.invoice.create',compact('users'));
    }
    // ------------------------------------------------------------------------
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user'      => 'required',
            'service'      => 'required',
            'price'      => 'required',
        ]);
    
        $input = $request->all();
        $input['user_id'] = $request->user;
    
        $invoice = Invoice::create($input);    
        return redirect()->route('invoice.index')
                        ->with('success','Invoice created successfully !!');
    }
    // ------------------------------------------------------------------------
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    // ------------------------------------------------------------------------
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }
    // ------------------------------------------------------------------------
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required',
            'city' => 'required',
        ]);
    
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully !!');
    }
    // ------------------------------------------------------------------------
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully !!');
    }
    // ------------------------------------------------------------------------
}
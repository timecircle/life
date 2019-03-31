<?php namespace App\Http\Controllers\Root;
use App\Http\Controllers\Controller;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;

class IssuerController extends Controller
{

    public function index()
    {
        $issuers  = Issuer::paginate(8);
        return view('root.issuer',compact('issuers'));
    }
    public function fresh()
    {
        return view('root.issuer.new');
    }

    public function detail( $id )
    {
        $iss  = Issuer::find( $id );
        if($iss){
          return view ('root.issuer.detail',compact('iss'));
        }
        return $this->fresh();
    }

  ////POST////
    public function add(Request $req)
    {
        $this->validate($req,[
          'title' => 'required|max:255',
          'user'  => 'required|max:255',
          'pass'  => 'required|max:255',
        ]);

        if( User::exits($req->user) )
              return $this->e( 'Tài khoản này đã tồn tại' );

        $iss      = new Issuer();
        $iss->is  = [
          'title'     =>  $req->title,
          'password'  =>  $req->pass,
          'public'    =>  $req->user,
        ];

        $iss->store();
        return $this->s( 'Tạo thành công' );

    }

    public function edit(Request $req )
    {
        $this->validate($req,['title' => 'required|max:255']);

        $iss        = Issuer::find($req->iss_id);
        $iss->is    = [
          'title'   =>  $req->title,
          'status'  =>  $req->status ? 'active' : 'draft',
          'email'   =>  $req->email,
          'website' =>  $req->website,
          'content' =>  $req->about,
          'address' =>  $req->address,
          'phone'   =>  $req->phone,
        ];

        $iss->store();
        return $this->s( 'Lưu thành công' );
    }

    public function del(Request $req)
    {
        Issuer::find($req->issuer_id)->forceDelete();
        return  $this->s( 'Xóa thành công' );
    }

}

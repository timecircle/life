<?php
namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Basic\Sys\Domain;
use App\Basic\Sys\User;
use App\Basic\Sys\Access;


class DomainController extends Controller
{
    public function index()
    {
        $domains  = Domain::paginate(8);
        return view('deep.domain',compact('domains'));
    }
    public function fresh()
    {
        return view('deep.domain.new');
    }


//POST
    public function add(Request $req)
    {
        $rule = [
          'domain' => 'required|max:255',
          'user'   => 'required|max:255',
          'pass'   => 'required|max:255',
        ];
        $this->validate($req,$rule);

        if( Domain::exits($req->domain) )
            return $this->e( 'Domain này đã tồn tại' );

        if( User::exits($req->user) )
            return $this->e( 'User này đã tồn tại' );

        $dm = new Domain;


        $dm->is = [
            'name'      =>  $req->domain,
            'password'  =>  $req->pass,
            'public'    =>  $req->user,
        ];

        $dm->store();
        if( $dm->id ){
            return $this->s( 'Tạo thành công' );
        }
        return $this->e( 'Đã có lỗi' );
    }


    public function edit(Request $req)
    {
        $rule = [ 'domain' => 'required|max:255'];
        $this->validate($req,$rule);

        $dm = Domain::find($req->domain_id);
        $dm->is = ['name'  =>  $req->domain];
        $dm->store();

        return $this->s( 'Lưu thành công' );
    }

    public function del(Request $req)
    {
          Domain::find( $req->domain_id )->forceDelete();
          return $this->s( 'Xóa thành công' );
    }


}

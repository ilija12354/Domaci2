<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopingList;
use App\Models\Post;
use App\Http\Requests\UpadateUser;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PorudzbineController extends Controller
{
    public function viewPorudzbine()
    {
        return view('porudzbine');
    }
    public function getPorudzbine(Request $request)
    {
        $user = $request->user();
        return ShopingList::where('user_id', $user->id)->get();
    }
    public function prikaziPorudzbinu($id, Request $request)
    {
        $user = $request->user();
        
        $porudzbina = ShopingList::findOrFail($id);

        if ($porudzbina->user_id != $user->id) {
            return redirect()->route('viewPorudzbine')->with('danger', 'Ne mozes da vidis tudj proizvod'); 
        }

        return view('porudzbina',compact('porudzbina'));
    }

    public function deletePorudzbine($id, Request $request)
    {
        $user = $request->user();

        $porudzbina = ShopingList::findOrFail($id);

        if ($porudzbina->user_id != $user->id) 
        {
            throw new Exception('Nemas pravo da obrises tudj proizvod');
        }

        $porudzbina->delete();
        return 'ok';
    }

    public function dodajPorudzbinu()
    {
        return view('dodajPorudzbinu');
    }

    public function createPorudzbine(Request $request)
    {
        $data = $request->validate([
            'ime'=>'required',
            'cena'=>'required',
        ]);

        $user = $request->user();

        $proizvod = new ShopingList;
        $proizvod->ime = $data['ime'];
        $proizvod->cena = $data['cena'];
        $proizvod->user_id = $user->id;

        $proizvod->save();
        return $proizvod;
    }

    public function promeniPorudzbinu($id)
    {
        $porudzbina=ShopingList::findOrFail($id);
        return view('promeniPoruzbinu',compact('porudzbina'));
    }

    public function updatePorudzbine($id, Request $request)
    {
        $user = $request->user();
        $porudzbina = ShopingList::findOrFail($id);

        if ($porudzbina->user_id != $user->id) {
            // TODO: Greska
            throw new Exception('Ne mozes da menjas tudji proizvod');
        }

        $data = $request->validate([
            'ime'=>'required',
            'cena'=>'required',
        ]);

        $porudzbina->ime = $data['ime'];
        $porudzbina->cena = $data['cena'];
        $porudzbina->save();
        return $porudzbina;
    }
    
    public function pretragaPorudzbina(Request $request)
    {
        $user = $request->user();
        $upit = $request->input('upit', '');
        $proizvodi = ShopingList::where('user_id', $user->id)->where('ime', 'like', '%' . $upit . '%')->get();
        return $proizvodi;
    }
}

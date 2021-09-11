<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopingList;
use App\Models\Post;
use App\Http\Requests\UpadateUser;
use Illuminate\Support\Facades\Hash;

class PorudzbineController extends Controller
{
    public function viewPorudzbine()
    {
        return view('porudzbine');
    }
    public function getPorudzbine()
    {
        return ShopingList::all();
    }
    public function prikaziPorudzbinu($id)
    {
        $porudzbina=ShopingList::findOrFail($id);
        return view('porudzbina',compact('porudzbina'));
    }

    public function deletePorudzbine($id)
    {
        $porudzbina = ShopingList::findOrFail($id);

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

        $proizvod = new ShopingList;
        $proizvod->ime = $data['ime'];
        $proizvod->cena = $data['cena'];
        $proizvod->user_id = 1;

        $proizvod->save();
        return $proizvod;
    }
    
}

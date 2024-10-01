<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index()//alapfüggvények amiket minden kontrollerben használunk
    {
        //select * from Lending
        return Lending::all();
    }

    public function store(Request $request)//egy rekord létrehozása
                                            //modellnek megfelelő példény kitöltése az összes kérésnek megfelelően
    {
        $record = new Lending();
        $record->fill($request->all());//létrehozunk egy új rekordot, és utána kitöltjük az összeset
        $record->save();//elmentjük a módosításokat
    }

    public function show(string $user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)// paramétereket megnézi, hogy megfelelnek e a különböző mezőknek
        ->where('copy_id', $copy_id)
        ->where('start', $start)
        //listát ad vissza
        ->get();
        return $lending[0];//lekérdezi, hogy létezik e ilyen rekord, visszatér egy listával, aminek az egyetlen eleme lesz az a rekord
    }
    public function update(Request $request, $user_id, $copy_id, $start)//ahhoz hogy módosítani tudjunk valamit meg kell adni paraméterekkel, hogy mit módosítanánk
    {
        $record = $this->show($user_id, $copy_id, $start);
        $record->fill($request->all());//azt a rekordot átírja
        $record->save();
    }

    public function destroy(string $user_id, $copy_id, $start)
    {
        $this->show($user_id, $copy_id, $start)->delete();//kitörli a megadott paraméterekkel rendelkező rekordot

    }
}

<?php namespace App\Http\Controllers;
ini_set('date.timezone', 'Asia/Jakarta');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $main = Storage::get('/data.json');
        $data = json_decode($main, true);
        rsort($data);

        return view('welcome', compact('data')); 
    }

   
    public function create()
    {

        return view('form');
    }

    public function __construct ($date='now'){
        $this->date = new\Datetime($date);
    }

    public  function date($format = 'l, j F Y H:i:s'){
        return $this->date->format($format);
    }

    public function post(Request $request)
    {
        $main = Storage::get('/data.json');
        $data = json_decode($main, true);

        $idlist = array_column($data, 'id');
        $auto_increment_id = end($idlist);

        $data[]=array(
            'id'=>$auto_increment_id+1,
            'title'=>$request ->title,
            'author'=>$request ->author,
            'date'=> date('l, j F Y H:i:s'),
            'content'=>$request ->content,
        );
        $sikop = json_encode($data, JSON_PRETTY_PRINT);
        $main = Storage::put('/data.json', $sikop);
        return redirect('/'); //saat masukin data bakal di arahin ke welcome

    }

    public function read($id)
    {
        $main = Storage::get('/data.json');
        $data = json_decode($main, true);
        $read = $data[$id-1];

        return view('read', compact('read')); 
    }

    public function edit($id)
    {
        $main = Storage::get('/data.json');
        $data = json_decode($main, true);
        $edit = $data[$id-1];

        return view('edit', compact('edit')); 


    }

    public function update(Request $request, $id)
    {
        $main = Storage::get('/data.json');
        $data = json_decode($main, true);

        $data[$id-1]= array(
            'id'=>$request ->id,
            'title'=>$request ->title,
            'author'=>$request ->author,
            'date'=> date('l, j F Y H:i:s'),
            'content'=>$request ->content,
        );

        $sikop = json_encode($data, JSON_PRETTY_PRINT);
        $main = Storage::put('/data.json', $sikop);
        return redirect('/');
    }

    public function destroy($id)
    {
        $main = Storage::get('/data.json');
        $data = json_decode($main, true);

        unset($data[$id-1]);
        $sikop = json_encode($data, JSON_PRETTY_PRINT);
        $main = Storage::put('/data.json', $sikop);
        return redirect('/');
    }
   
    
}

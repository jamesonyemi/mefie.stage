<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Faker\UniqueGenerator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code
        $regionTown = static::regionTownMap();
        $regions  = DB::table('tblregion')->pluck('region', 'rid');

        return view('system_setup.towns.index', compact('regionTown', 'regions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //code

        $validated = $request->validate([
            'town' => [
                'required',
                'alpha',
                'max:255',
                Rule::notIn(static::filterData()),
            ],
        ]);
       
        $fetchTowns     =   static::filterData();
        $postData       =   ClientController::allExcept();
        $alreadyExist   =   "The town ". ucfirst($validated['town']). " already exist";
        $toLower        =   strtolower($request->input("town"));
        $data           =   [

            'rid'       =>  $request->input('rid'),
            'town'      =>  ucfirst($toLower),
            'created_by_user_id'   =>  Auth::id()

        ];

        foreach (json_decode($fetchTowns) as $key => $value)
        {
            # code...
            if ( in_array($request->town, [$value]) )
            {
                # code...
                return redirect()->route('towns.create')->with('info', $alreadyExist);
            }
        }

        $create_town    =   DB::table('tbltown')->insertGetId(array_merge($postData, $data));
        return redirect()->route('towns.index')->with('success', 'Town #  ' .$create_town. ' Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //code
        $decryptId  = PaymentController::decryptedId($id);
        $genders    = DB::table('tblgender')->pluck('id', 'type');
        $regions    = DB::table('tblregion')->pluck('region', 'rid');
        $regionId   = DB::table('tblregion')->get()->pluck('region', 'rid');
        $townId     = DB::table('tbltown')->get()->pluck('tid', 'town');
        $towns      = DB::table('tbltown')->where('tid', $decryptId)->get();

        // I have join and a loop to do here
        $regionTownMap = static::regionTownMap();
        foreach ($regionTownMap as $key2 => $regionTown)
            {

                foreach ($towns as $key => $town)
                {
                    if ($town->tid === $regionTown->tid)
                    {
                        $town = $regionTown ;
                        $region_town = $town;
                        $keyMap =  $region_town;
                    }

                }

            }

        return view('system_setup.towns.show', compact(
            'towns',
            'townId',
            'regions',
            'regionId',
            'regionTownMap',
            'keyMap'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //code
        $decryptId  = PaymentController::decryptedId($id);
        $genders    = DB::table('tblgender')->pluck('id', 'type');
        $regions    = DB::table('tblregion')->pluck('region', 'rid');
        $regionId   = DB::table('tblregion')->get()->pluck('region', 'rid');
        $townId     = DB::table('tbltown')->get()->pluck('tid', 'town');
        $towns      = DB::table('tbltown')->where('tid', $decryptId)->get();


        return view('system_setup.towns.edit', compact(
            'towns',
            'townId',
            'regions',
            'regionId',
        ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // code;
        $decryptId    = PaymentController::decryptedId($id);
        $checkStatus  = ( $request->active !== 'yes' ) ? "no" : "yes";
        $updateInfo   = [
            'active' => $checkStatus,
            'town'   => $request->town,
            'rid'   => $request->rid,
        ];

        $update  =  DB::table('tbltown')->where('tid', $decryptId)->update( $updateInfo );
        $notify  =  ($update) ? 'was updated' : 'No changes made' ;

        return redirect()->route('towns.index')->with('success', 'Town # ' .$decryptId. ' '.$notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      // code;
      $decryptId   = Crypt::decrypt($id);
      $getTownId   = $decryptId;
      $active      = 'no';
      $deleted     = true;
      $isDeleted   = [ "active" => $active, "is_deleted" => $deleted ];
      $deleted     = DB::table('tbltown')->where('tid', $getTownId)->update($isDeleted);

      return redirect()->route('towns.index')->with('success', 'Town # ' .$getTownId. '  Info Deleted');
    }

    public function restore()
    {

        $regionTown = static::regionTownMap();
        $regionId    = DB::table('tblregion')->get()->pluck('region', 'rid');
        return view('system_setup.towns.restore', compact('regionTown', 'regionId'));

    }

    public function getTown(Request $request, $id)
    {
        $get_data      =  DB::table('tbltown')->where('tid', $id)->get();
        $is_active     =  'yes';
        $is_deleted    =  0;
        $status        =  [ "active" => $is_active, "is_deleted" => $is_deleted ];
        $restore       =  DB::table('tbltown')->where('tid', $id)->update($status);
        return json_encode($get_data);
    }

    public function restoreTown(Request $request, $id)
    {

        $id          =  $request->tid;
        $active      =  'yes';
        $deleted     =  0;
        $status      =  [ "active" => $active, "is_deleted" => $deleted ];
        $deleted     =  DB::table('tbltown')->where('tid', $id)->update($status);
        return redirect()->route ('towns.index')->with('success', 'Town # ' .$request->tid. '  was Restored');
    }

    public static function regionTownMap()
    {
         # code...
         $regionTown  = DB::table('tblregion as a')
         ->join('tbltown as b', 'b.rid', '=', 'a.rid')
         ->select('b.tid as tid','b.rid as rid', 'b.town as town', 'a.region','b.active', 'b.is_deleted' )->where("created_by_user_id", Auth::id() )
         ->orderBy('b.tid')->get()->toArray();

         return $regionTown;
    }

    public static function filterData()
    {
         # code...
        $get_data   =  DB::table('tbltown')->whereCreatedByUserId(Auth::id())->get()->pluck('town')->toJson();
        return ($get_data);
    }
}
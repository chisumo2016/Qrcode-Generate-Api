<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQrcodeRequest;
use App\Http\Requests\UpdateQrcodeRequest;
use App\Models\Qrcode as QrcodeModel;
use App\Models\Trasanction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use QRCode;

use App\Repositories\QrcodeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
//use Response;
use App\Http\Resources\Qrcode AS QrcodeResource;
use App\Http\Resources\QrcodeCollection AS QrcodeResourceCollection;

use Symfony\Component\HttpFoundation\Response;

class QrcodeController extends AppBaseController
{
    /** @var  QrcodeRepository */
    private $qrcodeRepository;

    public function __construct(QrcodeRepository $qrcodeRepo)
    {
        $this->qrcodeRepository = $qrcodeRepo;
    }

    /**
     * Display a listing of the Qrcode.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // Only admins should be able to view all transaction
        if(Auth::user()->role_id < 3){

            $this->qrcodeRepository->pushCriteria(new RequestCriteria($request));
            //Paginate our API
            $qrcodes = $this->qrcodeRepository->paginate(5);

        }else{
            //Paginate if urnot an admin
            $qrcodes  = QrcodeModel::where('user_id', Auth::user()->id)->paginate(5);
            //$qrcodes  = QrcodeModel::where('user_id', Auth::user()->id)->get();
        }
        // 1

        // Check if request if expects Json
        if($request->expectsJson()){

            return response([

                'data' =>  QrcodeResourceCollection::collection($qrcodes)

            ], Response::HTTP_OK);

            //2
        }

        return view('qrcodes.index')
            ->with('qrcodes', $qrcodes);
    }

    /**
     * Show the form for creating a new Qrcode.
     *
     * @return Response
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    /**
     * Store a newly created Qrcode in storage.
     *
     * @param CreateQrcodeRequest $request
     *
     * @return Response
     */
    public function store(CreateQrcodeRequest $request)
    {
        $input = $request->all();

        //Save  data to the database
        $qrcode = $this->qrcodeRepository->create($input);

        //Generate qrcode
        //save  qrcode image in our folder on this site

        $file = 'qrcodes-generator/'.$qrcode->id.'.png';

         QRCode::text("message")
            ->setSize(8)
            ->setMargin(2)
            ->setOutfile($file)
            ->png();

        $input['qrcode_path'] = $file;

        //dd($input['qrcode_path']);

        //updating database
        $newQrcode = QrcodeModel::where('id',$qrcode->id)
            ->update([
                'qrcode_path' => $input['qrcode_path']

            ]);


        // Save the qrcode
        if ($newQrcode)
        {
            $getQrcode = QrcodeModel::where('id',$qrcode->id)->first();
            // check if request expect json
            if($request->expectsJson()){

               return response([

                   'data' => new QrcodeResource($getQrcode)

               ], Response::HTTP_CREATED);


               // return new  QrcodeResourceCollection($getQrcode);
                //return new QrcodeResource($getQrcode);
            }

            //Save  data to the database
           // $qrcode = $this->qrcodeRepository->create($input);

            Flash::success('Qrcode saved successfully.');

        }else{

            Flash::error('Qrcode failed to save.');

        }

        return redirect(route('qrcodes.show',['qrcode'=>$qrcode]));
        //        return redirect()->route('qrcodes.show', ['qrcode' => $qrcode]);


    }

    /**
     * Display the specified Qrcode.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        $qrcode = $this->qrcodeRepository->findWithoutFail($id);

        if (empty($qrcode)) {

            //Throw an exception
            if($request->expectsJson()){

                 throw new \ErrorException();
            }
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $trasanctions = $qrcode->trasanctions;


        if($request->expectsJson()){
            //Resource Collection 118
            //return new  QrcodeResourceCollection($qrcode );

            return response([

                'data' => new QrcodeResource($qrcode)

            ], Response::HTTP_OK);
            //return new QrcodeResourceCollection($qrcode);
        }

        return view('qrcodes.show')
            ->with('qrcode', $qrcode)
            ->with('trasanctions', $trasanctions,$qrcode );
    }

    /**
     * Show the form for editing the specified Qrcode.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $qrcode = $this->qrcodeRepository->findWithoutFail($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.edit')->with('qrcode', $qrcode);
    }

    /**
     * Update the specified Qrcode in storage.
     *
     * @param  int              $id
     * @param UpdateQrcodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQrcodeRequest $request)
    {
        $qrcode = $this->qrcodeRepository->findWithoutFail($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

       $qrcode = $this->qrcodeRepository->update($request->all(), $id);

        //Generate qrcode
        //save  qrcode image in our folder on this site

        $file = 'qrcodes-generator/'.$qrcode->id.'.png';

        QRCode::text("message")
            ->setSize(8)
            ->setMargin(2)
            ->setOutfile($file)
            ->png();

        $input['qrcode_path'] = $file;

        //dd($input['qrcode_path']);

        //updating database
        $newQrcode = QrcodeModel::where('id',$qrcode->id)
            ->update([
                'qrcode_path' => $input['qrcode_path']

            ]);

        $getQrcode = QrcodeModel::where('id',$qrcode->id)->first();

        // check if request expect json
        if($request->expectsJson()){

            return response([

                'data' => new QrcodeResource($qrcode)

            ], Response::HTTP_CREATED);

            //return new QrcodeResource($getQrcode);
            //return new QrcodeResourceCollection($qrcode);
        }



        Flash::success('Qrcode updated successfully.');

        return redirect(route('qrcodes.show',['$qrcode' =>$qrcode]));
    }

    /**
     * Remove the specified Qrcode from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $qrcode = $this->qrcodeRepository->findWithoutFail($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $this->qrcodeRepository->delete($id);

        if($request->expectsJson())
        {
            //return response(null);
            return response([

                'message' => 'Qrcode deleted successfully'

            ], Response::HTTP_NOT_FOUND);

        }

        Flash::success('Qrcode deleted successfully.');

        return redirect(route('qrcodes.index'));
    }

    public function  show_payment_page(Request $request)
    {
        /*
         * Receive the buyer email
         * Retrive user id using the buyer email
         * Initiate tranbsaction
         * Redirect to paystack payment page
         * */

        $input = $request->all();

        //Get rge user with this email
         $user = User::where('email', $input['email'])->first();

        //User doesnt exist
         if(empty($user))
         {
             //create user account

             $user = User::create([
                 'name'         => $input['email'],
                 'email'        => $input['email'],
                 'password'     => Hash::make($input['email']),
             ]);

             //$user->id;
         }

         //get the qrcode details
         $qrcode =QrcodeModel::where('id', $input['qrcode_id'])->first();
         $transaction = Trasanction::create([
             'user_id'      =>  $user->id,
             'qrcode_id'    =>  $qrcode->id,
             'status'=>'initiated',
             'qrcode_owner_id'=> $qrcode->user_id,
             'payment_method'=>'paystack/card',
             'amount'=>$qrcode->amount

         ]);
          //$buyer_id = $user->id;
          return view('qrcodes.paystack',['qrcode'=>$qrcode, 'transaction'=>$transaction, 'user'=> $user]);
    }
}
// 1
//return new QrcodeResourceCollection($qrcodes);

// check if request expect json
//https://laravel.com/api/5.3/Illuminate/Http/Request.html


//2

//Resource Collection 118
// return  QrcodeResourceCollection::collection($qrcodes);
//return new QrcodeResourceCollection($qrcodes);
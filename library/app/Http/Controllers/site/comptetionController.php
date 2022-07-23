<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\answer;
use App\Models\comptetion;
use App\Models\user_rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class comptetionController extends Controller
{



    function __construct()
    {
        $comptetions = comptetion::all();
        foreach($comptetions as $comptetion)
        {
          if(strtotime($comptetion->end_date) - strtotime($comptetion->start_date)  <= 0 )

          $comptetion->status =  2 ;
          $comptetion->save();
         } ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
           $comptetions =  comptetion::all();
           $activeComptetions = [];
           foreach($comptetions as $comptetion)
           {
             if(strtotime($comptetion->end_date) - strtotime($comptetion->start_date)  > 0)
               array_push($activeComptetions , $comptetion);
            } ;

           return view("site.events" , compact("activeComptetions"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("site.comptetion.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //  return $request->all();
        $comptetionDetails = json_decode($request->comptetionDetails);
   $comptetion =      Auth::user()->comptetions()->create(
            [
                "title"=>$request->title,
                "description"=>$request->description,
                "start_date"=>$request->start_date,
                "end_date"=>$request->end_date,
            ]
            );
            // return $comptetion;
         foreach($comptetionDetails as $comptetionDetail){
            // return $comptetionDetail->answers;
           $question =  $comptetion->questions()->create(
                [
                    "question"=>$comptetionDetail->question
                ]
                );

                foreach($comptetionDetail->answers as $answer){
                $correct =  $answer->index == $comptetionDetail->correct ? 1 :0;
                   $answer =  $question->answers()->create(
                        [
                            "answer"=>$answer->answer ,
                            "correct"=>$correct
                        ]
                        );
                }
         }


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comptetion  $comptetion
     * @return \Illuminate\Http\Response
     */
    public function show(comptetion $comptetion)
    {

        if(checkComptetionAttendance($comptetion->id))
        return redirect()->back();
        user_rank::create(
            [
                "user_id"=>Auth::user()->id,
                "rank"=>0,
                "comptetion_id"=>$comptetion->id
            ]
            );

      return view('site.comptetion.show' , compact("comptetion"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comptetion  $comptetion
     * @return \Illuminate\Http\Response
     */
    public function edit(comptetion $comptetion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comptetion  $comptetion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comptetion $comptetion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comptetion  $comptetion
     * @return \Illuminate\Http\Response
     */
    public function destroy(comptetion $comptetion)
    {
        //
    }

public function submitAnswers(){
    // return request()->all();
    $userAnswers = json_decode(request()->answers);
   $rank = 0;

   foreach($userAnswers as $userAnswer){
    $answer = answer::find($userAnswer->answer);
// echo $answer."<br>";
    if($answer->correct == 1 )
    $rank++;



   }

$user_rank = user_rank::where("user_id", auth()->user()->id)->where("comptetion_id",request()->comptetion)->first();
$user_rank = user_rank::find($user_rank->id);
$user_rank->update([
    "rank"=>$rank
]);
return redirect("/comptetion/")->with("rank" , "your total mark is ".$rank);
}



public function rank(comptetion $comptetion){

$ranks =  user_rank::where("comptetion_id" , $comptetion->id)->orderBy('rank', 'DESC')->get();


return view("site.comptetion.rank" , compact("ranks"));


}


public function view(comptetion $comptetion){
  if(auth()->user()->id == $comptetion->user_id)
    return view("site.comptetion.view" , compact("comptetion"));
    return redirect()->back();
}


public function deactive(comptetion $comptetion){
  if(auth()->user()->id == $comptetion->user_id)
   {
    $comptetion->status = 2;
    $comptetion->save();
   }
    return redirect()->back();}



public function delete(comptetion $comptetion){
  if(auth()->user()->id == $comptetion->user_id)
   {
    $comptetion->delete();
   }
    return redirect()->back();}
}

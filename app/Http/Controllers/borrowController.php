<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
//use App\Http\Requests\StoreBorrowRequest;
//use App\Http\Requests\UpdateBorrowRequest;g
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class BorrowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      
          }
  
    
    public function index()
    {
        $userRole =Auth::user()->is_librarian;
        $date = now()->format('Y-m-d');
      //  $statusList = array("PENDING", "ACCEPTED", "REJECTED", "RETURNED");
        if (!Auth::user()->is_librarian)
           {
           
            $pendingList = DB::table('borrows')
            ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
             ->join('books', 'borrows.book_id', '=','books.id' )
             ->where([["borrows.reader_id", "=", Auth::user()->id],["status", "=", "PENDING"]])
             ->get();

        $acceptedInTime = DB::table('borrows')
        ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
        ->join('books', 'borrows.book_id', '=','books.id' )
        ->where([["borrows.reader_id", "=",  Auth::user()->id],["status", "=", "ACCEPTED"],["borrows.deadline", "<=", $date]])
        ->get();
                         
       $acceptedLate =DB::table('borrows')
       ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
        ->join('books', 'borrows.book_id', '=','books.id' )
        ->where([["borrows.reader_id", "=",  Auth::user()->id],["borrows.status", "=", "ACCEPTED"],["borrows.deadline", ">", $date]])
        ->get();
       $rejected = DB::table('borrows')
       ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
        ->join('books', 'borrows.book_id', '=','books.id' )
        ->where([["borrows.reader_id", "=",  Auth::user()->id],["borrows.status", "=", "REJECTED"]])
        ->get();
       $returned = DB::table('borrows')
       ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
        ->join('books', 'borrows.book_id', '=','books.id' )
        ->where([["borrows.reader_id", "=", Auth::user()->id],["borrows.status", "=", "RETURNED"]])
        ->get();
      
           }
                else
                {

                    $pendingList = DB::table('borrows')
                    ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
                     ->join('books', 'borrows.book_id', '=','books.id' )
                     ->where([["status", "=", "PENDING"]])
                     ->get();


                $acceptedInTime = DB::table('borrows')
                ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
                 ->join('books', 'borrows.book_id', '=','books.id' )
                 ->where([["borrows.status", "=", "ACCEPTED"],["deadline", ">", $date]])
                 ->get();
                 
                $acceptedLate =DB::table('borrows')
                ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
                ->join('books', 'borrows.book_id', '=','books.id' )
                ->where([["borrows.status", "=", "ACCEPTED"],["borrows.deadline", "<=", $date]])
                ->get();

                $rejected = DB::table('borrows')
                ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
                ->join('books', 'borrows.book_id', '=','books.id' )
                ->where([["borrows.status", "=", "REJECTED"]])
                ->get();

                $returned = DB::table('borrows')
                ->select(DB::raw('books.author as book_author'), DB::raw('books.title as book_title'), 'borrows.deadline','borrows.id','borrows.created_at')
                ->join('books', 'borrows.book_id', '=','books.id' )
                ->where([["borrows.status", "=", "RETURNED"]])
                ->get();
                }
        return view('borrow.index')->with('pendingList',$pendingList)
                            ->with('acceptedInTime',$acceptedInTime)
                            ->with('acceptedLate',$acceptedLate)
                            ->with('returned',$returned)
                            ->with('userRole',$userRole)
                            ->with('rejected',$rejected);
    }

    
    

    
    public function store(Request $request)
    { 
   
        $book = Book::where('id',$request['book_id'])->get();

        $borrow = Borrow::create([
            'reader_id' =>Auth::user()->id,
            'book_id' => $request['book_id'],
            'status' =>'PENDING',
        ]);
        $borrow->save();
        
        $isBorrwedByUser = Borrow::where(['reader_id'=> Auth::user()->id ,
                    'book_id' =>$request['book_id']])->exists();
                    $nbAvailablebooks = $request['in_stock'] - Borrow::where('book_id', $request['book_id'])->where(function ($query) {
                        $query->where('status', '=', 'pending')
                              ->orWhere('status', '=', 'accepted')
                              ->orWhere('status', '=', 'rejected');
                    })->count();
       
       
        return redirect('book/'.$request['book_id'].'/show')->with('nbAvailablebooks',$nbAvailablebooks)->with('book',$book)->with('isBorrwedByUser',$isBorrwedByUser)->with('success','Request sent');
        //$book-> genres() ->sync($request->genres, false);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $bor= DB::table('borrows')
        ->select('users.name','books.title','books.author','books.released_at',
        'borrows.created_at','borrows.status', 'borrows.request_processed_at','borrows.request_managed_by','borrows.returned_at','books.id','borrows.return_managed_by')
         ->join('books', 'borrows.book_id', '=','books.id' )

         ->join('users', 'borrows.reader_id', '=','users.id' )
         ->where('borrows.id',$id)
         ->get();
        return view('borrow.show',['bor' => $bor]);
                    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow= Borrow::find($id);
        
        return view('borrow.edit',['borrow'=>$borrow]);
    }


   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function update( $id, Request $request) {
           $date = now()->format('Y-m-d');

           $borrow = Borrow::find( $id);
           $borrow->deadline = $request->deadline;
           $borrow->status = $request->status;

        if ($request->status != "RETURNED" ){
            $borrow->request_processed_at =  $date ;
            $borrow->request_managed_by =  Auth::user()->id ;
        }
       else {
        $borrow->returned_at =  $date ;
        $borrow->return_managed_by =  Auth::user()->id ;
       }

        $borrow->save();

       
        // dd($validated_data);
        // $book->update($request->validated());
        return redirect('borrow')->with('bor',$borrow)
                    ;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
   


}

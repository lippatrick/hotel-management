<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()){
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'admin'){
                return view('admin.index');
            }
            else if ($usertype == 'user'){
                $room = Room::all();
                $gallery = Gallery::all();
                return view('home.index', compact('room','gallery'));
            } 
            else {
                return redirect()->back();
            }
        }
    }
    public function home (){

        $room = Room::all();
        $gallery = Gallery::all();
        return view('home.index', compact('room','gallery'));
    }


    public function create_room (){
        return view('admin.create_room');
    }

    public function add_room(Request $request){
        
        $data = new Room;

        $data->room_title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->wifi = $request->wifi;

        $data->room_type = $request->type;

        $image = $request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back();
    }
    public function view_room(){
        $data = Room::all();
        return view('/admin.view_room', compact('data'));
    }
    public function delete_room($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_room($id)
    {
        $data=Room::find($id);
        return view('/admin.update_room', compact('data'));
    }

    public function edit_room(Request $request, $id){
        $data = Room::find($id);

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        $image = $request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('message', 'Room Updated!!');
    }

    public function bookings()
    {
        $data=Booking::all();
        return view('admin.booking',compact('data'));
    }

    public function delete_booking($id){
        $data=Booking::find($id);
        $data->delete();
        
        return redirect()->back();

    }
    
    public function approve_book($id)
    {
        $booking = BooKing::find($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back();

    }

        public function decline_book($id)
    {
        $booking = BooKing::find($id);
        $booking->status = 'declined';
        $booking->save();

        return redirect()->back();

    }

    public function view_gallery()
    {
        $gallery=Gallery::all();
        return view('admin.gallery',compact('gallery'));
    }

    // public function upload_gallery(Request $request){
    //     $data = new Gallery();
    //     $image = $request->image;
    //     if ($image){
    //         $imagename=time().'.'.$image->getClientOriginalExtension();
    //         $request->image->move('gallery', $imagename);
    //         $data->image=$imagename;

    //         $data->save();
    //         return redirect()->back();
    //     }
        
    // }

    public function upload_gallery(Request $request)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $data = new Gallery();

                $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('gallery'), $imagename);

                $data->image = $imagename;
                $data->save();
            }

            return redirect()->back()->with('message', 'Images uploaded successfully!');
        }

        return redirect()->back()->with('message', 'No images selected!');
    }

    public function delete_gallery($id){
        $data = Gallery::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function all_messages(){
        $data= Contact::all();
        return view('admin.all_messages',compact('data'));
    }

    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    public function mail(Request $request, $id){

        $data = Contact::find($id);
        $details = [

            'greeting' => $request->greeting ,

            'body' => $request->body ,

            'action_text' => $request->action_text ,

            'action_url' => $request->action_url ,

            'endline' => $request->endline ,

        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email sent successfully!');

    }

}

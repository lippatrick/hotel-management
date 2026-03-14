<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('home.css')
      <style>
         .our_room {
            padding: 90px 0;
            background: #f8f9fb;
         }

         .titlepage h2 {
            font-size: 42px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
         }

         .titlepage p {
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 10px;
         }

         .room {
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 14px 40px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
         }

         .room:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
         }

         .room_img {
            background: #eef2f7;
            padding: 18px;
         }

         .room_img figure {
            margin: 0;
            overflow: hidden;
            border-radius: 16px;
         }

         .room_img img {
            width: 100% !important;
            height: 300px !important;
            object-fit: cover;
            display: block;
         }

         .bed_room {
            padding: 28px 24px 24px;
         }

         .bed_room h3 {
            font-size: 28px;
            line-height: 1.2;
            font-weight: 700;
            color: #111827;
            margin-bottom: 16px;
         }

         .bed_room p {
            font-size: 15px;
            line-height: 1.9;
            color: #6b7280;
            margin-bottom: 22px;
         }

         .bed_room h4 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            font-size: 15px;
            font-weight: 600;
            color: #1f2937;
            padding: 14px 0;
            margin: 0;
            border-top: 1px solid #edf2f7;
         }

         .bed_room h4:last-child {
            border-bottom: 1px solid #edf2f7;
            margin-bottom: 0;
         }

         .booking-col h2 {
            font-size: 30px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 22px;
         }

         .booking-col form {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            box-shadow: 0 14px 40px rgba(15, 23, 42, 0.08);
            padding: 28px 24px;
         }

         .booking-col form > div {
            margin-bottom: 18px;
         }

         .booking-col form > div:last-child {
            margin-bottom: 0;
         }

         .booking-col form label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
         }

         .booking-col form input[type="text"],
         .booking-col form input[type="email"],
         .booking-col form input[type="number"],
         .booking-col form input[type="date"] {
            width: 100%;
            height: 52px;
            border: 1px solid #dbe3ec;
            border-radius: 14px;
            background: #f8fafc;
            padding: 0 16px;
            font-size: 15px;
            color: #111827;
            outline: none;
            transition: all 0.2s ease;
         }

         .booking-col form input[type="text"]:focus,
         .booking-col form input[type="email"]:focus,
         .booking-col form input[type="number"]:focus,
         .booking-col form input[type="date"]:focus {
            border-color: #0d6efd;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.10);
         }

         .booking-col form input[type="submit"] {
            width: 100%;
            min-height: 54px;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.01em;
            box-shadow: 0 12px 24px rgba(13, 110, 253, 0.18);
         }

         .booking-col form input[type="submit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 28px rgba(13, 110, 253, 0.22);
         }

         .booking-errors {
            margin: 0 0 18px;
            padding: 0;
         }

         .booking-errors li {
            list-style: none;
            background: rgba(220, 38, 38, 0.08);
            color: #dc2626 !important;
            border: 1px solid rgba(220, 38, 38, 0.18);
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 500;
         }

         @media (max-width: 991px) {
            .titlepage h2 {
               font-size: 34px;
            }

            .room_img img {
               height: 250px !important;
            }

            .bed_room {
               padding: 22px 18px 20px;
            }

            .bed_room h3 {
               font-size: 24px;
            }

            .booking-col h2 {
               margin-top: 26px;
               font-size: 26px;
            }
         }
      </style>
   </head>
   <body class="main-layout">
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      
      <header>
         @include('home.header')
      </header>
     
      <div class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row g-4 align-items-start">
               <div class="col-lg-7 col-md-12">
                  <div id="serv_hover" class="room">
                     <div class="room_img">
                        <figure><img style="height: 200px; width: 350px" src="/room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p>{{$room->description}}</p>
                        <h4>Free Wifi : {{$room->wifi}}</h4>
                        <h4>Room Type: {{$room->room_type}}</h4>
                        <h4>Price : {{$room->price}}</h4>
                     </div>
                  </div>
               </div>

               <div class="col-lg-5 col-md-12 booking-col">
                  <h2>Book Room</h2>
                 
                  @if(session('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="fixed top-5 right-5 w-80 overflow-hidden rounded-lg border border-green-300 bg-white text-green-700 shadow-lg">
                        <div class="px-4 py-3 font-medium">
                            {{ session('message') }}
                        </div>
                        <div class="h-1 bg-gray-200">
                            <div class="h-1 w-full bg-green-700 animate-[shrink_4s_linear_forwards]"></div>
                        </div>
                    </div>
                @endif

                <style>
                @keyframes shrink {
                    from { width: 100%; }
                    to { width: 0; }
                }
                </style>

                  @if($errors)
                     <ul class="booking-errors">
                        @foreach($errors->all() as $errors)
                           <li>{{$errors}}</li>
                        @endforeach
                     </ul>
                  @endif

                  <form action="{{url('add_booking',$room->id)}}" method="POST">
                     @csrf
                     <div>
                        <label for="">Name</label>
                        <input type="text" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif>
                     </div>
                     <div>
                        <label for="">Email</label>
                        <input type="email" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif>
                     </div>
                     <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif>
                     </div>
                     <div>
                        <label for="">Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                     </div>
                     <div>
                        <label for="">End Date</label>
                        <input type="date" name="endDate" id="endDate">
                     </div>
                     <div>
                        <input type="submit" class="btn btn-primary" value="Book Room">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      @include('home.footer')
      
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>

      <script type="text/javascript">
         $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if(month < 10) {
               month = '0' + month.toString();
            }

            if(day < 10) {
               day = '0' + day.toString();
            }

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
         });
      </script>
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
   </body>
</html>
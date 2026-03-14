<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      .page-header {
        padding: 28px 0;
      }

      .rooms-table-scroll {
        width: 100%;
        overflow-x: auto;
        background: #ffffff;
        border-radius: 16px;
        padding: 16px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        border: 1px solid #e5e7eb;
      }

      .table_deg {
        width: 100%;
        min-width: 1100px;
        border-collapse: collapse;
        background: #ffffff;
        overflow: hidden;
        border-radius: 12px;
      }

      .table_deg th {
        background: #f8fafc;
        color: #111827;
        font-size: 14px;
        font-weight: 700;
        padding: 14px 12px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
      }

      .table_deg td {
        padding: 10px 8px;
        font-size: 14px;
        color: #374151;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        white-space: nowrap;
      }

      .table_deg tr:hover td {
        background: #f9fafb;
      }

      .table_deg img {
        width: 65px;
        height: 50px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
      }

      .btn.btn-warning {
        background: #f59e0b;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
      }

      .btn.btn-warning:hover {
        background: #d97706;
        color: #ffffff;
        text-decoration: none;
      }

      @media (max-width: 768px) {
        .rooms-table-scroll {
          padding: 12px;
        }

        .table_deg th,
        .table_deg td {
          padding: 12px 10px;
          font-size: 13px;
        }

        .table_deg img {
          width: 58px;
          height: 44px;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


            <div class="rooms-table-scroll">
                  <table class="table_deg">
                    <tr>
                        <th>Room ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Arrival Date</th>
                        <th>Departure Date</th>
                        <th>Room Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status Update</th>
    
                    </tr>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->room_id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>
                            @if($data->status == 'approved')
                                <span style="color: skyblue;">Approved</span>
                            @endif

                            @if($data->status == 'declined')
                                <span style="color: red;">Declined</span>
                            @endif

                            @if($data->status == 'Waiting')
                                <span style="color: yellow;">Waiting</span>
                            @endif
                        </td>
                        <td>{{$data->start_date}}</td>
                        <td>{{$data->End_date}}</td>
                        <td>{{$data->room->room_title}}</td>
                        <td>{{$data->room->price}}</td>
                        <td>
                            <img width="60" src="room/{{$data->room->image}}">
                        </td>
                        
                        <td>
                            <a onclick="return confirm('Are you sure to Delete?');" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('approve_book',$data->id)}}">Approved</a>
                            <a class="btn btn-warning" href="{{url('decline_book',$data->id)}}">Declined</a>
                        </td>
                    </tr>
                    @endforeach
                  </table>
                </div>


            </div>
                </div>
                    </div>
        @include('admin.footer')
  </body>
</html>
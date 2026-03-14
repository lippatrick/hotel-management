<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
      .page-content {
        width: 100%;
      }

      .rooms-table-wrap {
        margin-top: 24px;
      }

      .rooms-table-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid rgba(148, 163, 184, 0.18);
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        overflow: hidden;
      }

      .rooms-table-header {
        padding: 24px 28px 18px;
        border-bottom: 1px solid #e2e8f0;
      }

      .rooms-table-title {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #0f172a;
      }

      .rooms-table-subtitle {
        margin: 8px 0 0;
        font-size: 14px;
        color: #64748b;
      }

      .rooms-table-scroll {
        width: 100%;
        overflow-x: auto;
      }

      .table_deg {
        width: 100%;
        min-width: 900px;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
        background: #ffffff;
      }

      .table_deg thead th,
      .table_deg tr:first-child th {
        background: #0f172a;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        padding: 18px 20px;
        border: none;
        white-space: nowrap;
      }

      .table_deg tr:first-child th:first-child {
        border-top-left-radius: 0;
      }

      .table_deg tr:first-child th:last-child {
        border-top-right-radius: 0;
      }

      .table_deg td {
        padding: 18px 20px;
        font-size: 14px;
        color: #334155;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
        background: #ffffff;
      }

      .table_deg tr:not(:first-child):hover td {
        background: #f8fafc;
      }

      .table_deg tr:last-child td {
        border-bottom: none;
      }

      .table_deg th:nth-child(1),
      .table_deg td:nth-child(1) {
        min-width: 160px;
      }

      .table_deg th:nth-child(2),
      .table_deg td:nth-child(2) {
        min-width: 280px;
      }

      .table_deg th:nth-child(3),
      .table_deg td:nth-child(3),
      .table_deg th:nth-child(4),
      .table_deg td:nth-child(4),
      .table_deg th:nth-child(5),
      .table_deg td:nth-child(5) {
        min-width: 120px;
      }

      .table_deg th:nth-child(6),
      .table_deg td:nth-child(6) {
        min-width: 150px;
      }

      .table-empty {
        text-align: center;
        padding: 40px 20px;
        color: #94a3b8;
        font-weight: 500;
      }

      @media (max-width: 767px) {
        .rooms-table-header {
          padding: 20px 18px 16px;
        }

        .rooms-table-title {
          font-size: 22px;
        }

        .table_deg thead th,
        .table_deg tr:first-child th,
        .table_deg td {
          padding: 14px 16px;
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

            <div class="rooms-table-wrap">
              <div class="rooms-table-card">
                <div class="rooms-table-header">
                  <h2 class="rooms-table-title">Room Listings</h2>
                  <p class="rooms-table-subtitle">Review and manage all created room entries from one place.</p>
                </div>

                <div class="rooms-table-scroll">
                  <table class="table_deg">
                    <tr>
                        <th>Room Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>WiFi</th>
                        <th>Room Type</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{!! Str::limit($data->description, 150)!!}</td>
                        <td>{{$data->price}}UGX</td>
                        <td>{{$data->wifi}}</td>
                        <td>{{$data->room_type}}</td>
                        <td>
                            <img width="60" src="room/{{$data->image}}">
                        </td> 
                        <td>
                            <a onclick= "return confirm('Do you want to Delete?')" class="btn btn-danger" href="{{url('delete_room', $data->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('update_room', $data->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      
      @include('admin.footer')
    </div>
  </body>
</html>
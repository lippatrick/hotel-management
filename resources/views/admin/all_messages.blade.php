<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      .page-header {
        padding: 30px 0;
      }

      .table_deg {
        width: 100%;
        border-collapse: collapse;
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
      }

      .table_deg th {
        background: #f8fafc;
        color: #111827;
        font-size: 14px;
        font-weight: 700;
        text-align: left;
        padding: 16px 18px;
        border-bottom: 1px solid #e5e7eb;
      }

      .table_deg td {
        padding: 16px 18px;
        font-size: 14px;
        color: #374151;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: top;
      }

      .table_deg tr:hover td {
        background: #f9fafb;
      }

      .btn.btn-success {
        background: #16a34a;
        border: none;
        color: #ffffff;
        border-radius: 8px;
        padding: 9px 16px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s ease;
      }

      .btn.btn-success:hover {
        background: #15803d;
        color: #ffffff;
        text-decoration: none;
      }

      @media (max-width: 991px) {
        .container-fluid {
          overflow-x: auto;
        }

        .table_deg {
          min-width: 900px;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      
      @include('admin.sidebar')
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table class="table_deg">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Send Email</th>
                        
                    </tr>

                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->message}}</td>
                         
                        <td>
                            <a class="btn btn-success" href="{{url('send_mail',$data->id)}}">reply..</a>
                        </td>
                    </tr>
                    @endforeach
                  </table>


         </div>
            </div>
                </div>


        @include('admin.footer')
  </body>
</html>
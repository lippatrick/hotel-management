<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style>
      .page-header {
        padding: 30px 0;
      }

      center h1 {
        font-size: 30px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 28px;
      }

      form {
        max-width: 820px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        text-align: left;
      }

      .room-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
      }

      .room-form-grid label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
      }

      .room-form-grid input[type="text"],
      .room-form-grid textarea {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        color: #111827;
        background: #ffffff;
        outline: none;
        transition: 0.2s ease;
      }

      .room-form-grid input[type="text"]:focus,
      .room-form-grid textarea:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
      }

      .room-form-grid textarea {
        min-height: 140px;
        resize: vertical;
      }

      .room-form-full {
        grid-column: 1 / -1;
        padding-top: 6px;
      }

      .btn.btn-primary {
        background: #2563eb;
        border: none;
        color: #ffffff;
        border-radius: 10px;
        padding: 12px 22px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s ease;
      }

      .btn.btn-primary:hover {
        background: #1d4ed8;
        color: #ffffff;
      }

      @media (max-width: 768px) {
        form {
          padding: 20px;
        }

        .room-form-grid {
          grid-template-columns: 1fr;
        }

        center h1 {
          font-size: 24px;
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

          <center>
            <div>
            <h1>Mail send to {{$data->name}}</h1>

            <form action="{{url('mail',$data->id)}}" method="POST" >
                    @csrf
                  <div class="room-form-grid">
                    <div>
                      <label for=""> Greeting </label>
                      <input type="text" name="greeting">
                    </div>
                    <div>
                      <label for="">Body</label>
                      <textarea name="body" id=""></textarea>
                    </div>
                    
                    <div>
                      <label for=""> Action Text </label>
                      <input type="text" name="action_text">
                    </div>
                    <div>
                      <label for=""> Action URL </label>
                      <input type="text" name="action_url">
                    </div>
                    <div>
                      <label for=""> End Line </label>
                      <input type="text" name="end_line">
                    </div>
                   
                    
                    <div class="room-form-full">
                      <input type="submit" class="btn btn-primary" value="Send Mail">
                    </div>
                  </div>
                </form>
                </div>
          </center>

        </div>
            </div>
                </div>
      
        @include('admin.footer')
  </body>
</html>
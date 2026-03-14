<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
      .page-content {
        width: 100%;
      }

      .room-form-wrap {
        width: 100%;
        max-width: 1180px;
        margin: 20px auto 0;
      }

      .room-form-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 34px 32px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        border: 1px solid rgba(148, 163, 184, 0.18);
      }

      .room-form-title {
        margin: 0 0 8px;
        font-size: 28px;
        line-height: 1.2;
        font-weight: 700;
        color: #0f172a;
      }

      .room-form-subtitle {
        margin: 0 0 28px;
        font-size: 14px;
        color: #64748b;
      }

      .room-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px 24px;
      }

      .room-form-grid > div {
        margin-bottom: 0;
      }

      .room-form-full {
        grid-column: 1 / -1;
      }

      .room-form-card label {
        display: block;
        margin-bottom: 9px;
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
      }

      .room-form-card input[type="text"],
      .room-form-card input[type="number"],
      .room-form-card input[type="file"],
      .room-form-card select,
      .room-form-card textarea {
        width: 100%;
        border: 1px solid #dbe2ea;
        background: #f8fafc;
        color: #0f172a;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 15px;
        outline: none;
        transition: all 0.2s ease;
      }

      .room-form-card textarea {
        min-height: 160px;
        resize: vertical;
      }

      .room-form-card input[type="text"]:focus,
      .room-form-card input[type="number"]:focus,
      .room-form-card input[type="file"]:focus,
      .room-form-card select:focus,
      .room-form-card textarea:focus {
        border-color: #4f46e5;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
      }

      .room-form-card input[type="file"] {
        padding: 12px 14px;
        background: #fff;
      }

      .room-form-card input[type="submit"] {
        min-width: 180px;
        padding: 13px 24px;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.2);
      }

      .room-form-card input[type="submit"]:hover {
        transform: translateY(-1px);
        box-shadow: 0 14px 28px rgba(37, 99, 235, 0.24);
      }

      @media (max-width: 991px) {
        .room-form-grid {
          grid-template-columns: 1fr;
        }

        .room-form-full {
          grid-column: auto;
        }
      }

      @media (max-width: 767px) {
        .room-form-card {
          padding: 24px 18px;
          border-radius: 14px;
        }

        .room-form-title {
          font-size: 22px;
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
            <div class="room-form-wrap">
              <div class="room-form-card">
                <h2 class="room-form-title">Add New Room</h2>
                <p class="room-form-subtitle">Fill in the details below to create a new room listing.</p>
                <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="room-form-grid">
                    <div>
                      <label for=""> Room Title </label>
                      <input type="text" name="title">
                    </div>
                    <div>
                      <label for="">Price</label>
                      <input type="number" name="price">
                    </div>
                    <div>
                      <label for="">Room Type</label>
                      <select name="type" id="">
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                      </select>
                    </div>
                    <div>
                      <label for="">WiFi</label>
                      <select name="wifi" id="">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                    <div class="room-form-full">
                      <label for="">Description</label>
                      <textarea name="description" id=""></textarea>
                    </div>
                    <div class="room-form-full">
                      <label for="">Upload Image</label>
                      <input type="file" name="image">
                    </div>
                    <div class="room-form-full">
                      <input type="submit" class="btn btn-primary" value="Add Room">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>
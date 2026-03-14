<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      .page-header {
        padding: 28px 0;
      }

      .gallery-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        box-shadow: 0 14px 35px rgba(15, 23, 42, 0.08);
        padding: 24px;
      }

      .gallery-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 24px;
      }

      .gallery-title h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 700;
        color: #111827;
      }

      .gallery-title p {
        margin: 8px 0 0;
        font-size: 14px;
        color: #6b7280;
      }

      .upload-box {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 12px 14px;
      }

      .upload-box label {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        white-space: nowrap;
      }

      .upload-box input[type="file"] {
        font-size: 13px;
        color: #374151;
      }

      .upload-box input[type="submit"] {
        background: #f59e0b;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
      }

      .upload-box input[type="submit"]:hover {
        background: #d97706;
      }

      .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 0;
      }

      .column {
        width: calc(33.333% - 14px);
      }

      .gallery-item {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
      }

      .gallery-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 30px rgba(15, 23, 42, 0.1);
      }

      .gallery-item img {
        width: 100%;
        height: 240px !important;
        object-fit: cover;
        display: block;
      }

      .gallery-item-body {
        padding: 14px 16px;
        text-align: left;
      }

      .gallery-item-body h4 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: #111827;
      }

      .gallery-item-body p {
        margin: 6px 0 0;
        font-size: 13px;
        color: #6b7280;
      }

      @media (max-width: 991px) {
        .column {
          width: calc(50% - 10px);
        }
      }

      @media (max-width: 767px) {
        .gallery-card {
          padding: 18px;
        }

        .gallery-topbar {
          flex-direction: column;
          align-items: stretch;
        }

        .upload-box {
          flex-direction: column;
          align-items: stretch;
        }

        .column {
          width: 100%;
        }

        .gallery-item img {
          height: 220px !important;
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

            <div class="gallery-card">
              <form action="{{url('upload_gallery')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="gallery-topbar">
                  <div class="gallery-title">
                    <h1>Gallery Upload</h1>
                    <p>Upload and manage your gallery images in a clean professional layout.</p>
                  </div>

                  <div class="upload-box">
                    <label for="">Upload Image</label>
                    <input type="file" name="image[]" multiple>
                    <input type="submit" name="image" value="Upload Image">
                  </div>
                </div>

                <div class="row">

                  @foreach($gallery as $gallery)

                  <div class="column">
                    <div class="gallery-item">
                      <img style="height: 200px!important; width: 300;" src="/gallery/{{$gallery->image}}">
                      <div class="gallery-item-body">
                        <a class="btn btn-danger" href="{{url('delete_gallery',$gallery->id)}}">Delete Image</a>
                      </div>
                    </div>
                  </div>

                  @endforeach

                </div>
              </form>
            </div>

        </div>
            </div>
                </div>

     
        @include('admin.footer')
  </body>
</html>
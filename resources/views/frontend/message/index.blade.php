@extends('frontend.main')

@section('content')


  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('{{asset('frontend/assets/img/blog1.jpg')}}');">
    <div class="container">
      <div class="banner-title">
        <h2>আমাদের সাথে <span>যোগাযোগ</span> করুন</h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i><span>যোগাযোগ</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Contact Area Starts -->
  <section class="contact-area">
    <div class="container">
      <div class="contact-form">
        <div class="sm-title post_category_title">
          <h2>যোগাযোগের জন্য <span>ফরম</span></h2>
        </div>
        <form action="{{route('web-message-store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="formName" class="form-label">আপনার নাম *</label>
                <input type="text" name="name" class="form-control" id="formName" placeholder="নাম" required>
              </div>
              <div class="mb-3">
                <label for="formEmail" class="form-label">আপনার ইমেইল *</label>
                <input type="email" name="email" class="form-control" id="formEmail" placeholder="ইমেইল" required>
              </div>
              <div class="mb-3">
                <label for="formPhoneNumber" class="form-label">আপনার মোবাইল নাম্বার *</label>
                <input type="number" class="form-control" name="phone" id="formPhoneNumber" placeholder="মোবাইল নং" required>
              </div>

              <div class="mb-3">
                <label for="formPhoto" class="form-label">আপনার ছবি প্রদান করুন</label>
                <input type="file" class="form-control" name="image" id="formPhoto">
              </div>

            </div>
            <div class="col-md-6">
            <div class="mb-3">
                <label for="formPhoneNumber" class="form-label">বিষয় *</label>
                <input type="text" class="form-control" name="subject" id="formPhoneNumber" placeholder="বিষয়" required>
              </div>
              <div class="mb-3">
                <label for="messageArea" class="form-label">আপনার বার্তা *</label>
                <textarea name="message" class="form-control" cols="5" rows="5" name="message" id="messageArea" placeholder="Your Message" required></textarea>

              </div>
            </div>
            <button type="submit" class="btn btn-box form-control">পাঠান</button>
          </div>
        </form>
      </div>
      <div class="contact-address">
        <div class="location-map row">
          <div class="address-map">

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7233.61712083656!2d92.02502489583436!3d24.97262718724188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37504c32740696e7%3A0x49f29068d5c045f5!2sUmonpur!5e0!3m2!1sen!2sbd!4v1667932623909!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>

        </div>
        <div class="sm-title post_category_title">
          <h2>যোগাযোগের <span>ঠিকানা</span></h2>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="single-address">
              <i class="fa-solid fa-location-dot"></i>
              <div class="adres-content">
                <h2>ঠিকানা</h2>
                <p>উমনপুর, চিকনাগুল, জৈন্তাপুর, সিলেট।</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-address">
              <i class="fa-solid fa-envelope"></i>
              <div class="adres-content">
                <h2>ইমেইল</h2>
                <p>umonpur@gmail.com</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-address">
              <i class="fa-solid fa-phone"></i>
              <div class="adres-content">
                <h2>যোগাযোগ নাম্বার</h2>
                <p>01687 838 161<br>01716 688 556<br>01739 113 605</p>
              </div>
            </div>
          </div>

        </div>




      </div>
    </div>
  </section>
  <!-- Contact Area Ends -->


@endsection
     
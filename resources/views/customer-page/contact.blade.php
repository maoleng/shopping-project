@extends('layout-customer.master')
@section('link_css')
    <link rel="stylesheet" href="{{asset('css/main-contact.css')}}" />
@endsection
@section('content')
    <div class="grid wide">
        <div class="row-grid contact-container">
            <div class="col l-6 m-6 c-12 fixed-contact">
                <p class="name-brand">{{$config[0]->value}}</p>
                <p class="Address">{{$config[2]->value}}</p>
                <div class="address-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6048147185684!2d106.65342651474886!3d10.764908992329342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eeb9ce402cf%3A0x68b1ae07f8eb2774!2zMTg0IMSQLiBMw6ogxJDhuqFpIEjDoG5oLCBQaMaw4budbmcgMTUsIFF14bqtbiAxMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1651586018688!5m2!1sen!2s"
                        width="100%"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
                <p class="phone-num">SĐT: {{$config[4]->value}}</p>
                <p class="email">Email: {{$config[3]->value}}</p>
            </div>
            <div class="col l-6 m-6 c-12 input-contact">
                <div class="input-contact-container">
                    <input
                        type="text"
                        class="input-item"
                        placeholder="Họ và tên"
                    />
                    <input
                        type="text"
                        class="input-item"
                        placeholder="Số điện thoại"
                    />
                    <input
                        type="text"
                        class="input-item"
                        placeholder="Địa chỉ"
                    />
                    <textarea
                        class="input-item messsage-input"
                        placeholder="Lời nhắn"
                    ></textarea>
                </div>
                <form action="">
                    <button class="btn-order btn-primary-order btn-send">
                        Gửi
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection

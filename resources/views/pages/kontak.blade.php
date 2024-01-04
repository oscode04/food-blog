@extends('layouts.main-layout')

@section('tittle')
    Food Blog - Kontak
@endsection

@section('content')
<section class="container">
    <h2 class="tittle">
      Punya <span> Kritik, Saran </span> atau mau
      <span> Request </span> Artikel?
    </h2>
    <h3>Ayo hubungi kami dengan mengisi form dibawah ini</h3>
    <form action="">
      <div class="mb-3">
        <input
          type="name"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="Nama"
        />
      </div>
      <div class="mb-3">
        <input
          type="email"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="name@example.com"
        />
      </div>
      <div class="mb-3">
        <textarea
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="3"
          placeholder="Pesan..."
        ></textarea>
      </div>
      <button class="send-msg" type="button">
        <a href="#">Kirim Pesan</a>
      </button>
    </form>
  </section>
  <section class="container mb-lg-5 mb-2 contact-container">
    <h1 class="kontak-lain">Atau kontak medsos kami</h1>
    <div class="instagram d-flex mt-1">
      <img src="../aset/icon/Instagram-dark.png" alt="" />
      <span class="ms-lg-1 mt-lg-1 mt-1 ps-2">AkunIg</span>
    </div>
    <div class="youtube d-flex mt-1">
      <img src="../aset/icon/YouTube-dark.png" alt="" />
      <span class="ms-lg-1 mt-lg-1 mt-1 ps-2">Channel YouTube</span>
    </div>
    <div class="whatsapp d-flex mt-1">
      <img src="../aset/icon/WhatsApp-dark.png" alt="" />
      <span class="ms-lg-1 mt-lg-1 mt-1 ps-2">0851-2092-9309</span>
    </div>
  </section>
@endsection
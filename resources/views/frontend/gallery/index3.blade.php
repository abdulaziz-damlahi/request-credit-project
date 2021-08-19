@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Start -->
    <section class="page-title-section"
             style="@if (isset($breadcrumb)) background-image: url('{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}');
             @else background-image: url('{{ asset('uploads/common_dummy/1920x750.jpg') }}');
             @endif">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Sıkça Sorulan Sorular</h3>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->



    <!-- Page content End -->
    <div class="container" style="padding-top: 100px;padding-bottom: 100px">
        <section class="two">
            <div class="container">
                <header>
                    <h2><strong>Esaslar ve Ek bilgiler</strong></h2>
                    <p>Firmamız bankalardan kredi alamayan müşterilerine kendi bünyesinde sözleşme usulü kredi ve finans
                        hizmeti sunmaktadır. Bu zamana kadar 40.000 bireysel müşteri, 20.000'i aşkın kurumsal firmalara
                        kredi hizmeti sunduk.
                    </p>

                </header>

                <div class="sayfa_ici">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <p style="
    font-weight: 500;
    color: black;
    font-size: 23px;
">Bireysel müşterilerimiz web sitemizden kredi başvurusu yaparak sonucunu e-posta adresinde görüntüleyebilir. Kredinizin
                                    onaylanması halinde, kredinizi ödeyememe durumunuza karşılık yapılan güvence
                                    sigortası bedelinizi sigorta departmanı hesabımıza yatırmanız halinde size en yakın
                                    ptt şubesine sözleşmeniz faks aracılığı ile gönderilir, krediniz dilediğiniz banka
                                    hesabınıza havale/eft olarak gönderilir.</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <h2>Güvence Sigorta Bedelleri</h2>
                                <ul>
                                    <li>5.000 TL 350 TL</li>
                                    <li>10.000 TL 488 TL</li>
                                    <li>15.000 TL 577 TL</li>
                                    <li>20.000 TL 653 TL</li>
                                    <li>30.000 TL 745 TL</li>
                                    <li>40.000 TL 950 TL</li>
                                    <li>50.000 TL 1128 TL</li>
                                    <li>60.000 TL 1365 TL</li>
                                    <li>70.000 TL 1511 TL</li>
                                    <li>80.000 TL 1731 TL</li>
                                    <li>90.000 TL 2171 TL</li>
                                    <li>100.000 TL 2431 TL</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <h2>150.000 TL ve üzeri kredi talepleriniz için lütfen iletişime geçiniz.</h2>
                                <p>21.02.2020 tarihi ile sigorta bedellerimiz güncellenmiştir. Krediyi ödeyememe
                                    durumunuza karşılık yapılan güvence sigortası bedeli olması sebebi ile özel finans
                                    firması olduğumuz için bankalar ve kuruluşları gibi krediden kesinti
                                    yapılmamaktadır.</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <h2>Elde edilen sigorta bedelleri ve faizler ile sizlere kredi hizmeti sunduğumuzu
                                    hatırlatmak isteriz.</h2>
                                <p><strong>Finans Departmanı <br> Saygılarımızla.</strong></p>


                                <strong style="
    font-size: 28px;
    color: #de0000;
"> Sakarya Caddesi Çankaya/Ankara
                                    Mersis No :858189/4124
                                    Vergi No: Ümraniye 8/24524094</strong>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- Page content End -->
@endsection

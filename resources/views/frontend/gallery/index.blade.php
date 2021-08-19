@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Start -->
    <section class="page-title-section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}');
    @else background-image: url('{{ asset('uploads/common_dummy/1920x750.jpg') }}');
    @endif">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Krediyi Nasıl Alırım?</h3>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->
    <div class="container" style="padding-top: 100px;padding-bottom: 100px">
        <div class="sayfa_ici">
            <p>İlk olarak başvuru kısımından kredi başvurunuzu sağlamalısınız.</p>
            <div class="row">
                <div class="col-6 col-12-mobile margin-auto">
                    <div class="form-group">
                        <h2>Başvuru sonucunuz mail adresinize iletilir.</h2>
                        <p>Başvurunuza istinaden krediniz onaylanır ise krediyi ödeyememe durumunuza karşılık yapılan güvence sigortası bedelinizi karşılamanız gerekir. </p>
                    </div>
                </div>
                <div class="col-6 col-12-mobile margin-auto">
                    <div class="form-group">
                        <div class="text-center">
                            <img src="https://onlineanindakredin.com/images/basvuru-sonucu-email.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-12-mobile margin-auto">
                    <div class="form-group">
                        <h2>Aynı gün kredinizi kullanabilirsiniz.</h2>
                        <p>Sigorta departmanı hesabımıza bedelinizi yatırmanız halinde size en yakın PTT şubesine sözleşmeniz faks olarak iletilir. </p>
                    </div>
                </div>
                <div class="col-6 col-12-mobile margin-auto">
                    <div class="form-group">
                        <div class="text-center">
                            <img src="https://onlineanindakredin.com/images/ayni-gun-kredi.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-12-mobile margin-auto">
                    <div class="form-group">
                        <h2>Sigorta bedelinizi tamamladıktan sonra süreç sözleşme kısmıdır.</h2>
                        <p>Sözleşmenizi teslim alıp, imzaladıktan sonra açık adresimize kargoladığınızı bildirmeniz ve firmamız personelleri tarafından teyit edildiği taktirde tarafımıza aktardığınız banka hesap numaranıza kredi miktarınız havale/eft aracılığı ile iletilir.</p>
                        <p>Sigorta bedellerini finans danışmanlarımızdan talep edebilir veya web sitemizde bulunan esaslar kısımından inceleyebilirsiniz.</p>
                        <p>Firmamız bankalardan bağımsız olup kendi bünyesinde sözleşme usulü kredi hizmeti vermektedir. Tüm işlemleriniz resmi web sitesi güvencesi altındadır. Ticaret odası kaydımız faal ve aktiftir.</p>
                    </div>
                </div>
                <div class="col-6 col-12-mobile margin-auto">
                    <div class="form-group">
                        <div class="text-center">
                            <img src="https://onlineanindakredin.com/images/sozlesme.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
<div class="container">
    <div id="accordion" style="padding-bottom: 100px;padding-top: 100px">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                        Online Aninda Kredin Nedir?
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    Online Aninda Kredin tarafından nakit ihtiyaçlarını şubeye gitmeden karşılayabileceğin bir ihtiyaç
                    kredisi ürünüdür.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                        Online Aninda Kredin'e kimler başvurabilir?
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    Bankalara bağlı olmaksızın kredi danışmanı firması olan Online Aninda Kredin bünyesinde kredi
                    kullanımı sağlamaktasınız.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                        Online Aninda Kredin'e kimler başvurabilir?
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    Online Aninda Kredin'a Kredi’ye T.C. vatandaşı olan, 18 yaşından büyük kişiler başvurabilir.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                        Kredi Hesabıma mı yatıyor?
                    </button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                    Vereceğiniz Iban/Hesap no numaranıza havale/eft aracılığı ile kredi miktarınız gönderilmektedir.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                            aria-expanded="false" aria-controls="collapseFive">
                        Sözleşme nasıl yapılıyor?
                    </button>
                </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">
                    Size en yakın olan Ptt şubesine sözleşmeniz faks aracılığı ile gönderilmektedir.

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingSix">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                            aria-expanded="false" aria-controls="collapseSix">
                        Online Aninda Kredin taksitlerini nereye yatırıyoruz?                    </button>
                </h5>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                <div class="card-body">
                    İşlemleriniz yapılırken tarafınıza aktaracağımız Finans departmanı hesabımıza taksitlerinizi yatırabilirsiniz.
                </div>
            </div>
        </div>
    </div>
        <!-- Page content End -->
</div>
@endsection

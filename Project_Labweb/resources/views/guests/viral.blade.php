@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            VIRAL
        </h1>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

<div class="d-flex justify-content-center align-items-center" style="background-color:white">
    <div class="text-center" style="width:100%">
        <h1 class="page-subtitle" style="margin-top:40px">
            A REALIDADE VIRTUAL VIRAL
        </h1>
        <h6 class="text-subtitle">
            DESDE DO INÍCIO, A HUMANIDADE SONHOU EM ESCAPAR PARA DIFERENTES
            REALIDADES, O QUE ERA APENAS FICÇÃO CIENTÍFICA
            TRANSFORMOU-SE NUMA DAS MAIORES INOVAÇÕES TECNOLÓGICAS DA ACTUALIDADE.
            A REALIDADE VIRTUAL TEM A CAPACIDADE DE NOS
            TRANSPORTAR PARA UM MUNDO COMPLETAMENTE NOVO E OFERECER UMA EXPERIÊNCIA DE IMERSÃO DESAFIADORA E SINGULAR.
        </h6>
    </div>
</div>

<div class="container-fluid" style="background-color:white">
    <div class="row row-cols-2 text-left">
        <div class="col-md-6">
            <div class="box-event" style="height: 500px; margin-top:50px; margin-bottom:20px">
                <div class="row text-left" style="height:100%">
                    <div class="row" style="width:100%">
                        <div class="text-left" style="margin-top: 50px; margin-left:30px">
                            <h1 class="page-subtitle-2">SOBRE A VIRAL VR</h1>
                                <h6 class="text-subtitle" style="color:black !important">
                                    A Viral Virtual Reality é um centro de entretenimento de jogos e
                                    simulação com tecnologia de realidade virtual. Situada no centro da
                                    cidade do Porto disponibiliza experiências de realidade virtual de alta
                                    tecnologia com sensações únicas de divertimento e jogos desafiadores.
                                </h6>
                        </div>
                                <div class="text-left" style="margin-top: -80px; margin-left:30px">
                                <h1 class="page-subtitle-2">EXPERIÊNCIAS VR</h1>
                                <h6 class="text-subtitle" style="color:black !important">
                                    Oferecemos uma ampla variedade de experiências de realidade virtual
                                    para que se encontre ao alcance de todos. As experiências VR constam
                                    de um serviço de tempo limitado,  acompanhadas pelo nosso staff, onde
                                    o utilizador poderá usufruir de diversos jogos e simulações disponíveis em cada tecnologia.
                                </h6>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6">
            <img src="{{ url('/storage/img/viral_1.jpg') }}" class="img-fluid" style="margin-bottom:80px;margin-top:40px;object-fit:cover">
        </div>
    </div>
</div>

<div class="container-fluid viral_blue_bg_color" style="padding-bottom: 50px;padding-top:50px;height:250px;width:100%">
    <div class="row row-cols-md-3 text-center">
        <div class="col-md-4 col-p">
            <h1><i class="bi bi-map-fill icon_color"></i></h1>
            <h3 class="text-white" style="font-weight: 700">Espaço</h3>
            <h6 class="text-white">...</h6>
        </div>
        <div class="col-md-4 col-p">
            <h1><i class="bi bi-gamepad icon_color"></i></h1>
            <h3 class="text-white" style="font-weight: 700">Jogos</h3>
            <h6 class="text-white">...</h6>
        </div>
        <div class="col-md-4 col-p">
            <h1><i class="bi bi-calendar-event icon_color"></i></h1>
            <h3 class="text-white" style="font-weight: 700">Eventos</h3>
            <h6 class="text-white">...</h6>
        </div>
    </div>
</div>

<div class="container-fluid" style="background-color:white">
    <div class="row">
        <div class="col-md-6">
            <div class="box-event" style="height: 500px; margin-top:50px; margin-bottom:20px">
                <div class="row text-left" style="height:100%">
                    <div class="col-12">
                        <h1 class="page-subtitle-2 text-center">
                            HISTÓRIA VIRAL
                        </h1>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  2018
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    O projeto Viral nasce fruto, de uma enorme paixão pela realidade virtual
                                    e as inovações tecnológicas, e começa a tomar forma um conceito inovador.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  2019
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Da ideia ao papel, o projeto Viral inicia a fase de planeamento e execução, com novos parceiros e parcerias.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  2020
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    O projeto Viral inicia a sua actividade, com a abertura da primeira sala de realidade virtual.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    2021
                                  </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    Continuando a desenvolver e melhorar a tecnologia e a qualidade das nossas experiências, para oferecer uma imersão única e desafiante.
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ url('/storage/img/viral_2.jpg') }}" class="img-fluid" style="margin-bottom:80px;margin-top:40px;">
        </div>
    </div>
</div>

@endsection

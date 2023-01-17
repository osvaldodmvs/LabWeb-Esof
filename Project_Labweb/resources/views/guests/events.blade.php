@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            EVENTOS
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ $errors->first() }}
    </div>
@endif

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

<div class="d-flex justify-content-center align-items-center" style="height: 200px;margin-top: 10px">
    <div class="text-center">
        <h1 class="page-subtitle">
            MARCA JÁ O TEU EVENTO
        </h1>
        <h6 class="text-viral">
            RESERVA UM ESPAÇO SÓ PARA TI. A VIRAL VR DISPONIBILIZA  UM ESPAÇO DEDICADO AO TEU EVENTO,
             CELEBRA O TEU ANIVERSÁRIO, DESPEDIDA DE SOLTEIRO/A , ENCONTRO DE AMIGOS OU COLEGAS DE
             TRABALHO NO DESENVOLVIMENTO DE ESPIRITO DE EQUIPA E OUTROS SKILLS. DISFRUTA E PARTILHA
             O MELHOR DA REALIDADE VIRTUAL EM SEGURANÇA E COM O APOIO ESPECIALIZADO DA VIRAL VR.
        </h6>
    </div>
</div>

<div class="container-fluid" style="background-image:url('/storage/img/event.jpg')">
    <div class="row row-cols-md-2 row-cols-2 text-left">
        <div class="col">
            <div class="box-event" style="height: 500px; margin-top:50px; margin-bottom:20px">
                <div class="row text-center" style="height:100%">
                    <div class="row" style="width:100%">
                        <div class="text-center" style="margin-top: 50px">
                            <h1 class="page-subtitle">
                                ANIVERSÁRIO KIDS
                                <h6 class="text-viral">
                                    EVENTO DEDICADO AOS MAIS NOVOS PARA UM DIA AINDA MAIS ESPECIAL
                                    (DOS 10 AOS 15 ANOS)
                                </h6>
                                <h6 class="text-subtitle">
                                    Propomos um pack de festa  ou criamos um pack à tua medida.
                                    Para mais informações, não hesite em contactar-nos.
                                </h6>
                        </div>
                    </div>
                    <div class="row" style="width:100%">
                        <div class="text-center" style="margin-top: 50px">
                            <h1 class="page-subtitle">
                                EVENTOS PRIVADOS
                                <h6 class="text-viral">
                                    FESTEJA UM DIA ESPECIAL, ANIVERSÁRIO, DESPEDIDAS DE SOLTEIRO/A, OU CASADO/A E OUTRAS DATAS
                                </h6>
                                <h6 class="text-subtitle">
                                    Propomos um pack de festa  ou criamos um pack à tua medida.
                                    Para mais informações, não hesite em contactar-nos.
                                </h6>
                        </div>
                    </div>
                    <div class="row" style="width:100%">
                        <div class="text-center" style="margin-top: 50px">
                            <h1 class="page-subtitle">
                                CONDIÇÕES GERAIS DE EVENTOS
                                <h6 class="text-subtitle">
                                  <b>Número de convidados:</b> mínimo de 10 <br>
                                  <b>  Idade de convidados: </b> aconselhado a partir de 10 anos <br>
                                  <b>  Sinal de reserva: </b> 30% do preço total, não reembolsável em caso de cancelamento e dedutível no momento do pagamento final.
                                </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col" style="color:white">
            <form action="{{route('mail_events')}}" method="POST">
                @csrf
                <div class="row row-cols-md-2 row-cols-2" style="padding:50px; margin-top:0px; margin-bottom:-60px">
                    <div class ="col">
                        <div class="form-group col-md-10">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email"  id="email">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="type">Tipo de Evento</label>
                            <select id="type" class="form-control" name="type">
                                <option>ANIVERSÁRIO</option>
                                <option>ANIVERSÁRIO KIDS</option>
                                <option>EVENTOS PRIVADOS</option>
                            </select>
                          </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="last_name">Apelido</label>
                            <input type="text" class="form-control" name="last_name" id="last_name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="participants">Participantes</label>
                            <input type="number" min="8" class="form-control" name="participants" id="participants">
                        </div>
                    </div>
                </div>

                <div class="row-col-md-1 mx-3" style="margin-bottom:10px; padding:32px">
                    <div class="form-group">
                        <label for="suggestions" style="text-align:left">Observações e Pedidos</label>
                        <input type="text" class="form-control" id="suggestions" name="suggestions" style="height:80px" placeholder="">
                      </div>
                      <button type="submit" class="btn-blue-dark" style="margin-top:20px; padding:5px">Submeter Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 300px">
    <div class = "row row-cols-md-3 row-cols-3 text-center">
        <div class="col">
            <h1 class="page-title" style="margin-top:40px">
                O TEU ESPAÇO
            </h1>
            <h6 class="text-white" style="padding:60px;margin-top:-40px">
                A VIRAL VR exclusivamente reservada para o teu evento
                com todas as experiências VR ao dispôr
                com espaço de lounge, apoio de bar e o que mais desejares!
            </h6>
        </div>
        <div class="col">
            <h1 class="page-title" style="margin-top:40px">
                O TEU EVENTO
            </h1>
            <h6 class="text-white" style="padding:130px;margin-top:-110px">
                Apoiamos e colocamos à tua disposição
                o nosso staff e nossa experiência, para que o teu evento
                seja único, memorável e fantástico.
            </h6>
        </div>
        <div class="col">
            <h1 class="page-title" style="margin-top:40px">
                A TUA EQUIPA
            </h1>
            <h6 class="text-white" style="padding:100px;margin-top:-80px">
                Desenvolvemos em conjunto com a tua equipa
                programas de teambuilding inovadores e personalizados
                em liderança, cooperação e motivação.
            </h6>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center" style="height: 100px;margin-top: 10px">
    <div class="text-center">
        <h1 class="page-subtitle">
            TEAMBUILDING E INSTITUIÇOES
        <h6 class="text-subtitle">
            PROPORCIONA UMA EXPERIÊNCIA FANTÁSTICA E DESENVOLVE SKILS DE EQUIPA
        </h6>
    </div>
</div>

<div class="container-fluid" style="background-image:url('/storage/img/event2.jpg')">
    <div class="row row-cols-md-2 row-cols-2 text-left">
        <div class="col">
            <div class="box-event" style="height: 400px; margin-top:50px">
                <div class="row text-center" style="height:100%">
                    <div class="row" style="width:100%">
                        <div class="text-center" style="margin-top: 50px">
                            <h1 class="page-subtitle">
                                EMPRESAS, INSTITUIÇÕES E GRUPOS
                                <h6 class="text-viral">
                                    O MELHOR DA REALIDADE VIRTUAL EM CONDIÇÕES ESPECIAIS DE GRUPO!
                                </h6>
                        </div>
                    </div>
                    <div class="row" style="width:100%">
                        <div class="text-center" style="width:100%">
                            <h6 class="text-subtitle">
                                Junta o teu grupo, escolhe a tua equipa e enfrenta desafios
                                 num espaço inteiramente dedicado a ti,
                                com fantásticas e emocionantes experiências VR para partilhares.
                            </h6>
                        </div>
                    </div>
                    <div class="row" style="width:100%">
                        <div class="text-center" style="width:100%">
                            <h6 class="text-subtitle">
                                Desenvolvemos programas de Teambuilding
                                à medida para a tua equipa ou empresa. Diversas experiências
                                VR disponíveis, com desafios tecnológicos de motivação, liderança e  cooperação.
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center" style="width:100%">
                            <h6 class="text-subtitle">
                                Preenche o formulário com os teus dados, selecciona o tipo de evento e número de
                                participantes, caso tenhas um pedido especial é só descrever na caixa de observações.
                                 Seremos breves em atender o teu pedido e a proporcionar um evento memorável.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col" style="color:white">
            <form action="{{route('mail_teambuilding')}}" method="POST">
                @csrf
                <div class="row row-cols-md-2 row-cols-2" style="padding:50px; margin-top:20px; margin-bottom:-60px">
                    <div class ="col">
                        <div class="form-group col-md-10">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="type">Tipo de Evento</label>
                            <select id="inputEvent" class="form-control" name="type">
                                <option>TEAMBUILDING</option>
                                <option>ESCOLAS</option>
                                <option>INSTITUIÇÕES</option>
                                <option>OUTRO</option>
                            </select>
                          </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="company">Empresa</label>
                            <input type="text" class="form-control" name="company" id="company">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="participants">Participantes</label>
                            <input type="number" min="8" class="form-control" name="participants" id="inputParticipants">
                        </div>
                    </div>
                </div>

                <div class="row-col-md-1 mx-3" style="margin-bottom:10px; padding:32px">
                    <div class="form-group">
                        <label for="inputSuggestions" style="text-align:left">Observações e Pedidos</label>
                        <input type="text" class="form-control" id="inputSuggestions" name="suggestions" style="height:80px" placeholder="">
                      </div>
                      <button type="submit" class="btn-blue-dark" style="margin-top:20px; padding:5px">Submeter Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
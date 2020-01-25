<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <link rel='stylesheet' type='text/css' href="{{(!$debug) ? public_path('assets/css/copyright/style.css') : asset('assets/css/copyright/style.css')}}">
    <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 980px)" type="text/css" href="{{(!$debug) ? public_path('assets/css/copyright/mobile05.css') : asset('assets/css/copyright/mobile05.css')}}"/>
    <link rel="stylesheet" media="only screen and (min-width: 641px) and (max-width: 768px)" type="text/css" href="{{(!$debug) ? public_path('assets/css/copyright/mobile04.css') : asset('assets/css/copyright/mobile04.css')}}"/>
    <link rel="stylesheet" media="only screen and (min-width: 481px) and (max-width: 640px)" type="text/css" href="{{(!$debug) ? public_path('assets/css/copyright/mobile03.css') : asset('assets/css/copyright/mobile03.css')}}"/>
    <link rel="stylesheet" media="only screen and (min-width: 321px) and (max-width: 480px)" type="text/css" href="{{(!$debug) ? public_path('assets/css/copyright/mobile02.css') : asset('assets/css/copyright/mobile02.css')}}"/>
    <link rel="stylesheet" media="only screen and (min-width: 0px) and (max-width: 320px)" type="text/css" href="{{(!$debug) ? public_path('assets/css/copyright/mobile01.css') : asset('assets/css/copyright/mobile01.css')}}"/>
    <style>
        @page { margin: 0px; }
        body { margin: 0px; }
    </style>
</head>
<body>
<div id="container">
    <footer><p>Impresso em <b>{{$Data}}</b></p></footer>

    <div id="top">
        <p id="title1">Registro de Copyright</p>
        <p>Em {{$Work->getRegisteredAtFormatted()}} {{$Work->getOwnerName()}} registrou essa criação.</p>
        <p>Ao validar o email enviado pela <span id="fantasia">Orights</span> ou receber este arquivo
            e código blockchain,</br> você reconhece o autor desta criação.</p>
    </div>

    <div id="rights">
        <img id="icon" src="{{(!$debug) ? public_path('assets/images/copyright/rights.jpg') : asset('assets/images/copyright/rights.jpg')}}">
    </div>

    <div id="left">
        <div id="thumbnail">
            <img id="miniatura" src="{{(!$debug) ? $Work->getFullLinkPath() : $Work->getLinkDownload()}}" alt="TRUMBNAIL DO PROJETO OU CRIAÇÃO">
        </div>
        <p id="copy">&copy;Todos os Direitos Reservados ao Autor</p>
    </div>

    <div id="right">
        <p id="title2">TÍTULO:</p>
        <p id="registry">{{$Work->getTitle()}}</p>
        {{--<p id="registry">Nome do Registro</p>--}}

        <p>Criado por: {{$Work->getOwnerName()}}</p>
        <p>Proprietário: {{$Work->getOwnerName()}}<p/>
        <hr>

        <p id="title3">DESCRIÇÃO DO TRABALHO</p>
        <p>ID do Trabalho: {{$Work->id}}</p>
        <p id="abstract">
            Resumo:
            {{$Work->getDescriptions()}}
        </p>

        <hr>
        <p id="title3">HISTÓRICO DO REGISTRO</p>
        <p>{{$Work->getRegisteredAtFormatted()}} - Registrado por: {{$Work->getOwnerName()}}</p>

        <hr>
        <p id="title3">REGISTRO CRIPTOGRAFADO</p>
        <p>Use os dados abaixo para verificar o registro</p>
        <p>Link: <a href="#" onclick="window.print()">para download do PDF clicável</a></p>
        <p>Registro Blockchain:</p>
        <div id="idBlockchain">
            <p id="id">
                {{$Work->getBlockchainKey()}}
            </p>
        </div>

        {{--<div id="qrcode">--}}
            {{--{!! $Work->getQrCode() !!}--}}
            {{--<p id="code">QR CODE DO BLOCKCHAIN </p>--}}
        {{--</div>--}}
    </div>

    <div id="bottom">
        <div id="term">
            <h2>Obrigado por aceitar os termos de uso do Orights.com.br</h2>
            <p>Você recebeu um email de um parceiro que dividiu a criação de uma propriedade
                intelectual contigo, isso significa que confia muito em você.</p>

            <p>A Orights.com.br gerou um certificado via blockchain. Desta forma, o código deste
                conteúdo está registrado em centenas de computadores e atestam a propriedade intelectual.</p>

            <p>Caso queira consultar mais sobre as bases legais do uso indevido de propriedade,
                acesse o link <a style="color:#7853B1;" target="_blank" href="{{route('terms')}}">{{route('terms')}}</a></p>
        </div>

        <div id="blockchain">
            <img src="{{(!$debug) ? public_path('assets/images/copyright/orights-selo.jpg') : asset('assets/images/copyright/orights-selo.jpg')}}">
        </div>
    </div>
</div>
<script>
    // function print()
    // {
    //     window.print();
    //
    //     return true;
    // }
</script>
</body>
</html>
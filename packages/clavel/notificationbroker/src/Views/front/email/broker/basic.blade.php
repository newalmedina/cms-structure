<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">


<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
        @section('title')
            {{ config('app.name', '') }} ::
        @show
    </title>
    <style>
        a:link {
            color: #B3B3B4;
            text-align: center;
            text-decoration: none;
            display: inline-block;

        }

        a:visited {
            color: #B3B3B4;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }



        a:hover {
            text-decoration: underline !important;
        }
        td.promocell p {
            color:#e1d8c1;
            font-size:16px;
            line-height:26px;
            font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            padding-bottom:14px;
            font-weight:normal;
        }
        td.contentblock h4 {
            color:#444444 !important;
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
            margin-top:0;
            margin-bottom:10px;
            padding-top:0;
            padding-bottom:0;
            font-weight:normal;
        }
        td.contentblock h4 a {
            color:#444444;
            text-decoration:none;
        }
        td.contentblock p {
            color:#888888;
            font-size:13px;
            line-height:19px;
            font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
            margin-top:0;
            margin-bottom:12px;
            padding-top:0;
            padding-bottom:0;
            font-weight:normal;
        }
        td.contentblock p a {
            color:#3ca7dd;
            text-decoration:none;
        }


        @media only screen and (max-device-width: 480px) {
            div[class="header"] {
                font-size: 16px !important;
            }
            table[class="table"], td[class="cell"] {
                width: 300px !important;
            }
            table[class="promotable"], td[class="promocell"] {
                width: 325px !important;
            }
            td[class="footershow"] {
                width: 300px !important;
            }
            table[class="hide"], img[class="hide"], td[class="hide"] {
                display: none !important;
            }
            img[class="divider"] {
                height: 1px !important;
            }
            td[class="logocell"] {
                padding-top: 15px !important;
                padding-left: 15px !important;
                width: 300px !important;
            }
            img[id="screenshot"] {
                width: 325px !important;
                height: 127px !important;
            }
            img[class="galleryimage"] {
                width: 53px !important;
                height: 53px !important;
            }
            p[class="reminder"] {
                font-size: 11px !important;
            }
            h4[class="secondary"] {
                line-height: 22px !important;
                margin-bottom: 15px !important;
                font-size: 18px !important;
            }


        }

        {{ isset($payload['css']) ? $payload['css'] : '' }}
    </style>
</head>
<body bgcolor="#ffffff" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased;width:100% !important;background:#ffffff;-webkit-text-size-adjust:none;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" aria-hidden="true">
    <tr>
        <td bgcolor="#ffffff" width="100%">

            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table" aria-hidden="true">
                <tr>
                    <td width="600" class="cell">

                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="table" aria-hidden="true">
                            <tr>
                                <td width="250" bgcolor="#ffffff" class="logocell">
                                    <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="20" class="hide" alt="">
                                    <br class="hide">
                                    @if (isset($payload['logo']))
                                        <img src="{{ array_key_exists('path', $payload['logo']) ? $payload['logo']['path'] : '' }}" width="{{ array_key_exists('width', $payload['logo']) ? $payload['logo']['width'] : '' }}" height="{{ array_key_exists('height', $payload['logo']) ? $payload['logo']['height'] : '' }}" alt="{{ isset($payload['senderName']) ? $payload['senderName'] : '' }}" style="-ms-interpolation-mode:bicubic;">
                                    @endif
                                    <br>
                                    <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="10" class="hide" alt=""><br class="hide">
                                </td>
                                <td align="right" width="350" class="hide" style="color:#888888;font-size:14px;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;text-shadow: 0 1px 0 #ffffff;" valign="top" bgcolor="#ffffff">
                                    <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="63" alt=""><br>
                                    {{ date("d/m/Y H:i") }}
                                </td>
                            </tr>
                        </table>
                </tr>
            </table>


            <table border="0" width="100%" cellpadding="0" cellspacing="0" aria-hidden="true">
                <tr>
                    <td style="background:none; border-bottom: 1px solid #7dc200; height:1px; width:100%; margin:0px 0px 0px 0px;">&nbsp;</td>
                </tr>
            </table>


            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table" aria-hidden="true">
                <tr>
                    <td width="600" class="cell">
                        <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="15" class="divider" alt=""><br>

                        @yield('content')

                    </td>
                </tr>
            </table>

            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table" aria-hidden="true">
                <tr>
                    <td width="600" class="cell">
                        <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="15" class="divider" alt=""><br>

                        <table width="600" cellpadding="10" cellspacing="0" border="0" align="center" class="table" aria-hidden="true">
                            <tr>
                                <td width="600" nowrap bgcolor="#f2f2f2" class="cell">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table" aria-hidden="true">
                                        <tr>
                                            <td width="70%" nowrap  class="cell">
                                                <p style="font-size:xx-small; font-family: Arial; color:#888888; width: 100%;">
                                                    {{ isset($payload['senderName']) ? $payload['senderName'] : '' }}
                                                    @if (isset($payload['address']))
                                                        - {!! $payload['address'] !!}
                                                    @endif
                                                </p>
                                            </td>
                                            <td  nowrap  class="cell">
                                                <p style="font-size:xx-small; font-family: Arial; color:#888888; text-align: right; width: 100%;">
                                                    <a href="https://aduxia.com/aviso-legal/" target="_blank" rel="noopener noreferrer">Aviso legal</a>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                        <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="25" alt=""><br>

                    </td>
                </tr>
            </table>



            <img border="0" src="{{ Request::getSchemeAndHttpHost() }}/assets/front/img/spacer.gif" width="1" height="10" class="divider" alt=""><br>


        </td>
    </tr>
</table>

</body>
</html>

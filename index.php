
<html>

    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css">
    </head>

    <script src="js/jquery.min.js"></script>

    <script type="text/javascript" src="js/tableExport.js"></script>
    <script type="text/javascript" src="js/jquery.base64.js"></script>

    <script type="text/javascript" src="js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="js/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="js/jspdf/libs/base64.js"></script>

    <script type="text/javascript" src="js/html2canvas.js"></script>



    <script type="text/javaScript">

        $(document).ready(function(){

            //var curl = $(location).attr('href');
            var curl = location.href.split("/").slice(-1);

            var aurl = "";
            $('li > a').each(function() {
                aurl = $(this).attr('href').split("/").slice(-1);
                if ("'"+curl+"'" == "'"+aurl+"'"){
                    $(this).parent().parent().parent().addClass('active');
                    $(this).parent().parent().parent().parent().addClass('active');
                    $(this).parent().parent().parent().parent().parent().addClass('active');
                    $(this).parent().parent().parent().parent().parent().parent().addClass('active');
                    $(this).parent().parent().parent().parent().parent().parent().parent().addClass('active');
                }
            });


        });
    </script>

    <script type="text/javaScript">
            $(document).ready(function(){
            });
    </script>

    <body>

    <?php


    $options = 'https://eproc2.tjto.jus.br/eprocV2_prod_2grau/ws/servicos/eproc/wsdl/cenarius/meta1/cenarius.php?WSDL';

    if(!@file_get_contents($options)){
        echo 'Falha na leitura do arquivo WSDL do Diário Eletrônico.';
    }

    $client = new SoapClient($options);
    $params = array('usuario' => 'INT.CONSULTA_UNIFICADA','senha'=> 'c0nsuITa_un1f1adca_producao');

    ?>
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box">

                    <div class="box-body table-responsive" id='ptable'>
                        <h3>Demo</h3>
                        <div class="btn-group">
                            <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Exportar dados da tabela</button>
                            <ul class="dropdown-menu " role="menu">
                                <li><a href="#" onclick="$('#customers').tableExport({type:'json',escape:'false'});"> <img src="icons/json.png" width="24px"> JSON</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src="icons/json.png" width="24px"> JSON (ignoreColumn)</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'json',escape:'true'});"> <img src="icons/json.png" width="24px"> JSON (with Escape)</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'xml',escape:'false'});"> <img src="icons/xml.png" width="24px"> XML</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'sql'});"> <img src="icons/sql.png" width="24px"> SQL</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'csv',escape:'false'});"> <img src="icons/csv.png" width="24px"> CSV</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'txt',escape:'false'});"> <img src="icons/txt.png" width="24px"> TXT</a></li>
                                <li class="divider"></li>

                                <li><a href="#" onclick="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src="icons/xls.png" width="24px"> XLS</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'doc',escape:'false'});"> <img src="icons/word.png" width="24px"> Word</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'powerpoint',escape:'false'});"> <img src="icons/ppt.png" width="24px"> PowerPoint</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'png',escape:'false'});"> <img src="icons/png.png" width="24px"> PNG</a></li>
                                <li><a href="#" onclick="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="icons/pdf.png" width="24px"> PDF</a></li>

                            </ul>
                        </div>
                        <table id="customers" class="table table-striped">
                            <thead>
                                <title> Juízes</title>
                            </thead>
                            <tr>
                                <th>
                                    Codígo Magistrado
                                </th>
                                <th>
                                    Nome Magistrado
                                </th>
                            </tr>

                            <?php
                            $obj =$client->listarJuizes($params);
                            $array = $obj->listarJuizesResposta;
                            foreach ( $array as $item){
                            ?>
                            <tr>
                                <td>
                                    <?= $item->codMag; ?>
                                </td>
                                <td>
                                    <?= $item->nomeMag; ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/AdminLTE/app.js" type="text/javascript"></script>
</html>
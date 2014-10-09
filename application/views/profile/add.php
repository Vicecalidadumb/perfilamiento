<?php
$get_modalidad = array();
foreach ($modalidades as $modalidad) {
    $get_modalidad[$modalidad->MODALIDAD_ID] = $modalidad->MODALIDAD_NOMBRE;
}
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Evaluar <small>Aspirantes</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo base_url('desk') ?>">
                        Escritorio
                    </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('profile') ?>">
                        Perfilamiento
                    </a>
                    <i class="fa fa-angle-right"></i>
                </li>  
                <li>
                    <a href="">
                        Evaluar
                    </a>
                </li>                
            </ul>           
        </div>
        <!-- END PAGE HEADER-->

        <div class="clearfix">
        </div>

        <div class="row ">
            <div class="col-md-12 col-sm-12">
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php } ?>          
                <?php echo validation_errors(); ?>            
            </div>
            <?php //echo '<pre>' . print_r($ofertas, true) . '</pre>' ?>
            <div class="col-md-12 col-sm-12">
                <?php //echo '<pre>' . print_r($registro, true) . '</pre>'; ?>
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Informaci&oacute;n del Aspirante <?php echo $registro[0]->INSCRIPCION_PIN ?>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- INICIO PERFIL-->
                        <div class="row profile">
                            <div class="col-md-2">
                                <ul class="list-unstyled profile-nav">
                                    <li>
                                        <?php
                                        $image = ($registro[0]->USUARIO_GENERO == 'F') ? '/images/vice/user_f.png' : '/images/vice/user_h.png';
                                        ?>
                                        <img src="<?php echo base_url($image); ?>" class="img-responsive" alt="" style="width: 223px;" />
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12 profile-info">
                                        <h1>
                                            <?php echo $registro[0]->USUARIO_NOMBRES . ' ' . $registro[0]->USUARIO_APELLIDOS ?>
                                        </h1>
                                        <p></p>
                                        <ul class="list-inline">
                                            <li>
                                                <i class="fa fa-map-marker" title="Lugar de Residencia"></i> <?php echo $registro[0]->MUNICIPIO_NOMBRE ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar" title="Fecha de Inscripcion"></i> <?php echo $registro[0]->USUARIO_FECHAINGRESO ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <?php echo $registro[0]->USUARIO_CORREO ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone-square"></i> <?php echo $registro[0]->USUARIO_CELULAR . ' - ' . $registro[0]->USUARIO_TELEFONOFIJO ?>
                                            </li>                                            
                                        </ul>
                                    </div>
                                    <div class="col-md-12 profile-info">
                                        <div class="col-md-6 profile-info">
                                            <p>
                                                <strong>Pin:</strong> <?php echo $registro[0]->INSCRIPCION_PIN ?>
                                            </p>                                        
                                            <p>
                                                <strong>Documento:</strong> <?php echo $registro[0]->USUARIO_TIPODOCUMENTO . ' ' . $registro[0]->USUARIO_NUMERODOCUMENTO ?>
                                            </p>
                                            <p>
                                                <strong>Fecha de Nacimiento:</strong> <?php echo $registro[0]->USUARIO_FECHADENACIMIENTO ?>
                                            </p>
                                            <p>
                                                <strong>Direcci&oacute;n:</strong> <?php echo $registro[0]->USUARIO_DIRECCIONRESIDENCIA ?>
                                            </p>     
                                            <br>
                                        </div>
                                        <div class="col-md-6 profile-info">
                                            <p style="color:red">
                                                OFERTAS APLICADAS POR EL ASPIRANTE
                                            </p>                                        
                                            <?php
                                            foreach ($ofertas as $oferta) {
                                                ?>
                                                <p>
                                                    <strong>Codigo/Region:</strong> 
                                                    <a href="<?php echo base_url('profile/info_offer/' . encrypt_id($oferta->EMPLEO_ID)) ?>" class="label label-info" data-target="#ajax<?php echo $oferta->OFERTAINS_ID; ?>" data-toggle="modal">
                                                        <?php echo 'UMB2014' . str_pad($oferta->OFERTAINS_ID, 4, "0", STR_PAD_LEFT) . ' / ' . $oferta->REGIONAL_NOMBRE ?>
                                                        &nbsp;
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                <div class="modal fade" id="ajax<?php echo $oferta->OFERTAINS_ID; ?>" role="basic" aria-hidden="true" >
                                                    <div class="page-loading page-loading-boxed" style="display: block">
                                                        <img src="<?php echo base_url('/assets/global/img/loading-spinner-grey.gif') ?>" alt="" class="loading">
                                                        <span>
                                                            &nbsp;&nbsp;Cargando Informaci&oacute;n... 
                                                        </span>
                                                    </div>
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                        </div>
                                                    </div>
                                                </div>                                                    
                                                </p>                                                     
                                                <?php
                                            }
                                            ?>    
                                            <br>
                                        </div>                                        
                                    </div>

                                </div>
                                <!--end row-->
                                <div class="tabbable tabbable-custom tabbable-custom-profile">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_11" data-toggle="tab">
                                                Documentos Basicos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_11" data-toggle="tab">
                                                Educaci&oacute;n Formal
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_3_11" data-toggle="tab">
                                                Adici&oacute;n Edu. para el Trabajo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_4_11" data-toggle="tab">
                                                Experiencia Laboral
                                            </a>
                                        </li>                                        
                                    </ul>
                                    <div class="tab-content">
                                        <!-------------------------------------------TAB 1------------------------------------------>
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                No. Folio
                                                            </th>
                                                            <th>
                                                                Tipo de Documento
                                                            </th>
                                                            <th>
                                                                Fecha de Ingreso
                                                            </th>                                                            
                                                            <th>
                                                                Ver Folio
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($registro as $document) {
                                                            switch ($document->TIPO_DOCUMENTO_ID) {
                                                                case $document->TIPO_DOCUMENTO_ID > 50:
                                                                    switch ($document->TIPO_DOCUMENTO_ID) {
                                                                        case 51:
                                                                            $tipo = 'Documento de Identidad';
                                                                            break;
                                                                        case 52:
                                                                            $tipo = 'Libreta Militar';
                                                                            break;
                                                                        case 53:
                                                                            $tipo = 'Tarjeta/Matricula Profesional';
                                                                            break;
                                                                        case 54:
                                                                            $tipo = 'Licencia de Conducci&oacute;n';
                                                                            break;
                                                                    }
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $document->DOCUMENTO_FOLIO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $tipo; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->DOCUMENTO_FECHA; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn default btn-xs green-stripe" href="<?php echo base_url('profile/view_document/' . $document->INSCRIPCION_PIN . '/' . $document->DOCUMENTO_ID) ?>" target="_blank">
                                                                                Ver 
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    break;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-------------------------------------------TAB 2------------------------------------------>
                                        <div class="tab-pane " id="tab_2_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                No. Folio
                                                            </th>
                                                            <th>
                                                                Modalidad
                                                            </th>
                                                            <th>
                                                                Universidad/Instituto
                                                            </th>
                                                            <th>
                                                                Titulo/Nombre programa
                                                            </th>
                                                            <th>
                                                                Fecha de Grado 
                                                            </th>                            
                                                            <th>
                                                                Ver Folio
                                                            </th>                    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        foreach ($registro as $document) {
                                                            switch ($document->TIPO_DOCUMENTO_ID) {
                                                                case 2:
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $document->DOCUMENTO_FOLIO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $get_modalidad[$document->MODALIDAD_ID]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->UNIVERSIDAD; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->TITULO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->FECHA_GRADO; ?>
                                                                        </td>                                
                                                                        <td>
                                                                            <a class="btn default btn-xs green-stripe" href="<?php echo base_url('profile/view_document/' . $document->INSCRIPCION_PIN . '/' . $document->DOCUMENTO_ID) ?>" target="_blank">
                                                                                Ver 
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $count++;
                                                                    break;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>    
                                        <!-------------------------------------------TAB 3------------------------------------------>
                                        <div class="tab-pane " id="tab_3_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                No. Folio
                                                            </th>
                                                            <th>
                                                                Instituto
                                                            </th>
                                                            <th>
                                                                Nombre del curso
                                                            </th>
                                                            <th>
                                                                Intensidad
                                                            </th>
                                                            <th>
                                                                Fecha de Terminaci&oacute;n
                                                            </th>                            
                                                            <th>
                                                                Ver Folio
                                                            </th>                    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count_int = 0;
                                                        foreach ($registro as $document) {
                                                            switch ($document->TIPO_DOCUMENTO_ID) {
                                                                case 3:
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $document->DOCUMENTO_FOLIO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->UNIVERSIDAD; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->TITULO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo $document->INTENSIDAD;
                                                                            $count_int+=$document->INTENSIDAD;
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->FECHA_TERMINACION; ?>
                                                                        </td>                                 
                                                                        <td>
                                                                            <a class="btn default btn-xs green-stripe" href="<?php echo base_url('profile/view_document/' . $document->INSCRIPCION_PIN . '/' . $document->DOCUMENTO_ID) ?>" target="_blank">
                                                                                Ver
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    break;
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="3" style="text-align: right">Total</td>
                                                            <td colspan="3" style="text-align: left"><?php echo $count_int; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-------------------------------------------TAB 4------------------------------------------>
                                        <div class="tab-pane " id="tab_4_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                No. Folio
                                                            </th>
                                                            <th>
                                                                Entidad
                                                            </th>
                                                            <th>
                                                                Cargo
                                                            </th>
                                                            <th>
                                                                Fecha de Inicio
                                                            </th>
                                                            <th>
                                                                Fecha de Terminaci&oacute;n
                                                            </th>
                                                            <th>
                                                                Empleo Actual
                                                            </th>                           
                                                            <th>
                                                                Ver Folio
                                                            </th>                    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        foreach ($registro as $document) {
                                                            switch ($document->TIPO_DOCUMENTO_ID) {
                                                                case 4:
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $document->DOCUMENTO_FOLIO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->UNIVERSIDAD; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->CARGO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->FECHA_INICIO; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->FECHA_FIN; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $document->EMPLEO_ACTUAL; ?>
                                                                        </td>                                
                                                                        <td>
                                                                            <a class="btn default btn-xs green-stripe" href="<?php echo base_url('profile/view_document/' . $document->INSCRIPCION_PIN . '/' . $document->DOCUMENTO_ID) ?>" target="_blank">
                                                                                Ver 
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $count++;
                                                                    break;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                    foreach ($ofertas as $oferta) {
                                        ?>                                    
                                        <div class="portlet box red">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-check-circle-o"></i>
                                                    Evaluaci&oacute;n para Oferta 
                                                    <?php echo 'UMB2014' . str_pad($oferta->OFERTAINS_ID, 4, "0", STR_PAD_LEFT) . ' / ' . $oferta->REGIONAL_NOMBRE ?>
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="form-body">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Evaluaci&oacute;n
                                                                </th>
                                                                <th>
                                                                    Cumple RM
                                                                </th>
                                                                <th>
                                                                    Putaje Extra
                                                                </th>
                                                            </tr>
                                                        </thead>                                                        
                                                        <?php
                                                        foreach ($assess as $asses) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $asses->TIPOEVALUACION_NOMBRE; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($asses->TIPOEVALUACION_CUMPLE) { ?>
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <?php echo form_dropdown('TIPOCONTRATO_ID', array(1 => 'Cumple', 0 => 'No Cumple', 2 => 'No Aplica'), 1, 'class="form-control"'); ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($asses->TIPOEVALUACION_PUNTAJE) { ?>

                                                                        <div class="form-group">
                                                                            <div class="col-md-3">
                                                                                <?php echo form_input('TIPOCONTRATO_ID', '', 'class="form-control"'); ?>
                                                                            </div>
                                                                        </div>

                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>  
                                        <br>
                                        <?php
                                    }
                                    ?>                                    
                                </div>
                            </div>
                        </div>                        
                        <!-- FIN INICIO PERFIL-->
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>            



        </div>
    </div>
    <!-- END CONTENT -->
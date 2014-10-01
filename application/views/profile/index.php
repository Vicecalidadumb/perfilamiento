<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Listado de <small>Aspirantes</small>
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
                </li>                    
            </ul>           
        </div>
        <!-- END PAGE HEADER-->

        <div class="clearfix">
        </div>

        <div class="col-md-12 col-sm-12">
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>          
        </div>        

        <div class="row ">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Listado de Aspirantes
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                       

                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="ajax_datatable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Correo</th>
                                        <th>Fecha de Creación</th>
                                    </tr>
                                </thead>
                                <!--<tbody>
                                    <?php
                                    /*
                                    $count = 1;
                                    foreach ($registros as $registro) {
                                        ?>
                                        <tr <?php echo ($registro->USUARIO_ESTADO == 0) ? 'class="danger"' : '' ?>>
                                            <td>
                                                <?php echo $count; ?>
                                            </td>
                                            <td>
                                                <?php echo $registro->USUARIO_NOMBRES . ' ' . $registro->USUARIO_APELLIDOS; ?>
                                            </td>
                                            <td>
                                                <?php echo $registro->USUARIO_TIPODOCUMENTO . ' ' . $registro->USUARIO_NUMERODOCUMENTO; ?>
                                            </td>
                                            <td>
                                                <?php echo $registro->USUARIO_CORREO; ?>
                                            </td>
                                            <td>
                                                <?php echo $registro->USUARIO_TELEFONOFIJO . ' - ' . $registro->USUARIO_CELULAR; ?>
                                            </td>
                                            <td>
                                                <?php echo $registro->USUARIO_PROFESION; ?>
                                            </td>                                            
                                            <td>
                                                <?php echo $registro->USUARIO_FECHAINGRESO; ?>
                                            </td>                                         
                                            <td>
                                                <a href="<?php echo base_url('cv/edit/' . encrypt_id($registro->HV_ID)) ?>" class="btn default btn-xs purple">
                                                    <i class="fa fa-edit"></i> 
                                                    Editar Info. Basica
                                                </a>
                                                <a href="<?php echo base_url('cv/documents/' . encrypt_id($registro->HV_ID)) ?>" class="btn default btn-xs yellow">
                                                    <i class="fa fa-folder-open"></i> 
                                                    Ver Info. / Gestionar Archivos 
                                                </a>                                               
                                            </td>                                        
                                        </tr>
                                        <?php
                                        $count++;
                                    }*/
                                    ?>
                                </tbody>-->
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

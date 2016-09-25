<?php

interface  IEmailService
{
    public function enviarCorreo(array $correos,$fechaInicio,$fechaFin);
}
?>
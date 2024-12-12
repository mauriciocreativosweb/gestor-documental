<?php

namespace App\Message;

enum PaymentMessage : string
{
    case successPaymentCreate = "se creo el nuevo pago ";
    case failPaymentCreate = "No se pudo hacer el pago ";
    case failPaymentmentModel = "porfavor verifique los datos del pago";
    case failCreatePaymentExcept = "Intente mas tarde realizar la transacción";
}

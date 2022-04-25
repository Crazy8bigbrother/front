<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);
    $mail->Charset = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('bert3331@mail.ru', 'Паша Бутько');
    $mail->addAddress('leopard2001d@mail.ru');
    $mail->Subject = 'Привет! это "Павлик"';

    $body = '<h1>Супер письмо!</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Телефон</strong> '.$_POST['phone'].'</p>';
    }

    $mail->Body = $body;

    if(!$mail->send()){
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';

    }

    $response = ['message'=> $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>
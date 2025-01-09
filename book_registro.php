<?php

$connection = mysqli_connect('localhost', 'root', '', 'prototipo');

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $request = "INSERT INTO pedidos(name, email, phone, address, location, guests, arrivals, leaving) VALUES
    ('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";

    if(mysqli_query($connection, $request)){
        // Preparar datos para el correo
        $to = $email;
        $subject = "Detalles de tu Registro";
        $message = "Nombre: $name\nEmail: $email\nTeléfono: $phone\nDirección: $address\nUbicación: $location\nInvitados: $guests\nLlegada: $arrivals\nSalida: $leaving";
        $headers = "From: ynsfranagueroe@gmail.com";

        // Enviar correo
        if(mail($to, $subject, $message, $headers)){
            echo "Registro guardado y correo enviado exitosamente.";
        } else {
            echo "Registro guardado, pero fallo al enviar el correo.";
        }

        // Redireccionar a book.php
        header('location:book.php');
    } else {
        echo "Error al guardar el registro. POR FAVOR INTENTALO UNA VEZ MÁS";
    }
} else {
    echo 'POR FAVOR INTENTALO UNA VEZ MÁS';
}

?>
